<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2016/6/23
 * Time: 9:08
 */
class Verify extends CI_Controller{
    public function Index(){
        $this->load->model('Code_model');
        $this->Code_model->codeimg();
    }
}