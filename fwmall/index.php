<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/23 0023
 * Time: 15:15
 */

ini_set("display_errors", 1);
//error_reporting(E_ALL ^ E_NOTICE);
//error_reporting(E_ALL ^ E_WARNING);
error_reporting(E_ALL ^ E_DEPRECATED);  //屏蔽 因使用mysql系列方法 的DEPRECATED错误信息

define('ALLOW', 1);
include './db.php';
include 'vendor/autoload.php';
core\Frame::run();