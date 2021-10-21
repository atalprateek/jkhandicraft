<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	function __construct(){
		parent::__construct();
        checklogin();
	}
	
	public function index(){
        $data['title']="Products List";
        //$data['subtitle']="Sample Subtitle";
        $data['breadcrumb']=array();
        $data['datatable']=true;
        $data['products']=$this->products->getproducts();
		$this->template->load('products','productlist',$data);
	}
    
	public function addproduct(){
        $data['title']="Add Product";
        //$data['subtitle']="Sample Subtitle";
        $data['breadcrumb']=array();
        $categories=$this->products->getcategory(array("parent_id"=>0));
        $options=array(""=>"Select Category");
        if(is_array($categories)){
            foreach($categories as $category){
                $options[$category['id']]=$category['name'];
            }
        }
        $data['category']=$options;
        $units=array();//$this->products->getunits();
        $options=array(""=>"Select Unit");
        if(is_array($units)){
            foreach($units as $unit){
                $options[$unit['id']]=$unit['unit'];
            }
        }
        $data['units']=$options;
		$this->template->load('products','addproduct',$data);
	}
    
	public function editproduct($product_slug=NULL){
        if($product_slug===NULL){
            redirect(admin_url('products/'));
        }
        $product=$this->products->getproducts(array("t1.slug"=>$product_slug),"single");
        if(empty($product) || !is_array($product)){
            redirect(admin_url('products/'));
        }
        $data['product']=$product;
        $data['productimages']=$this->products->getproductimages($product['id']);
        //$data['productpackages']=$this->products->getproductpackages($product['id']);
        $data['title']="Edit Product";
        //$data['subtitle']="Sample Subtitle";
        $data['breadcrumb']=array();
        $categories=$this->products->getcategory(array("parent_id"=>0));
        $options=array(""=>"Select Category");
        if(is_array($categories)){
            foreach($categories as $category){
                $options[$category['id']]=$category['name'];
            }
        }
        $data['category']=$options;
        
        $subcategories=$this->products->getcategory(array("parent_id"=>$product['category_id']));
        $options=array(""=>"Select Sub-Category");
        if(is_array($subcategories)){
            foreach($subcategories as $subcategory){
                $options[$subcategory['id']]=$subcategory['name'];
            }
        }
        $data['subcategory']=$options;
        
        $units=array();//$this->products->getunits();
        $options=array(""=>"Select Unit");
        if(is_array($units)){
            foreach($units as $unit){
                $options[$unit['id']]=$unit['unit'];
            }
        }
        $data['units']=$options;
		$this->template->load('products','editproduct',$data);
	}
    
	public function category(){
        $data['title']="Category";
        //$data['subtitle']="Sample Subtitle";
        $data['breadcrumb']=array();
        $data['categories']=$this->products->getcategory(array("parent_id"=>0));
		$this->template->load('products','category',$data);
	}
    
	public function subcategory(){
        $data['title']="Sub Category";
        //$data['subtitle']="Sample Subtitle";
        $data['breadcrumb']=array();
        $data['categories']=$this->products->getcategory();
        $data['subcategories']=$this->products->getcategory(array("parent_id!="=>0));
		$this->template->load('products','subcategory',$data);
	}
    
	public function units(){
        $data['title']="Units";
        //$data['subtitle']="Sample Subtitle";
        $data['breadcrumb']=array();
        $data['units']=$this->products->getunits();
		$this->template->load('products','units',$data);
	}
    
    public function getslug(){
        $name=$this->input->post('name');
        $slug=url_title($name,'-',true);
        echo $slug;
    }
    
    public function addcategory(){
        if($this->input->post('addcategory')!==NULL){
            $data=$this->input->post();
            unset($data['addcategory']);
            $data['slug']=verify_slug('category',$data['slug']);
			$upload_path='./assets/images/category/';
			$allowed_types='gif|jpg|jpeg|png|svg';
			$upload=upload_file('image',$upload_path,$allowed_types,$data['slug']);
            if($upload['status']===true){
                create_image_thumb('.'.$upload['path'],'',FALSE,array("width"=>300,"height"=>300));
                $data['image']=$upload['path'];
            }
			else{$data['image']='';}
            $headings=array();
            foreach($data['headings'] as $heading){
                $headings[generate_slug($heading)]=$heading;
            }
            $data['headings']=json_encode($headings);
			$result=$this->products->addcategory($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('products/category'));
    }
    
    public function updatecategory(){
        if($this->input->post('updatecategory')!==NULL){
            $data=$this->input->post();
            unset($data['updatecategory']);
            $data['slug']=verify_slug('category',$data['slug'],$data['id']);
			$upload_path='./assets/images/category/';
			$allowed_types='gif|jpg|jpeg|png|svg';
			$upload=upload_file('image',$upload_path,$allowed_types,$data['slug']);
            if($upload['status']===true){
                create_image_thumb('.'.$upload['path'],'',FALSE,array("width"=>300,"height"=>300));
                $data['image']=$upload['path'];
            }
            $headings=array();
            foreach($data['headings'] as $heading){
                $headings[generate_slug($heading)]=$heading;
            }
            $data['headings']=json_encode($headings);
			$result=$this->products->updatecategory($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('products/category'));
    }
    
    public function addsubcategory(){
        if($this->input->post('addsubcategory')!==NULL){
            $data=$this->input->post();
            unset($data['addsubcategory']);
            $data['slug']=verify_slug('category',$data['slug']);
			$upload_path='./assets/images/category/';
			$allowed_types='gif|jpg|jpeg|png|svg';
			$upload=upload_file('image',$upload_path,$allowed_types,$data['slug']);
            if($upload['status']===true){
                create_image_thumb('.'.$upload['path'],'',FALSE,array("width"=>300,"height"=>300));
                $data['image']=$upload['path'];
            }
			else{$data['image']='';}
            $headings=array();
            foreach($data['headings'] as $heading){
                $headings[generate_slug($heading)]=$heading;
            }
            $data['headings']=json_encode($headings);
			$result=$this->products->addcategory($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('products/subcategory'));
    }
    
    public function updatesubcategory(){
        if($this->input->post('updatesubcategory')!==NULL){
            $data=$this->input->post();
            unset($data['updatesubcategory']);
            $data['slug']=verify_slug('category',$data['slug'],$data['id']);
			$upload_path='./assets/images/category/';
			$allowed_types='gif|jpg|jpeg|png|svg';
			$upload=upload_file('image',$upload_path,$allowed_types,$data['slug']);
            if($upload['status']===true){
                create_image_thumb('.'.$upload['path'],'',FALSE,array("width"=>300,"height"=>300));
                $data['image']=$upload['path'];
            }
			$result=$this->products->updatecategory($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('products/subcategory'));
    }
    
    public function getcategory(){
        $id=$this->input->post('id');
        $category=$this->products->getcategory(array("id"=>$id),"single");
        echo json_encode($category);
    }
    
    public function addunit(){
        if($this->input->post('addunit')!==NULL){
            $data=$this->input->post();
            unset($data['addunit']);
			$result=$this->products->addunit($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('products/units'));
    }
    
    public function updateunit(){
        if($this->input->post('updateunit')!==NULL){
            $data=$this->input->post();
            unset($data['updateunit']);
			$result=$this->products->updateunit($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('products/units'));
    }
    
    
    public function saveproduct(){
        if($this->input->post('saveproduct')!==NULL){
            $data=$this->input->post();
            unset($data['saveproduct']);
            $data['slug']=verify_slug('products',$data['slug']);
            if(empty($data['sku'])){
                $data['sku']=NULL;
            }
            if(!empty($data['subcategory'])){
                $data['category']=$data['subcategory'];
            }
            unset($data['subcategory']);
			$upload_path='./assets/images/product/';
			$allowed_types='gif|jpg|jpeg|png|svg';
			$upload=upload_file('image',$upload_path,$allowed_types,$data['slug']);
            if($upload['status']===true){
                create_image_thumb('.'.$upload['path'],'',FALSE,array("width"=>400,"height"=>400));
                $data['image']=$upload['path'];
            }
			else{$data['image']='';}
			$result=$this->products->addproduct($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
                 redirect(admin_url('products/editproduct/'.$data['slug']));
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
                redirect(admin_url('products/addproduct/'));
            }
        }
        redirect(admin_url('products/'));
    }
    
    public function updateproduct(){
        if($this->input->post('updateproduct')!==NULL){
            $data=$this->input->post();
            unset($data['updateproduct']);
            
            $data['slug']=verify_slug('products',$data['slug'],$data['id']);
            if(empty($data['sku'])){
                $data['sku']=NULL;
            }
            
            if(!empty($data['subcategory'])){
                $data['category']=$data['subcategory'];
            }
            unset($data['subcategory']);
			$result=$this->products->updateproduct($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        redirect(admin_url('products/'));
    }
    
    public function addimages(){
        if($this->input->post('addimages')!==NULL){
            $data=$this->input->post();
            unset($data['addimages']);
            $images=array();
            if(is_array($_FILES['image']['name'])){
                $count=count($_FILES['image']['name']);
                for($i=0; $i<$count; $i++) {
                    if(is_uploaded_file($_FILES['image']['tmp_name'][$i])){
                        $_FILES['multi']['name']     = $_FILES['image']['name'][$i];
                        $_FILES['multi']['type']     = $_FILES['image']['type'][$i];
                        $_FILES['multi']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
                        $_FILES['multi']['error']     = $_FILES['image']['error'][$i];
                        $_FILES['multi']['size']     = $_FILES['image']['size'][$i];
                        $upload_path='./assets/images/product/';
                        $allowed_types='gif|jpg|jpeg|png|svg';
                        $upload=upload_file('multi',$upload_path,$allowed_types,$data['slug']);
                        if($upload['status']===true){
                            create_image_thumb('.'.$upload['path'],'',FALSE,array("width"=>400,"height"=>400));
                            $images[]=$upload['path'];
                        }
                    }
                }
            }
            if(!empty($images)){
                $uploaddata=array();
                foreach($images as $image){
                    $uploaddata[]=array("product_id"=>$data['id'],"image"=>$image,"status"=>1);
                }
                $result=$this->products->uploadimages($uploaddata);
                if($result['status']===true){
                    $this->session->set_flashdata("msg",$result['message']);
                }
                else{
                    $this->session->set_flashdata("err_msg",$result['message']);
                }
            }
        }
        $link=$_SERVER['HTTP_REFERER'];
        $qpos=strpos($link,'?');
        if($qpos!==false){
           $link=substr($link,0,$qpos);
        }
        $link.='?images';
        redirect($link);
    }
    
    public function deleteimage(){
        if($this->input->post('deleteimage')!==NULL){
            $id=$this->input->post('id');
            $this->products->deleteimage($id);
        }
    }
    
    public function savepackages(){
        if($this->input->post('savepackages')!==NULL){
            $data=$this->input->post();
            $result=$this->products->savepackages($data);
			if($result['status']===true){
				$this->session->set_flashdata("msg",$result['message']);
			}
            else{
                $this->session->set_flashdata("err_msg",$result['message']);
            }
        }
        $link=$_SERVER['HTTP_REFERER'];
        $qpos=strpos($link,'?');
        if($qpos!==false){
           $link=substr($link,0,$qpos);
        }
        $link.='?packages';
        redirect($link);
    }
    
    public function getsubcategory(){
        $parent_id=$this->input->post('parent_id');
        $subcategories=$this->products->getcategory(array("parent_id"=>$parent_id));
        
        $options=array(""=>"Select Sub-Category");
        if(is_array($subcategories)){
            foreach($subcategories as $subcategory){
                $options[$subcategory['id']]=$subcategory['name'];
            }
        }
        echo form_dropdown('subcategory',$options,'',array('class'=>'form-control','id'=>'subcategory'));
    }
    
}
//url_title