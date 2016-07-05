<?php
class User extends CI_Controller {
    // index
    public function index()
    {
        // 引用注册方法 即显示注册页面
        $this->home();
        // 获取生成验证码是存入session的code；并获取显示出来查看是否正确
    }
    // 注册页面方法
    public function register(){

        //获取form链接到这
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        // 设置用户名、密码、验证码  自定义用户规则（判断方法）
        $this->form_validation->set_rules('username', '用户名', 'callback_username_check');
        $this->form_validation->set_rules('password', '密码', 'required|min_length[6]',array('required'=>'密码不能为空','min_length'=>'密码不能少于6位'));
        $this->form_validation->set_rules('email', '邮箱', 'required|regex_match[/[0-9][@][A-Za-z0-9]*[.][com]/]',array('required'=>'邮箱不能为空','regex_match'=>'请正确输入邮箱'));
        $this->form_validation->set_rules('code', 'vcode', 'callback_code_check');
        // 如果上面的设置有错误的 则返回到方法register
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('register');

        }
        // 如果成则跳转到注册成功页面 并把数据写入数据库
        else
        {
            //用户名
            $username=$this->input->post('username');
            //密码
            $password=md5($this->input->post('password'));
            $email=$this->input->post('email');
            //加载model
            $this->load->model('Register_model');
            //把用户信息传进类中处理
            $a=$this->Register_model->reg($username,$password,$email);
           // 显示用户注册成功页面
            $this->load->view('registersuccess');
        }
    }
    // 检查注册用户名的方法（规则）
    public function username_check($username){
        //$username=$this->input->post('username');
        // 检查用户名是否为邮箱或密码的正则方法
        $mail = "/[0-9][@][A-Za-z0-9]*[.][com]/";
        $phone = "/^[1]{1}[0-9]{10}$/";
        $this->load->database();
        $seekuser = $this->db->get_where('user', array('username' => $username));
        $seek = $seekuser->result_array();
        $seek = @$seek['0']['username'];

        // 检查用户名是否为空
        if (empty($username)) {
            $this->form_validation->set_message('username_check', '用户名不能为空');
            return false;
        }
        if(!preg_match($mail,$username) && !preg_match($phone,$username)){
            $this->form_validation->set_message('username_check','用户名必须为手机号或密码');
            return false;
        }
        if ($username = $seek) {
            $this->form_validation->set_message('username_check', '用户名已经存在');
            return false;
        };
        // 检查用户名为邮箱或密码时返回true

    }
    // 检查注册验证码的方法（规则）
    public function code_check($code){

//        $code=$this->input->post('code');
        //todo 验证码
        //todo 初始化session
        $this->load->library('session');
        $vcode = $this->session->vcode;

        if ( $code != $vcode ) {
            $this->form_validation->set_message('code_check', '验证码错误');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
    // 登录时方法
    public function login(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        // 用户名登录、密码、验证码  自定义用户规则（判断方法）
        $this->form_validation->set_rules('user', '用户名', 'callback_user_login');
        $this->form_validation->set_rules('pass', '密码', 'callback_pass_login');
        // 如果上面的设置有错误的 则返回到方法login
        if ($this->form_validation->run() == FALSE)
        {

            $this->load->view('login');
        }
        // 否则跳转到登录成功页面
        else {
            $this->load->database();
            $user=$this->input->post('user');
            // 添加cookie

            $this->input->set_cookie('username',$user,36000);
            //加载model
            $this->load->model('Login_model');
            //把用户信息传进类中处理
            $this->Login_model->reg($user);

            $this->load->view('loginsuccess');
        }
    }
    // 检查用户名登录用户名的方法（规则）
    public function user_login($user){
        //$user=$this->input->post('user');
        // 连接数据库
        $this->load->database();
        $userdata=$this->db->get_where('user',array('username'=>$user));
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
        $userdata=$this->db->get_where('user',array('username'=>$user));
        $seek=$userdata->result_array();
        // 检查输入密码是否为空
        if(empty($pass)){
            $this->form_validation->set_message('pass_login','密码不能为空');
            return false;
        }
        $pass=md5($pass);
        // 如果输入的密码一致则返回true
        if($pass != $seek[0]['password']){
            $this->form_validation->set_message('pass_login','密码错误');
            return false;

        }
    }
    //显示首页
    public function home(){
        $this->load->model('Li_model');
        //把用户信息传进类中处理
        $list=$this->Li_model->li();
        $min_list=$this->Li_model->min_li();
        $content=$this->Li_model->content();
        $this->load->view('home',array('list'=>$list,'min_list'=>$min_list,'content'=>$content));
    }
    //注销用户
    public function off(){
        $username=$this->input->cookie('username');
        //加载model
        $this->load->model('Off_model');
        $a=$this->Off_model->off($username);
        //删除cookie
        $this->input->set_cookie('username','',1);
        $this->load->view('home');
    }
    //todo 使用frameset显示首页  （未完成）
    public function homes(){
        $this->load->view('home/homes');
    }
    public function homes_top(){
        $this->load->view('home/top');
    }
    public function homes_img(){
        $this->load->view('home/img');
    }
    public function homes_left(){
        $this->load->view('home/left');
    }
    public function homes_show_list(){
        $this->load->model('Li_model');
        $content=$this->Li_model->content();
        $this->load->view('home/show_list',array('content'=>$content));
    }
    public function shop(){
        $this->load->library('session');
        $shop_cont=$this->session->userdata('shop');
        $this->load->view('shop',array('list'=>$shop_cont));
    }
    //添加商品
    public function join_shop($id){
        //如果登陆了
        if($this->input->cookie('username')){
            $this->load->helper(array('url'));
            $this->load->model('Shop_model');
//            $publish_name=$this->input->cookie('username');
            //todo 商品的数量
//            $number=$_POST("number");
            $number=2;
            $add=$this->Shop_model->add_shop($id,$number);
//            $this->load->view('shop_success');
            $this->load->model('Li_model');
            //把用户信息传进类中处理
            $list=$this->Li_model->li();
            $min_list=$this->Li_model->min_li();
            $content=$this->Li_model->content();
            $this->load->view('home',array('list'=>$list,'min_list'=>$min_list,'content'=>$content));
        }else{
            $this->load->view('login');
        }

    }
    //删除商品
    public function del($id){
        $this->load->model('Shop_model');
        $this->Shop_model->del($id);
        $this->load->library('session');
        $shop_cont=$this->session->userdata('shop');
        $this->load->view('shop',array('list'=>$shop_cont));
    }
    //修改商品数量
    public function modify($id){
        $this->load->model('Shop_model');
        $number=50;
        $this->Shop_model->modify($id,$number);
        $this->load->library('session');
        $shop_cont=$this->session->userdata('shop');
        $this->load->view('shop',array('list'=>$shop_cont));
    }
    //清空购物车
    public function clear(){
        $this->load->model('Shop_model');
        $this->Shop_model->clear();
        $this->load->library('session');
        $shop_cont=$this->session->userdata('shop');
        $this->load->view('shop',array('list'=>$shop_cont));
    }
    //收货人信息
    public function goods(){
        $this->output->set_header("Content-Type: text/html; charset=utf-8");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','name', 'required',array('required'=>'收货人不能为空'));
        $this->form_validation->set_rules('phone','phone', 'required|greater_than[11]',array('required'=>'收货人电话不能为空','greater_than'=>'请正确输入手机号'));
        $this->form_validation->set_rules('take','take', 'required',array('required'=>'收货地址不能为空'));
        $this->form_validation->set_rules('email','email', 'required',array('required'=>'邮箱不能为空'));
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('goods');
        }else{
            $name=$this->input->post("name");
            $photo=$this->input->post("phone");
            $take=$this->input->post("take");
            $email=$this->input->post("email");
            $this->load->model('Goods_model');
            $this->Goods_model->goods($name,$photo,$take,$email);
            $this->load->view("goods_success");
        }

    }
}
