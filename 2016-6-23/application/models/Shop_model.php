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
        //����session
        $this->load->library('session');
    }
    //�����Ʒ
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
        //����session
        $this->session->set_userdata('shop',$shop_cont);
        return $this->session->userdata('shop');
//        //��ӵ����ݿ�
//        $price=$lookup[0]['commodity_price']*$number;
//        $time=date('Y/m/d H:i:s');
//        $ip=$this->input->server('REMOTE_ADDR');
//        $this->db->query("insert into `shop` VALUE ('','{$lookup[0]['id']}','{$number}','{$price}','{$lookup[0]['commodity_name']}','{$lookup[0]['img_information']}','{$time}','{$ip}');");

    }
    //ɾ����Ʒ
    public function del($id){
        $shop_cont=$this->session->userdata('shop');
        if(isset($shop_cont)){
            unset($shop_cont[$id]);
        }
        $this->session->set_userdata('shop',$shop_cont);
        return $this->session->userdata('shop');
    }
    //�޸���Ʒ����
    public function modify($id,$number){
        $shop_cont=$this->session->userdata('shop');
        if(isset($shop_cont[$id])){
            $shop_cont[$id]['number']=intval($number);
        }
        $this->session->set_userdata('shop',$shop_cont);
        return $this->session->userdata('shop');
    }
    //��չ��ﳵ
    public function clear(){
        $this->session->unset_userdata('shop');
        return $this->session->userdata('shop');
    }
}