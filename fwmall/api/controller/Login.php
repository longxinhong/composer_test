<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/25 0025
 * Time: 10:03
 */

namespace api\controller;
use core\Response;

class Login
{
    /**
     * 登陆
     * @return string
     */
    public function login(){
        $openid = i('openid', '');
        $phone = i('phone', '', 'trim');
        $pwd = i('password', '', 'trim');
        if (empty($phone) || empty($pwd)) {
            return Response::show(0, '参数错误');
        }
        $pwd = encrypt(trim($_POST['password']));
        $sql = "select member_id,member_name,member_truename,member_avatar,member_email,member_areaid,member_cityid,member_provinceid,member_areainfo,member_type from shopnc_member where member_name = '".$phone."' and member_passwd = '".$pwd."'";
        $member = getRow($sql);
        if ($member) {
            if (!empty($openid)) {
                $sql = "select * from shopnc_member_wx where openid='".$_POST['openid']."'";
                $arr1 = getRow($sql);
                if(!$arr1){
                    $sql = "insert into shopnc_member_wx(openid,member_id) value('".$_POST['openid']."','".$member['member_id']."')";
                    $q1 = query($sql);
                }
            }
            return Response::show(1, '登陆成功', $member);
        }else{
            return Response::show(2, '用户名或密码错误');
        }
    }

    /**
     * 注册
     */
    public function register(){

    }
}