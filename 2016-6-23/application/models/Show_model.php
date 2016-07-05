<?php
/**
 * Created by PhpStorm.
 * User: lin
 * Date: 2016/6/26
 * Time: 16:36
 */
class Show_model extends CI_Model
{

    public function __construct()
    {
        parent :: __construct();
    }
    public function show_type($id){
        $this->id=$id;
        $this->load->database();
        $look= $this->db->select('*')
                ->where('id',$id)
                ->get('min_type');
        $lookup=$look->result_array();
        $look_user=$this->db->select('*')
                    ->where('subclass',$lookup[0]['min_type'])
                    ->get('upload');
        $list=$look_user->result_array();
        return $list;
    }
    public function max_type($u_id){
        $this->id=$u_id;
        $this->load->database();
        $look= $this->db->select('*')
            ->where('id',$u_id)
            ->get('type');
        $lookup=$look->result_array();
        $look_user=$this->db->select('*')
            ->where('commodity_classification',$lookup[0]['type'])
            ->get('upload');
        $list=$look_user->result_array();
        return $list;
    }
    public function detailed($id){
        $this->id=$id;
        $this->load->database();
        $look= $this->db->select('*')
            ->where('id',$id)
            ->get('upload');
        $list=$look->result_array();
        return $list;
    }
    public function edit(){
        $this->load->database();
        $look=$this->db->get('upload');
        $list=$look->result_array();
        return $list;
    }
    public function del($id){
        $this->load->database();
        $this->db->query("delete from `upload` WHERE `id`='$id'");
        $look=$this->db->get('upload');
        $list=$look->result_array();
        return $list;
    }
    public function revise($id,$publish_id,$publish_cost,$publish_message,$uq,$content){
        $this->load->database();
        $this->db->query("update `upload` set `commodity_name`='$publish_id',`commodity_price`='$publish_cost',`commodity_information`='$publish_message',`img_information`='$uq',`content`='$content' WHERE `id`='$id'");
    }
    public function revise_value($id){
        $this->load->database();
        $look= $this->db->select('*')
            ->where('id',$id)
            ->get('upload');
        $list=$look->result_array();
        return $list;
    }
}