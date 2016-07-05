<?php
/**
 * Created by PhpStorm.
 * User: lin
 * Date: 2016/6/21
 * Time: 20:01
 */
class Register_model extends CI_Model
{
    private $username;
    private $password;
    private $email;
    public function __construct()
    {
        parent :: __construct();
    }
    public function reg($username,$password,$email){
        $this->username=$username;
        $this->password=$password;
        $this->email=$email;
        //todo 连接数据库
        $this->load->database();
        //注册时间
        $time=date('Y/m/d H:i:s');
        //注册IP
        $ip=$this->input->server('REMOTE_ADDR');
        //todo 写入用户信息到数据库
        $this->db->query("insert into `user` VALUE ('','{$username}','{$password}','$email','{$time}','{$ip}','','','','');");

    }
}