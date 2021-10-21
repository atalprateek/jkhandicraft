<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	private $count=1;
    var $cartproducts=array();
	function __construct(){
		parent::__construct();
	}
    
	public function index(){
        $product_slug=$this->uri->segment(2);
        $product=$this->products->getproducts(array("t1.slug"=>$product_slug),"single");
        if(empty($product) || !is_array($product)){
            redirect('/');
        }
        $data['title']=$product['name'];
        $data['product']=$product;
        //echo PRE;print_r($data);die;
        $data['productimages']=$this->products->getproductimages($product['id']);
        $relatedproducts=$this->products->getproducts(array("t1.category"=>$product['category'],"t1.id!="=>$product['id']));
        $data['relatedproducts']=$relatedproducts;
        $data['categories']=$this->products->getcategory();
        //$data['wishlist']=getwishlistproductid();
        $this->load->view('website/includes/top-section',$data);
        $this->load->view('website/includes/header');
        $this->load->view('website/products/productdetails');
        $this->load->view('website/includes/footer');
        $this->load->view('website/includes/bottom-section');
	}
    
	public function category(){
        $products=$this->getfilteredproducts();
        $data=$products;
        $data['categories']=$this->products->getcategory();
        //$data['wishlist']=getwishlistproductid();
        $this->load->view('website/includes/top-section',$data);
        $this->load->view('website/includes/header');
        $this->load->view('website/products/productlist');
        $this->load->view('website/includes/footer');
        $this->load->view('website/includes/bottom-section');
	}
    
	public function search(){
        $query=$this->input->get('query');
        if($query===NULL){
            redirect('/');
        }
        $data['title']="Search Products";
        $where="t1.name like '%$query%'";
        $products=$this->getproductlist($where);
        $data['products']=$products;
        $data['categories']=$this->products->getcategory();
        //$data['wishlist']=getwishlistproductid();
        $this->load->view('website/includes/top-section',$data);
        $this->load->view('website/includes/header');
        $this->load->view('website/products/productlist');
        $this->load->view('website/includes/footer');
        $this->load->view('website/includes/bottom-section');
	}
    
	public function getfilteredproducts($type="page"){
		$redirect=false;
		$string=false;
		$where=array("status"=>0);
		$link=$this->uri->segment(1).'/';
		$page=1;
		$data['selected']=array();
		$pagefilters=array();
        
        $category_slug=$this->uri->segment(2);
        $query=$this->input->get('query');
        $category=$this->products->getcategory(array("slug"=>$category_slug),"single");
        if((empty($category) || !is_array($category)) && $query===NULL){
            redirect('/');
        }
        $where=array();
        if(isset($category['name'])){
            $data['title']=$category['name'];
        }
        else{
            $data['title']="Search Results for '$query'";
        }
        
        if(!empty($category) && is_array($category)){
            $data['category']=$category;
            $where[]="(t1.category='$category[id]' or t3.parent_id='$category[id]')";
            $data['selected'][]=$category['id'];
            $link.=$category['slug'].'/';
        }
        
		if($query!==NULL && trim($query)!=''){
			$query=$query;
			$pagefilters['query']=$query;
			$where[]="t1.name like '%$query%'";
			$data['selected'][]=$query;
		}
        
		/*if($this->input->get('category')!==NULL && trim($this->input->get('category'))!=''){
			$category=$this->input->get('category');
			$pagefilters['category']=$category;
			$data['selected'][]=$category;
			$where["find_in_set('$category',category_slugs)"]=false;
			$string=true;
		}
		/*if($this->uri->segment(2)!==NULL && $this->uri->segment(2)=='tags'){
			$slug=$this->uri->segment(3);
			if(empty($slug)){ $redirect=true; }
			$tag=$this->Blog_model->gettags(array("slug"=>$slug),"Single");
			if(empty($tag) || !is_array($tag)){ $redirect=true; }
			$where["find_in_set('$slug',tagslugs)"]=false;
			$string=true;
			$link="blog/tags/$slug/";
			$data['selected']=$tag['tag'];
		}
		elseif($this->uri->segment(2)!==NULL && $this->uri->segment(2)=='archive'){
			$year=$this->uri->segment(3);
			if(empty($year)){ $redirect=true; }
			$where["year(added_on)"]=$year;
			$link="blog/archive/$year/";
			$data['selected']=$year;
		}
		elseif($this->uri->segment(2)!==NULL && $this->uri->segment(2)=='author'){
			$author=$this->uri->segment(3);
			if(empty($author)){ $redirect=true; }
			$author=str_replace('%20',' ',$author);
			$where["author"]=$author;
			$link="blog/author/$author/";
			$data['selected']=$author;
		}
		elseif($this->uri->segment(2)!==NULL && $this->uri->segment(2)=='date'){
			$date=$this->uri->segment(3);
			if(empty($date)){ $redirect=true; }
			$where["date(added_on)"]=$date;
			$link="blog/date/$date/";
			$data['selected']=$date;
		}
		else*/
		if($this->uri->segment(3)!==NULL && $this->uri->segment(3)=='page' && $this->uri->segment(4)>0){
			$page=$this->uri->segment(4);
		}
		elseif($this->uri->segment(2)!==NULL && $this->uri->segment(2)=='page' && $this->uri->segment(3)>0){
			$page=$this->uri->segment(3);
		}
		
        $where=implode(" and ",$where);
		$order="t2.id";
		$products=$this->getproducts($where,$order,$page,$link,$pagefilters);
		if($type=='page'){
			return $products;
		}
		else{
			$this->load->view('website/pages/product/product-list',$products);
		}
	}
	
	public function getproducts($where,$order,$page,$link,$pagefilters=array()){
		$offset=($page-1)*$this->count;
		if(empty($where)){$where=array();}
		$data['products']=$this->products->getproducts($where,'all',$order,$this->count,$offset);
		$productcount=$this->products->countproducts($where);
		$data['total']=$productcount;
		$lfrom=$offset+1;
		$lto=($offset+count($data['products']));
		$limit=0;
		if(count($data['products'])!=0){
			$limit=$lfrom.'-'.$lto;
		}
		$data['current']=$limit;
		$pages=ceil($productcount/$this->count);
		if(($page>$pages || $page<0) && $pages!=0){ redirect('/'); }
		$config['url']=base_url($link);
		$config['pages']=$pages;
		$config['page']=$page;
		$config['num_links']=2;
		$config['display_type']="all";
		$skip=array("num"=>5,"skip_prev"=>"&lt; Skip 5","skip_next"=>"Skip 5 &gt;");
		$config['skip']=$skip;
		$config['display_links']=array('pages','firstlast');
		$config['pagefilters']=$pagefilters;
		$this->paging->initialize($config);
		$data['pagination']=$this->paging->pagination();
		
		return $data;
	}
	
    public function getproductlist($where=array(),$order="t1.id desc"){
        
        $products=$this->products->getproducts($where,"all",$order);
        return $products;
    }
    
    public function filter(){
        $category=$this->input->get('category');
        $query=$this->input->get('query');
        $discount=$this->input->get('discount');
        $where=array();
        if($category==''){
            $where[]="t1.name like '%$query%'";
            if(!empty($discount)){ $where[]="t1.discount='$discount'"; }
        }
        else{
            $category=$this->products->getcategory(array("slug"=>$category),"single");
            if(empty($category) || !is_array($category)){
                redirect('/');
            }
            $data['title']=$category['name'];
            $data['category']=$category;
            $where[]="(t1.category='$category[id]' or t3.parent_id='$category[id]')";
            if(!empty($discount)){
                $where[]="t1.discount='$discount'";
            }
        }
        $sorting=$this->input->get('sorting');
        switch($sorting){
            case 'newest':$order="t1.id desc";
            break;
            case 'lowtohigh':$order="t1.price";
            break;
            case 'hightolow':$order="t1.price desc";
            break;
            case 'alphabetical':$order="t1.name";
            break;
            default: $order="t1.id";
        }
        if(!empty($where)){
            $where=implode(' and ',$where);
        }
        $products=$this->getproductlist($where,$order);
        $data['products']=$products;
        $data['wishlist']=getwishlistproductid();
        $this->load->view('website/products/productlist',$data);
    }
    
    public function addenquiry(){
        if($this->input->post('addenquiry')!==NULL){
            $data=$this->input->post();
            unset($data['addenquiry']);
			$result=$this->products->addenquiry($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}
