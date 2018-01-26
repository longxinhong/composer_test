<?php
//$lnk=mysql_connect("116.31.123.117:3306","fwmall","5br7KLsCdA")or die('Not connected:'.mysql_error());
//mysql_select_db ( 'fwmall',$lnk)or die('Can\'t use foo:'.mysql_error());  

defined('ALLOW') or die('REFUSE');

$lnk=mysql_connect("116.31.123.117:3306","sc_fwmall_com_c","eaXHkiF4KH")or die('Not connected:'.mysql_error());
mysql_set_charset('UTF8');
mysql_select_db ( 'sc_fwmall_com_c',$lnk)or die('Can\'t use foo:'.mysql_error());  


/**
 * 字符串截取，支持中文和其他编码
 *
 * @param string $str 需要转换的字符串
 * @param string $start 开始位置
 * @param string $length 截取长度
 * @param string $charset 编码格式
 * @param string $suffix 截断字符串后缀
 * @return string
 */
function substr_ext($str, $start=0, $length, $charset="utf-8", $suffix=""){
    if(function_exists("mb_substr")){
         return mb_substr($str, $start, $length, $charset).$suffix;
    }
    elseif(function_exists('iconv_substr')){
         return iconv_substr($str,$start,$length,$charset).$suffix;
    }
    $re['utf-8']  = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
    $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
    $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
    $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
    preg_match_all($re[$charset], $str, $match);
    $slice = join("",array_slice($match[0], $start, $length));
    return $slice.$suffix;
}

/**
 * 取得一个表的一个字段值
 * @param $sql
 * @return string
 */
function getOne($sql){
    $result = mysql_query($sql);
    if (mysql_num_rows($result)>0) {
        $data = mysql_fetch_array($result, MYSQL_NUM);
        return $data[0];
    } else {
        return null;
    }
}

/**
 * 查询一条记录
 * @param string $sql
 * @param string $result_type
 * @return boolean
 */
function getRow($sql,$result_type=MYSQL_ASSOC){
    $result=mysql_query($sql);
    if ($result && mysql_num_rows($result)>0){
        return mysql_fetch_array($result,$result_type);
    }else {
        return array();
    }
}
/**
 * 得到表中的所有记录
 * @param string $sql
 * @param string $result_type
 * @return boolean
 */
function getAll($sql,$result_type=MYSQL_ASSOC){
    $result=mysql_query($sql);
    if ($result && mysql_num_rows($result)>0){
        $rows = array();
        while ($row=mysql_fetch_array($result,$result_type)){
            $rows[]=$row;
        }
        return $rows;
    }else {
        return array();
    }
}

function query($sql){
    return mysql_query($sql);
}

function auto_insert($table, $data){
    $sql = "INSERT INTO $table (";
    $field = "";
    $value = "";
    foreach ($data as $k => $v){
        $field .= "$k,";
        $value .= "'$v', ";
    }
    $field = trim($field, ',');
    $value = trim($value, ',');
    $sql .= $field .") VALUES (".$value.")";
    return query($sql);
}

?>