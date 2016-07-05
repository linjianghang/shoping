<?php
/**
 * Created by PhpStorm.
 * User: lin
 * Date: 2016/6/26
 * Time: 10:27
 */
class Min_type extends CI_Controller{
    public function index()
    {
        $this->load->database();
        $user = $_POST['name'];
        $look = $this->db->query("SELECT * FROM `type` WHERE `type`='$user';");
        $look_user=$look->result_array();
        $lookup = $this->db->query("SELECT * FROM `min_type` WHERE `u_id`='{$look_user[0]['id']}';");
        $list = $lookup->result_array();

        foreach ($list as $data) {
            echo "<option>{$data['min_type']}</option>";
        }
    }

}
