<?php
/**
 * Created by PhpStorm.
 * User: lin
 * Date: 2016/6/21
 * Time: 20:01
 */
class Login_model extends CI_Model
{
    private $user;
    public function __construct()
    {
        parent :: __construct();
    }
    public function reg($user){
        $this->user=$user;
        $this->load->database();
        $lookup=$this->db->query("select * from `user` WHERE `username`='{$user}'");
        $login_count1=$lookup->row();
        $login_count2=$login_count1->login_count;
        $time=date('Y/m/d H:i:s');
        $ip=$this->input->server('REMOTE_ADDR');
        $count=@$login_count2['login_count']+1;
        $userdata=$this->db->query("update `user` set `last_login_time`='{$time}',`last_login_ip`='{$ip}',`login_count`='{$count}',`status`='1' WHERE `username`='{$user}';");

    }
}