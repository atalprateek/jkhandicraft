<?php
class Product_model extends CI_Model{
	
	function __construct(){
		parent::__construct(); 
		$this->db->db_debug = false;
	}
    
    public function addcategory($data){
        if($this->db->get_where('category',array('name'=>$data['name']))->num_rows()==0){
            if($this->db->insert("category",$data)){
                return array("status"=>true,"message"=>"Category Added Successfully!");
            }
            else{
                $error=$this->db->error();
                return array("status"=>false,"message"=>$error['message']);
            }
        }
        else{
            return array("status"=>false,"message"=>"Category Already Added!");
        }
    }
    
    public function getcategory($where=array(),$type="all"){
        $columns="*,  case when image='' then '' else concat('".file_url()."',image) end as image";
        $this->db->select($columns);
        $this->db->where($where);
        $query=$this->db->get("category");
        if($type=='all'){
            $array=$query->result_array();
        }
        else{
            $array=$query->unbuffered_row('array');
        }
        return $array;
    }
    
    public function updatecategory($data){
        $id=$data['id'];
        unset($data['id']);
        $where=array("id"=>$id);
        if($this->db->get_where('category',array('name'=>$data['name'],"id!="=>$id))->num_rows()==0){
            if($this->db->update("category",$data,$where)){
                return array("status"=>true,"message"=>"Category Updated Successfully!");
            }
            else{
                $error=$this->db->error();
                return array("status"=>false,"message"=>$error['message']);
            }
        }
        else{
            return array("status"=>false,"message"=>"Category Already Added!");
        }
    }
    
    public function addunit($data){
        if($this->db->get_where('units',array('unit'=>$data['unit']))->num_rows()==0){
            if($this->db->insert("units",$data)){
                return array("status"=>true,"message"=>"Unit Added Successfully!");
            }
            else{
                $error=$this->db->error();
                return array("status"=>false,"message"=>$error['message']);
            }
        }
        else{
            return array("status"=>false,"message"=>"Unit Already Added!");
        }
    }
    
    public function getunits($where=array(),$type="all"){
        $this->db->where($where);
        $query=$this->db->get("units");
        if($type=='all'){
            $array=$query->result_array();
        }
        else{
            $array=$query->unbuffered_row('array');
        }
        return $array;
    }
    
    public function updateunit($data){
        $id=$data['id'];
        unset($data['id']);
        $where=array("id"=>$id);
        if($this->db->get_where('units',array('unit'=>$data['unit'],"id!="=>$id))->num_rows()==0){
            if($this->db->update("units",$data,$where)){
                return array("status"=>true,"message"=>"Unit Updated Successfully!");
            }
            else{
                $error=$this->db->error();
                return array("status"=>false,"message"=>$error['message']);
            }
        }
        else{
            return array("status"=>false,"message"=>"Unit Already Added!");
        }
    }
    
    public function addproduct($data){
        $image=$data['image'];
        $quantity=$data['quantity'];
        unset($data['image'],$data['quantity']);
        if($this->db->get_where('products',array('name'=>$data['name']))->num_rows()==0){
            if($this->db->insert("products",$data)){
                $product_id=$this->db->insert_id();
                $productimage=array("product_id"=>$product_id,"type"=>"thumb","image"=>$image);
                $this->db->insert("product_images",$productimage);
                //$stockdata=array("product_id"=>$product_id,"to_id"=>"123456","quantity"=>$quantity,"remarks"=>"Initial Stock Quantity","added_on"=>date('Y-m-d H:i:s'));
                //$this->db->insert("stock",$stockdata);
                return array("status"=>true,"message"=>"Product Added Successfully!");
            }
            else{
                $error=$this->db->error();
                return array("status"=>false,"message"=>$error['message']);
            }
        }
        else{
            return array("status"=>false,"message"=>"Product Already Added!");
        }
    }
    
    public function updateproduct($data){
        $id=$data['id'];
        unset($data['id']);
        if($this->db->get_where('products',array('name'=>$data['name'],"id!="=>$id))->num_rows()==0){
            if($this->db->update("products",$data,array("id"=>$id))){
                if($this->db->affected_rows()!=0){
                    $msg="Product Updated Successfully!";
                }
                else{
                    $msg="No Changes Done!";
                }
                return array("status"=>true,"message"=>$msg);
            }
            else{
                $error=$this->db->error();
                return array("status"=>false,"message"=>$error['message']);
            }
        }
        else{
            return array("status"=>false,"message"=>"Product Already Added!");
        }
    }
    
    public function getproducts($where=array(),$type="all",$orderby="t1.id"){
        $columns="t1.*,  case when t2.image='' then '' else concat('".file_url()."',t2.image) end as image,t3.name as category_name,t3.slug as category_slug,round((t1.price-((t1.price*t1.discount)/100)),2) as discount_price";
        //",t4.unit";
        $this->db->select($columns);
        $this->db->from("products t1");
        $this->db->join("product_images t2","t1.id=t2.product_id and type='thumb'");
        $this->db->join("category t3","t1.category=t3.id");
        //$this->db->join("units t4","t1.unit_id=t4.id",'left');
        $this->db->where($where);
        $this->db->order_by($orderby);
        $query=$this->db->get();
        if($type=='all'){
            $array=$query->result_array();
            /*foreach($array as $key=>$value){
                $packages=$this->getproductpackages($value['id']);
                $array[$key]['packages']=$packages['packages'];
            }*/
        }
        else{
            $array=$query->unbuffered_row('array');
            //$packages=$this->getproductpackages($array['id']);
            //$array['packages']=$packages['packages'];
            $category=$array['category'];
            $category=$this->db->get_where("category",array("id"=>$category))->unbuffered_row('array');
            $array['category_id']=($category['parent_id']==0)?$category['id']:$category['parent_id'];
            $array['subcategory_id']=($category['parent_id']==0)?'':$category['id'];
        }
        return $array;
    }
    
    public function getproductimages($product_id){
        $where=array("product_id"=>$product_id);
        $columns="*,  case when image='' then '' else concat('".file_url()."',image) end as image";
        $this->db->select($columns);
        $this->db->where($where);
        $query=$this->db->get("product_images");
        $array=$query->result_array();
        return $array;
    }
    
    public function unaddedproduct($user_id,$category=''){
        $where="t1.id not in (SELECT product_id from ".TP."store_products where user_id='$user_id' and status='1')";
        if($category!=''){
            $where.=" and (t1.category='$category' or t3.slug='$category')";
        }
        $columns="t1.*,  case when t2.image='' then '' else concat('".file_url()."',t2.image) end as image,t3.name as category_name,t3.slug as category_slug,round((t1.price-((t1.price*t1.discount)/100)),2) as discount_price";
        $this->db->select($columns);
        $this->db->from("products t1");
        $this->db->join("product_images t2","t1.id=t2.product_id and type='thumb'");
        $this->db->join("category t3","t1.category=t3.id");
        $this->db->where($where);
        $query=$this->db->get();
        $array=$query->result_array();
        return $array;
    }
    
    public function storeproducts($user_id,$category=''){
        $store_id=$this->db->get_where("store",array("user_id"=>$user_id))->unbuffered_row()->id;
        $where="t1.id in (SELECT product_id from ".TP."store_products where user_id='$user_id' and status='1')";
        if($category!=''){
            $where.=" and (t1.category='$category' or t3.slug='$category')";
        }
        $columns="t1.*,  case when t2.image='' then '' else concat('".file_url()."',t2.image) end as image,t3.name as category_name,t3.slug as category_slug,round((t1.price-((t1.price*t1.discount)/100)),2) as discount_price";
        $this->db->select($columns);
        $this->db->from("products t1");
        $this->db->join("product_images t2","t1.id=t2.product_id and type='thumb'");
        $this->db->join("category t3","t1.category=t3.id");
        $this->db->where($where);
        $query=$this->db->get();
        $array=$query->result_array();
        if(is_array($array)){
            foreach($array as $key=>$product){
                $array[$key]['quantity']=getstockquantity($product['id'],$store_id);
            }
        }
        return $array;
    }
    
    public function addstoreproduct($user_id,$product_id){
        $store_id=$this->db->get_where("store",array("user_id"=>$user_id))->unbuffered_row()->id;
        $where=array('user_id'=>$user_id,'store_id'=>$store_id,'product_id'=>$product_id);
        $query=$this->db->get_where('store_products',$where);
        if($query->num_rows()==0){
            $data=array('user_id'=>$user_id,'store_id'=>$store_id,'product_id'=>$product_id);
            if($this->db->insert("store_products",$data)){
                return array("status"=>true,"message"=>"Product Added in Store Successfully!");
            }
            else{
                $error=$this->db->error();
                return array("status"=>false,"message"=>$error['message']);
            }
        }
        elseif($query->num_rows()==1 ){
            $data=array("status"=>1);
            if($this->db->update("store_products",$data,$where)){
                return array("status"=>true,"message"=>"Product Added in Store Successfully!");
            }
            else{
                $error=$this->db->error();
                return array("status"=>false,"message"=>$error['message']);
            }
        }
        else{
            return array("status"=>false,"message"=>"Product Already Added in Store!");
        }
    }
    
    public function removestoreproduct($user_id,$product_id){
        $where=array('user_id'=>$user_id,'product_id'=>$product_id);
        $data=array("status"=>0);
        if($this->db->update("store_products",$data,$where)){
            return array("status"=>true,"message"=>"Product Removed from Store Successfully!");
        }
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
    }
    
    public function addtowishlist($user_id,$product_id){
        $where=array('user_id'=>$user_id,'product_id'=>$product_id);
        $query=$this->db->get_where('wishlist',$where);
        if($query->num_rows()==0){
            $data=array('user_id'=>$user_id,'product_id'=>$product_id);
            if($this->db->insert("wishlist",$data)){
                return array("status"=>true,"message"=>"Product Added to Wishlist Successfully!");
            }
            else{
                $error=$this->db->error();
                return array("status"=>false,"message"=>$error['message']);
            }
        }
        else{
            return array("status"=>false,"message"=>"Product Already Added to Wishlist!");
        }
    }
    
    public function removefromwishlist($user_id,$product_id){
        $where=array('user_id'=>$user_id,'product_id'=>$product_id);
        if($this->db->delete("wishlist",$where)){
            return array("status"=>true,"message"=>"Product Removed from Wishlist Successfully!");
        }
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
    }
    
    public function wishlist($user_id){
        $where="t1.id in (SELECT product_id from ".TP."wishlist where user_id='$user_id')";
        $columns="t1.*,  case when t2.image='' then '' else concat('".file_url()."',t2.image) end as image,t3.name as category_name,t3.slug as category_slug,round((t1.price-((t1.price*t1.discount)/100)),2) as discount_price";
        $this->db->select($columns);
        $this->db->from("products t1");
        $this->db->join("product_images t2","t1.id=t2.product_id and type='thumb'");
        $this->db->join("category t3","t1.category=t3.id");
        $this->db->where($where);
        $query=$this->db->get();
        $array=$query->result_array();
        return $array;
    }
    
    public function uploadimages($data){
        if($this->db->insert_batch("product_images",$data)){
            return array("status"=>true,"message"=>"Image Uploaded Successfully!");
        }
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
    }
    
    public function deleteimage($id){
        $image=$this->db->get_where("product_images",array("id"=>$id))->unbuffered_row('array');
        $type=$image['type'];
        $product_id=$image['product_id'];
        $src=$image['image'];
        if($type=='thumb'){
            $query="UPDATE `".TP."product_images` SET `type` = 'thumb' WHERE product_id ='$product_id' limit 2";
            $this->db->query($query);
        }
        $this->db->delete("product_images",array("id"=>$id));
        if (is_readable('.'.$src) && is_file('.'.$src)) {
            unlink('.'.$src);
            //echo "The file has been deleted";
        }
    }
    
    public function savepackages($data){
        $packagedata=array();
        $added=array();
        $updatedata=array();
        foreach($data['quantity'] as $key=>$quantity){
            if(in_array($quantity,$added)){ continue; }
            if($data['package_id'][$key]!=''){
                $updatedata[]=array("quantity"=>$quantity,"price"=>$data['price'][$key],
                                    "discount"=>$data['discount'][$key],"product_id"=>$data['product_id'],
                                    "package_id"=>$data['package_id'][$key],"todel"=>$data['todel'][$key]);
                if($data['todel'][$key]=='no'){
                    $added[]=$quantity;
                }
                if($quantity==1){
                    $this->db->update("products",array("price"=>$data['price'][$key],
                                    "discount"=>$data['discount'][$key]),array("id"=>$data['product_id']));
                }
                continue;
            }
            $added[]=$quantity;
            if($quantity!=''){
                $packagedata[]=array("quantity"=>$quantity,"price"=>$data['price'][$key],
                                 "discount"=>$data['discount'][$key],"product_id"=>$data['product_id']);
            }
        }
        if(!empty($packagedata)){
            if($this->db->insert_batch("packages",$packagedata)){
                $result= array("status"=>true,"message"=>"Packages Added Successfully!");
            }
            else{
                $error=$this->db->error();
                return array("status"=>false,"message"=>$error['message']);
            }
        }
        if(!empty($updatedata)){
            foreach($updatedata as $data){
                if($data['todel']=='yes'){
                    $this->db->delete("packages",array("id"=>$data['package_id']));
                }
                else{
                    $package_id=$data['package_id'];
                    unset($data['todel'],$data['package_id']);
                    if($this->db->update("packages",$data,array("id"=>$package_id))){ 
                        $result= array("status"=>true,"message"=>"Packages Updated Successfully!");
                    }
                    else{
                        $error=$this->db->error();
                        $result= array("status"=>false,"message"=>$error['message']);
                    }
                }
            }
        }
        return $result;
    }
    
    public function getproductpackages($product_id){
        $where=array("product_id"=>$product_id);
        $this->db->select("*,round((price-((price*discount)/100)),2) as discount_price");
        $query=$this->db->get_where("packages",$where);
        if($query->num_rows()==0){
            $this->db->select("price,discount");
            $product=$this->db->get_where("products",array("id"=>$product_id))->unbuffered_row('array');
            $data=array("product_id"=>$product_id,"quantity"=>1,"price"=>$product['price'],"discount"=>$product['discount']);
            $this->db->insert("packages",$data);
            $this->db->select("*,round((price-((price*discount)/100)),2) as discount_price");
            $query=$this->db->get_where("packages",$where);
        }
        $array=$query->result_array();
        $result=array("status"=>true,"packages"=>$array);
       /* else{
            
            $this->db->select("'1' as `quantity`,price,discount,round((price-((price*discount)/100)),2) as discount_price");
            $array[]=$this->db->get_where("products",array("id"=>$product_id))->unbuffered_row('array');
            $result=array("status"=>false,"packages"=>$array);
        }*/
        return $result;
    }
    
    public function getpackage($package_id){
        $query=$this->db->get_where("packages",array("id"=>$package_id));
        if($query->num_rows()>0){
            return array("status"=>true,"package"=>$query->unbuffered_row('array'));
        }
        else{
            return array("status"=>false,"message"=>"Package not found");
        }
    }
    
    public function addinstock($data){
        if($data['to_id']==123456){
            $data['from_id']=0;
        }
        $data['added_on']=date('Y-m-d H:i:s');
        if($this->db->insert("stock",$data)){
            return array("status"=>true,"message"=>"Stock Updated Successfully!");
        }
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
    }
    
    public function getstock($store_id){
        if($store_id==123456){
            $products=$this->getproducts();
        }
        else{
            $user_id=$this->db->get_where("store",array("id"=>$store_id))->unbuffered_row()->user_id;
            $products=$this->storeproducts($user_id);
        }
        if(is_array($products)){
            foreach($products as $key=>$product){
                $products[$key]['quantity']=getstockquantity($product['id'],$store_id);
            }
        }
        return $products;
    }
    
    public function stockhistory($store_id,$slug=NULL,$product_id=NULL){
        $where=array();
        if($slug!==NULL){
            $where['t1.slug']=$slug;
        }
        if($product_id!==NULL){
            $where['t1.id']=$product_id;
        }
        $product=$this->getproducts($where,"single");
        $where="(from_id='$store_id' or to_id='$store_id') and product_id='$product[id]'";
        $array=$this->db->get_where("stock",$where)->result_array();
        return $array;
        
    }
    
    public function requeststock($data){
        $where=array("store_id"=>$data['store_id'],"product_id"=>$data['product_id']);
        if($this->db->get_where("store_products",$where)->num_rows()!=0){ 
            $data['added_on']=$data['updated_on']=date('Y-m-d H:i:s');
            if($this->db->insert("stock_requests",$data)){
                return array("status"=>true,"message"=>"Stock Request Added Successfully!");
            }
            else{
                $error=$this->db->error();
                return array("status"=>false,"message"=>$error['message']);
            }
        }
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>"Product not available!");
        }
    }
    
    public function getstockrequests($where=array(),$type="all"){
        $columns="t1.*,  t2.name as product,t3.name as store_name";
        $this->db->select($columns);
        $this->db->from("stock_requests t1");
        $this->db->join("products t2","t1.product_id=t2.id");
        $this->db->join("store t3","t1.store_id=t3.id");
        $this->db->where($where);
        $query=$this->db->get();
        if($type=='all'){
            $array=$query->result_array();
        }
        else{
            $array=$query->unbuffered_row('array');
        }
        return $array;
    }
    
    public function approvestockrequest($id){
        $request=$this->getstockrequests(array("t1.id"=>$id),"single");
        $avl=getstockquantity($request['product_id'],123456);
        if($avl>=$request['quantity']){
            $stockdata=array("product_id"=>$request['product_id'],"from_id"=>123456,"to_id"=>$request['store_id'],
                             "quantity"=>$request['quantity'],"remarks"=>"Quantity transfer on request approval",
                             "added_on"=>date('Y-m-d H:i:s'));
            if($this->db->insert("stock",$stockdata)){
                $where=array("id"=>$id);
                $this->db->update("stock_requests",array("status"=>1,"updated_on"=>date('Y-m-d H:i:s')),$where);
                return array("status"=>true,"message"=>"Stock Request Approved Successfully!");
            }
            else{
                $error=$this->db->error();
                return array("status"=>false,"message"=>$error['message']);
            }
        }
        else{
            return array("status"=>false,"message"=>"Quantity Not Available in Master Stock!");
        }
    }
    
    public function getproductreport($store_id){
        $user_id=$this->db->get_where("store",array("id"=>$store_id))->unbuffered_row()->user_id;
        
        $where="t1.id in (SELECT product_id from ".TP."store_products where user_id='$user_id' and status='1')";
        $columns="t1.id,t1.sku,t1.name,t1.slug,t3.name as category_name,t3.slug as category_slug,round((t1.price-((t1.price*t1.discount)/100)),2) as discount_price";
        $this->db->select($columns);
        $this->db->from("products t1");
        $this->db->join("product_images t2","t1.id=t2.product_id and type='thumb'");
        $this->db->join("category t3","t1.category=t3.id");
        $this->db->where($where);
        $query=$this->db->get();
        $products=$query->result_array();
        if(is_array($products)){
            foreach($products as $key=>$product){
                $where=array("product_id"=>$product['id'],"to_id"=>$store_id);
                $this->db->select_sum("quantity","quantity");
                $instock=$this->db->get_where("stock",$where)->unbuffered_row()->quantity;
                $instock=is_null($instock)?0:$instock;

                $where=array("product_id"=>$product['id'],"from_id"=>$store_id);
                $this->db->select_sum("quantity","quantity");
                $outstock=$this->db->get_where("stock",$where)->unbuffered_row()->quantity;
                $outstock=is_null($outstock)?0:$outstock;

                $quantity=$instock-$outstock;
                $products[$key]['received']=$instock;
                $products[$key]['sold']=$outstock;
                $products[$key]['available']=$quantity;
            }
        }
        return $products;
    }
    
    public function addenquiry($data){
        $data['added_on']=date('Y-m-d H:i:s');
        if($this->db->insert("enquiry",$data)){
            return array("status"=>true,"message"=>"Enquiry Added Successfully!");
        }
        else{
            $error=$this->db->error();
            return array("status"=>false,"message"=>$error['message']);
        }
    }
    
}