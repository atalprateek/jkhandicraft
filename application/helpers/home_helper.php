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
                    $headings=json_decode($value['headings'],true);
                    if(is_array($headings)){
                        foreach($headings as $key2=>$heading){
                            $getsubmenu=$CI->db->get_where("category",array("parent_id"=>$value['id'],'headings'=>$key2));
                            if($getsubmenu->num_rows()!=0){
                                $array[$key]['submenu'][$heading]=$getsubmenu->result_array();
                            }
                        }
                    }
                    else{
                        $getsubmenu=$CI->db->get_where("category",array("parent_id"=>$value['id']));
                        if($getsubmenu->num_rows()!=0){
                            $array[$key]['submenu']=$getsubmenu->result_array();
                        }
                    }
                }
            }
            //echo PRE;print_r($array);die;
            return $array;
        }
    }