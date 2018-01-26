<?php namespace api\controller;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23 0023
 * Time: 16:08
 */
class Base{
    protected $identity = 0;	// 身份	0游客 1圈主 2管理 3成员 4申请中 5申请失败 6禁言
    protected $member_id;
    protected $member_info;
    protected $c_id;   //circle_id
    protected $ads_circle_id = 9;  //圈子id
    protected $circle_info = array();	// 圈子详细信息
    protected $cm_info = array();		// Members of the information
    public function __construct()
    {
//    验证圈子是否开启
    }
//    会员基础信息
    public function member_info($member_id){
        if (empty($this->member_info)) {
            $this->member_info = getRow("SELECT member_id, member_name FROM shopnc_member WHERE member_id = '$member_id'");
        }
        return $this->member_info;
    }
    public function c_memberInfo($member_id, $c_id){
        $cm_info = getRow("SELECT cm_state, is_allowspeak, is_identity FROM shopnc_circle_member WHERE circle_id = '$c_id' AND member_id = '$member_id'");
        if (!empty($cm_info)) {
            switch (intval($cm_info['cm_state'])){
                case 1: //审核通过
                    $this->identity = intval($cm_info['is_identity']);
                    break;
                case 0: //申请中
                    $this->identity = 4;
                    break;
                case 2: //未通过
                    $this->identity = 5;
                    break;
            }
            if($cm_info['is_allowspeak'] == 0){
                $this->identity = 6;
            }
            $this->cm_info = $cm_info;
        }
    }
    /**
     * circle 信息
     */
    public function circleInfo($c_id){
        if (empty($this->circle_info)) {
            $sql = "SELECT * FROM shopnc_circle WHERE circle_id = '$c_id'";
            $this->circle_info = getRow($sql);
        }
        return $this->circle_info;
    }

}