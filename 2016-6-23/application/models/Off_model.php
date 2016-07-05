<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2016/6/23
 * Time: 14:43
 */
class Off_model extends CI_Model
{
    private $username;
    public function __construct()
    {
        parent :: __construct();
    }
    public function off($username){
        $this->username=$username;
        $this->load->database();
        $userdata=$this->db->query("update `user` set `status`='0' WHERE `username`='{$username}';");

    }
}