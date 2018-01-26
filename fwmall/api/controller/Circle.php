<?php namespace api\controller;
use core\Response;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23 0023
 * Time: 15:34
 */
class Circle extends Base {
    protected $t_id = 0;		// 话题id
    protected $theme_info = array();	// 话题详细信息
    protected $r_id = 0;		// 回复id
    protected $reply_info = array();	// reply info

    /**
     * 加入圈子
     */
    public function apply(){
        $this->member_id = I('member_id', 0, 'intval');
        $this->c_id = I('circle_id', 0, 'intval');
        if (empty($this->member_id) || empty($this->c_id)) {
            return Response::show(0 , '参数错误');
        }
        // 会员信息
        $member_info = $this->member_info();
        $this->c_memberInfo($this->member_id, $this->c_id);
        $this->circleInfo($this->c_id);
        if(in_array($this->identity, array(1,2,3,4))){
            return Response::show(2 , '您已发出申请或已是该圈子成员');
        }
//      用户等级
        $data = circle_member_level('circle_level');
        $insert = array();
        $insert['cm_applycontent']	= $_POST['apply_content'];
        $insert['cm_intro']			= $_POST['intro'];
        $insert['member_id']		= $this->member_id;
        $insert['circle_id']		= $this->c_id;
        $insert['circle_name']		= $this->circle_info['circle_name'];
        $insert['member_name']		= $member_info['member_name'];
        $insert['cm_applytime']		= $insert['cm_jointime']	= time();
        $insert['cm_level']			= $data[1]['mld_id'];
        $insert['cm_levelname']		= $data[1]['mld_name'];
        $insert['cm_exp']			= 1;
        $insert['cm_nextexp']		= $data[2]['mld_exp'];
        $insert['cm_state']			= intval($this->circle_info['circle_joinaudit']) == 0 ? 1 : 0;
        $insert['is_identity']		= 3;
        auto_insert('shopnc_circle_member', $insert);

        if(intval($this->circle_info['circle_joinaudit']) == 0){
            // Update the number of members
            query("UPDATE shopnc_circle SET circle_mcount = circle_mcount+1 WHERE circle_id = ".$this->c_id);
        }else{
            // Update is applying for membership
            query("UPDATE shopnc_circle SET new_verifycount = new_verifycount+1 WHERE circle_id = ".$this->c_id);
        }
        return Response::show(1, '申请成功');
    }

    public function circle(){

    }

    public function test(){
        $data = circle_member_level('circle_level');
        dd($data);
    }

}