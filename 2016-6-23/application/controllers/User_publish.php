<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 2016/6/25
 * Time: 9:26
 */
class User_publish extends CI_Controller
{
    public function index(){
        $this->con_login();
    }
    public function con_login(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        // 用户名登录、密码、验证码  自定义用户规则（判断方法）
        $this->form_validation->set_rules('user', '用户名', 'callback_user_login');
        $this->form_validation->set_rules('pass', '密码', 'callback_pass_login');
        // 如果上面的设置有错误的 则返回到方法login
        if ($this->form_validation->run() == FALSE)
        {

            $this->load->view('admin_login');
        }
        // 否则跳转到登录成功页面
        else {
            $this->load->database();
            $user=$this->input->post('user');
            //加载model
            $this->load->model('Admin_model');
            //把用户信息传进类中处理
            $reg=$this->Admin_model->reg($user);
//            //加密cookie
//            $this->load->library('encryption');
//            //序列化加密内容
//            $user = $this->encryption->encrypt(serialize($user));
            // 添加cookie
            $this->input->set_cookie('admin',$user,86400*7);
            $this->load->view('admin_success');
        }
    }
    // 检查用户名登录用户名的方法（规则）
    public function user_login($user){
        //$user=$this->input->post('user');
        // 连接数据库
        $this->load->database();
        $userdata=$this->db->get_where('admin',array('username'=>$user));
        $seek=$userdata->result_array();
        // 检查输入用户是否为空
        if(empty($user)){
            $this->form_validation->set_message('user_login','用户名不能为空');
            return false;
        }
        if($user != @$seek[0]['username']){
            $this->form_validation->set_message('user_login','用户名错误');
            return false;
        }
    }
    // 检查用户名登录密码的方法（规则）
    public function pass_login($user,$pass){
        $pass=$this->input->post('pass');
        $user=$this->input->post('user');
        // 连接数据库
        $this->load->database();
        $userdata=$this->db->get_where('admin',array('username'=>$user));
        $seek=$userdata->result_array();

        // 检查输入密码是否为空
        if(empty($pass)){
            $this->form_validation->set_message('pass_login','密码不能为空');
            return false;
        }
        // 如果输入的密码一致则返回true
        if($pass != $seek[0]['password']){
            $this->form_validation->set_message('pass_login','密码错误');
            return false;

        }
    }
//商品发布
    public function publish(){
        $this->output->set_header("Content-Type: text/html; charset=utf-8");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $uniqid=uniqid();
        //todo 初始化文件上传类
        $config['upload_path']      = './upload/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 1024;
        $config['file_name']=$uniqid;
        $this->load->library('upload', $config);
        $this->form_validation->set_rules('publish_id','商品名称', 'required',array('required'=>'商品名不能为空'));
        $this->form_validation->set_rules('publish_cost','商品价格', 'required',array('required'=>'商品价格不能为空'));
        $this->form_validation->set_rules('publish_message','商品信息', 'required',array('required'=>'商品信息不能为空'));
        $this->form_validation->set_rules('content','详细信息', 'required',array('required'=>'商品详细信息不能为空'));
        if ($this->form_validation->run() == FALSE || !$this->upload->do_upload('publish_img'))
        {
            $this->load->view('publish');
        }else{
            //商品分类
            $type=$this->input->post('type');
            $min_type=$this->input->post('min_type');
            //商品名称
            $publish_id=$this->input->post('publish_id');
            //商品价格
            $publish_cost=$this->input->post('publish_cost');
            //商品信息
            $publish_message=$this->input->post('publish_message');
            $content=$this->input->post('content');
            //加载model
            $this->load->model('Publish_model');
            //把用户信息传进类中处理
            $a=$this->Publish_model->pub($type,$min_type,$publish_id,$publish_cost,$publish_message,$uniqid,$content);
            $this->load->view('publishsuccess');
        }

    }
    //todo 处理显示商品子类
    public function show_type($id){
        $this->load->model('Show_model');
        $list=$this->Show_model->show_type($id);
        $this->load->view("show_type",array('list'=>$list));
    }
    //todo 处理显示商品子父类
    public function max_type($u_id){
        $this->load->model('Show_model');
        $list=$this->Show_model->max_type($u_id);
        $this->load->view("max_type",array('list'=>$list));
    }
    //todo 商品详情
    public function detailed($id){
        $this->load->model('Show_model');
        $list=$this->Show_model->detailed($id);
        $this->load->view("detailed",array('list'=>$list));
    }

    public function edit(){
        $this->load->model('Show_model');
        $list=$this->Show_model->edit();
        $this->load->view("edit",array('content'=>$list));
    }
    //商品删除
    public function del($id){
        $this->load->model('Show_model');
        $list=$this->Show_model->del($id);
        $this->load->view("edit",array('content'=>$list));
    }
    //商品修改
    public function revise($id){
        $this->output->set_header("Content-Type: text/html; charset=utf-8");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $uq=uniqid();
        //todo 初始化文件上传类
        $config['upload_path']      = './upload/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 1024;
        $config['file_name']=$uq;
        $this->load->library('upload', $config);
        $this->form_validation->set_rules('publish_id','商品名称', 'required',array('required'=>'商品名不能为空'));
        $this->form_validation->set_rules('publish_cost','商品价格', 'required',array('required'=>'商品价格不能为空'));
        $this->form_validation->set_rules('publish_message','商品信息', 'required',array('required'=>'商品信息不能为空'));
        $this->form_validation->set_rules('content','详细信息', 'required',array('required'=>'商品详细信息不能为空'));
        if ($this->form_validation->run() == FALSE || !$this->upload->do_upload('publish_img'))
        {
            $this->load->view('revise');
        }else{
            //商品名称
            $publish_id=$this->input->post('publish_id');
            //商品价格
            $publish_cost=$this->input->post('publish_cost');
            //商品信息
            $publish_message=$this->input->post('publish_message');
            $content=$this->input->post('content');
            //加载model
            $this->load->model('Show_model');
            //把用户信息传进类中处理
            $a=$this->Show_model->revise($id,$publish_id,$publish_cost,$publish_message,$uq,$content);
            $this->load->view('revise_success');
        }
    }
}