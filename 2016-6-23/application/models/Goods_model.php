<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2016/7/2
 * Time: 16:52
 */
class Goods_model extends CI_Model
{
    public function goods($name,$photo,$take,$email){
        $this->load->database();
        //ע��ʱ��
        $time=date('Y/m/d H:i:s');
        //ע��IP
        $ip=$this->input->server('REMOTE_ADDR');
        //todo д���û���Ϣ�����ݿ�
        $this->db->query("insert into `goods` VALUE ('','{$name}','{$photo}','{$take}','{$email}','{$time}','{$ip}');");
    }
}