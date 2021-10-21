<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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
        $data['wishlist']=getwishlistproductid();
        $this->load->view('website/includes/top-section',$data);
        $this->load->view('website/includes/header');
        $this->load->view('website/products/productdetails');
        $this->load->view('website/includes/footer');
        $this->load->view('website/includes/bottom-section');
	}
    
	public function category(){
        $category_slug=$this->uri->segment(2);
        $where=array();
        if($this->uri->segment(1)!='offers'){
            $category=$this->products->getcategory(array("slug"=>$category_slug),"single");
            if(empty($category) || !is_array($category)){
                redirect('/');
            }
            $data['title']=$category['name'];
            $data['category']=$category;
            $where[]="(t1.category='$category[id]' or t3.parent_id='$category[id]')";
        }
        $discount=$this->input->get('discount');
        if(!empty($discount)){
            if(!isset($data['title'])){
                $data['title']="Offers";
            }
            $where[]="t1.discount='$discount'";
        }
        if(!empty($where)){
            $where=implode(' and ',$where);
        }
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
}
