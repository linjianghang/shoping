<?php
/**
 * Created by PhpStorm.
 * User: lin
 * Date: 2016/6/26
 * Time: 10:27
 */
class Type extends CI_Controller{
    public function index()
    {
        $this->load->database();
        $lookup = $this->db->get_where("type");
        $list = $lookup->result_array();
        foreach ($list as $data) {
            echo "<option>{$data['type']}</option>";
        }
    }
}