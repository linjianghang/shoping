<?php
class Code_model extends CI_Model{
    public function codeimg(){
        //������֤��ͼƬ
        $this->load->library('session');
//        header("Content-type: image/png");
        $str="1,2,3,4,5,6,7,8,9";
        $list=explode(',',$str);
        $cmax = count($list) - 1;
        $verifyCode = '';
        for($i=0;$i<5;$i++){
            $randnum=mt_rand(0,$cmax);
            $verifyCode .= $list[$randnum];
        }

        //���ַ�����SESSION��
//        if(isset($this->session->code)){
//            $this->session->unset_userdata('code');
//        }
        $this->session->vcode=$verifyCode;
//        var_dump($this->session->vcode);
//        session_start();
//        if(isset($_SESSION['code'])){
//            unset($_SESSION['code']);
//        }
//        $_SESSION['code']=$verifyCode;
        //����ͼƬ
        $im = imagecreate(58,28);
        $black = imagecolorallocate($im, 180,10,200);     //��������������Ϊ���õ���ɫ
        $white = imagecolorallocate($im, 255,255,255);
        $gray = imagecolorallocate($im, 200,200,200);
        $red = imagecolorallocate($im, 255, 0, 0);
        imagefill($im,0,0,$gray);     //��ͼƬ�����ɫ
        imagestring($im, 5, 10, 8, $verifyCode, $black);
        for($i=0;$i<80;$i++){
            imagesetpixel($im, rand(0,58) , rand(0,28) , $black);    //�����״������
            imagesetpixel($im, rand(0,58) , rand(0,28) , $red);
            imagesetpixel($im, rand(0,58) , rand(0,28) , $gray);
        }
        imagepng($im);
        imagedestroy($im);
    }
}