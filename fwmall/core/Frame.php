<?php namespace core;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23 0023
 * Time: 15:17
 */
class Frame{
    public static function run(){
        self::parseUrl();
    }
    public static function parseUrl(){
        if(isset($_GET['s'])){
            $info = explode('/', $_GET['s']);
            count($info) == 2 or Response::show(0, '参数错误');
            $class = '\api\controller\\'.ucfirst($info[0]);
            $action =$info[1];
        } else {
            $class = '\api\controller\Circle';
            $action = "circle";
        }
        $obj = new $class;
        $obj -> $action();
//        ( new $class )->$action();  //此方法要求PHP版本较高
    }
}