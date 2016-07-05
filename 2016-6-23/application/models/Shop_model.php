<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2016/7/2
 * Time: 9:11
 */
class Shop_model extends CI_Model
{
    function __construct() {
        //引入session
        $this->load->library('session');
    }
    //添加商品
    public function add_shop($id,$number){
        $this->id=$id;
        $this->load->database();
        $look= $this->db->get_where('upload',array('id'=>$id));
        $lookup=$look->result_array();
        $shop_cont=$this->session->userdata('shop');
        if(!$lookup){
            return $this->session->userdata('shop');
        }else{
            if(isset($shop_cont[$id])){
                $shop_cont[$id]['number'] +=$number;
            }else{
                $shop_cont[$id]=array(
                    'id'=>$id,
                    'number'=>intval($number),
                    'price'=>$lookup[0]['commodity_price'],
                    'name'=>$lookup[0]['commodity_name'],
                    'img'=>$lookup[0]['img_information'],
            );
            }
        }
        //存入session
        $this->session->set_userdata('shop',$shop_cont);
        return $this->session->userdata('shop');
//        //添加到数据库
//        $price=$lookup[0]['commodity_price']*$number;
//        $time=date('Y/m/d H:i:s');
//        $ip=$this->input->server('REMOTE_ADDR');
//        $this->db->query("insert into `shop` VALUE ('','{$lookup[0]['id']}','{$number}','{$price}','{$lookup[0]['commodity_name']}','{$lookup[0]['img_information']}','{$time}','{$ip}');");

    }
    //删除商品
    public function del($id){
        $shop_cont=$this->session->userdata('shop');
        if(isset($shop_cont)){
            unset($shop_cont[$id]);
        }
        $this->session->set_userdata('shop',$shop_cont);
        return $this->session->userdata('shop');
    }
    //修改商品数量
    public function modify($id,$number){
        $shop_cont=$this->session->userdata('shop');
        if(isset($shop_cont[$id])){
            $shop_cont[$id]['number']=intval($number);
        }
        $this->session->set_userdata('shop',$shop_cont);
        return $this->session->userdata('shop');
    }
    //清空购物车
    public function clear(){
        $this->session->unset_userdata('shop');
        return $this->session->userdata('shop');
    }
}