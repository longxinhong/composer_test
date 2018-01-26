<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/26 0026
 * Time: 8:38
 */

namespace api\controller;


use core\Response;

class Theme extends Base
{
    /**
     * 创建圈子
     */
    public function save_theme(){
        // 会员信息
        $this->c_memberInfo();
        // 圈子信息
        $this->circleInfo();
//        会员基础信息
        $this->member_info();

        // 不是圈子成员不能发帖
        if(!in_array($this->identity, array(1,2,3))){
            return Response::show(2, '不是圈子成员，不能发布信息');
        }
        // 主题分类
        $thclass_id = intval($_POST['thtype']);
        $thclass_name = '';
        if($thclass_id > 0){
            $thclass_info = getRow("SELECT thclass_name FROM shopnc_circle_thclass WHERE thclass_id  = $thclass_id");
            $thclass_name = $thclass_info['thclass_name'];
        }

    }
}