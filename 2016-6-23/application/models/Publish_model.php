<?php
/**
 * Created by PhpStorm.
 * User: lin
 * Date: 2016/6/24
 * Time: 13:26
 */
class Publish_model extends CI_Model
{
    private $type;
    private $min_type;
    private $publish_id;
    private $publish_cost;
    private $publish_message;
    private $uniqid;
    private $content;
    public function __construct(){
        parent::__construct();
    }
    public function pub($type,$min_type,$publish_id,$publish_cost,$publish_message,$uniqid,$content){
        $this->type=$type;
        $this->min_type=$min_type;
        $this->publish_id=$publish_id;
        $this->publish_cost=$publish_cost;
        $this->publish_message=$publish_message;
        $this->uniqid=$uniqid;
        $this->content=$content;
        //连接数据库
        $this->load->database();
        //todo 图片信息
        //上传时间
        $time=date('Y/m/d H:i:s');
        //发布者
        $publisher=$this->input->cookie('admin');
        //上传ip
        $ip=$this->input->server('REMOTE_ADDR');
        //todo 写入用户信息到数据库
        $this->db->query("insert into `upload` VALUE ('','{$type}','{$min_type}','{$publisher}','{$publish_id}','{$publish_cost}','{$publish_message}','{$content}','{$uniqid}','{$time}','{$ip}');");

    }
}