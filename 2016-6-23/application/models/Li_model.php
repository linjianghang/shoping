<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2016/6/25
 * Time: 16:16
 */
class Li_model extends CI_Model
{
    public function li()
    {
        $this->load->database();
        $lookup = $this->db->get_where("type");
        $list = $lookup->result_array();
        return $list;
    }
    public function min_li()
    {
        $this->load->database();
        $this->db->select('*');
        $this->db->from('type');
        $this->db->join('min_type','type.id=min_type.u_id');
        $query=$this->db->get();
//        $lookup = $this->db->query("SELECT * FROM `min_type`,`type` WHERE `type`.id=`min_type`.u_id;");
        $min_list = $query->result_array();
        return $min_list;
    }
    public function content()
    {
        $this->load->database();
        $lookup = $this->db->get_where('upload');
        $upload = $lookup->result_array();
        return $upload;
    }
}