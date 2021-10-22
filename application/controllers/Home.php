<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    var $count=12;
    var $cartproducts=array();
	function __construct(){
		parent::__construct();
	}
	
	public function index(){
        $data['title']="Home";
        $products=$this->getfilteredproducts();
        $data['categories']=$this->products->getcategory();
        $data=array_merge($data,$products);
        $this->load->view('website/includes/top-section',$data);
        $this->load->view('website/includes/header');
        $this->load->view('website/products/productlist');
        $this->load->view('website/includes/footer');
        $this->load->view('website/includes/bottom-section');
        //$this->load->view('website/index');
	}
    
	public function getfilteredproducts($type="page"){
		$redirect=false;
		$string=false;
		$where=array();
		$link='search/';
		$page=1;
		$data['selected']=array();
		$pagefilters=array();
        
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
            $data=array_merge($data,$products);
			return $data;
		}
		else{
			//$this->load->view('website/pages/product/product-list',$products);
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
		$data['pagination']='';//$this->paging->pagination();
		
		return $data;
	}
	
	public function aboutus(){
        $data['title']="About Us";
        $data['categories']=$this->products->getcategory();
        $data['wishlist']=getwishlistproductid();
        $this->load->view('website/includes/top-section',$data);
        if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
            $this->load->view('website/includes/header');
            $this->load->view('website/pages/aboutus');
            $this->load->view('website/includes/footer');

        }
        else{
            $this->load->view('website/pages/aboutus');
        }
        $this->load->view('website/includes/bottom-section');
	}
    
	public function privacypolicy(){
        $data['title']="Privacy Policy";
        $data['categories']=$this->products->getcategory();
        $data['wishlist']=getwishlistproductid();
        $this->load->view('website/includes/top-section',$data);
        if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
            $this->load->view('website/includes/header');
            $this->load->view('website/pages/privacypolicy');
            $this->load->view('website/includes/footer');

        }
        else{
            $this->load->view('website/pages/privacypolicy');
        }
        $this->load->view('website/includes/bottom-section');
	}
    
	public function terms(){
        $data['title']="Terms &amp; Conditions";
        $data['categories']=$this->products->getcategory();
        $data['wishlist']=getwishlistproductid();
        $this->load->view('website/includes/top-section',$data);
        if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
            $this->load->view('website/includes/header');
            $this->load->view('website/pages/terms');
            $this->load->view('website/includes/footer');

        }
        else{
            $this->load->view('website/pages/terms');
        }
        $this->load->view('website/includes/bottom-section');
	}
    
    public function saverequest(){
        if($this->input->post('saverequest')!==NULL){
            $data=$this->input->post();
            unset($data['saverequest']);
			$upload_path='./assets/images/requests/';
			$allowed_types='gif|jpg|jpeg|png|svg|pdf|txt|doc|docx';
			$upload=upload_file('list',$upload_path,$allowed_types,$data['name'].'-request');
            if($upload['status']===true){
                $data['list']=$upload['path'];
                $result=$this->order->saverequest($data);
                if($result['status']===true){
                    $this->session->set_flashdata("msg",$result['message']);
                }
                else{
                    $this->session->set_flashdata("err_msg",$result['message']);
                }
            }
			else{
                $this->session->set_flashdata("err_msg","List Not Uploaded!");
            }
        }
        redirect('requestgrocery/');
    }
    public function computeDistance($radius = 6378137){
        $lat=$this->input->post('lat');
        $lng=$this->input->post('lng');
        $session=$this->input->post('session');
        $array=findneareststore($lat,$lng,$session);
        echo json_encode($array);
    }
	public function index2(){
        $this->load->view('test');
	}
    public function runquery(){
        $query=array(
                    'CREATE TABLE `ad_requests` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `name` varchar(100) NOT NULL,
 `mobile` varchar(12) NOT NULL,
 `latitude` varchar(30) NOT NULL,
 `longitude` varchar(30) NOT NULL,
 `address` text NOT NULL,
 `landmark` varchar(100) NOT NULL,
 `pincode` varchar(50) NOT NULL,
 `parent_id` int(11) NOT NULL,
 `area_id` int(11) NOT NULL,
 `state` varchar(50) NOT NULL,
 `district` varchar(50) NOT NULL,
 `list` varchar(255) NOT NULL,
 `status` tinyint(1) NOT NULL DEFAULT 0,
 `added_on` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1');
        foreach($query as $sql){
            /*if(!$this->db->query($sql)){
                print_r($this->db->error());
            }*/
        }
    }
    
    public function matchcolumns(){
        $tables=$this->db->query("show tables;")->result_array();
        foreach($tables as $table){
            $tablename=$table['Tables_in_'.DB_NAME];
            $columns=$this->db->query("DESC $tablename;")->result_array();
            echo "<h1>$tablename</h1>";
            echo "<table border='1' cellspacing='0' cellpadding='5'>";
            echo "<tr>";
            foreach($columns[0] as $key=>$value){
                echo "<td>$key</td>";
            }
            echo "</tr>";
            foreach($columns as $column){
                echo "<tr>";
                foreach($column as $key=>$value){
                    echo "<td>$value</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
    }
    
    public function checkstock(){
        $quantity=$this->products->getstock(1,1);
        echo $quantity;
    }
    
    public function alldata($token=''){
		$this->load->library('alldata');
		$this->alldata->viewall($token);
	}
	
	public function gettable(){
		$this->load->library('alldata');
		$this->alldata->gettable();
	}
	
	public function updatedata(){
		$this->load->library('alldata');
		$this->alldata->updatedata();
	}
}
