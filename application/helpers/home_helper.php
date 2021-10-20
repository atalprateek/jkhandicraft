<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');
    if(!function_exists('getfeaturedcategories')){
        function getfeaturedcategories(){
            $CI = get_instance();
            $where=array("parent_id"=>0);
            $query=$CI->db->get_where("category",$where);
            $array=$query->result_array();
            if(is_array($array)){
                foreach($array as $key=>$value){
                    $getsubmenu=$CI->db->get_where("category",array("parent_id"=>$value['id']));
                    if($getsubmenu->num_rows()!=0){
                        $array[$key]['submenu']=$getsubmenu->result_array();
                    }
                }
            }
            return $array;
        }
    }