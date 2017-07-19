<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

if (! function_exists('get_args_by_keys')) {

    function get_args_by_keys($args, $keys)
    {
        extract($args);
        return compact($keys);
    }
}


if (! function_exists('echo_debug_msg')) {

    /**
     * 打印调试信息
     *
     * @author Mr.Nobody
     * @param string $msg
     */
    function echo_debug_msg($msg)
    {
        echo get_format_mic_timestamp(), " | {$msg} |<br/> \r\n";
    }
}

if (! function_exists('base64url_encode')) {

    /**
     * base64url_encode
     *
     * @author Mr.Nobody
     * @param string $data
     * @return string
     */
    function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
}

if (! function_exists('base64url_decode')) {

    /**
     * base64url_decode
     *
     * @author Mr.Nobody
     * @param string $data
     * @return string
     */
    function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}

if (! function_exists('get_distance')) {

    /**
     * 根据两点间的经纬度计算距离
     *
     * @author Mr.Nobody
     * @param number $lat1
     * @param number $lng1
     * @param number $lat2
     * @param number $lng2
     * @return number
     */
    function get_distance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6367000; // approximate radius of earth in meters
        $lat1 = ($lat1 * pi()) / 180;
        $lng1 = ($lng1 * pi()) / 180;
        $lat2 = ($lat2 * pi()) / 180;
        $lng2 = ($lng2 * pi()) / 180;
        $calcLongitude = $lng2 - $lng1;
        $calcLatitude = $lat2 - $lat1;
        $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);
        $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
        $calculatedDistance = $earthRadius * $stepTwo;
        return round($calculatedDistance);
    }
}

if (! function_exists('get_format_mic_timestamp')) {

    /**
     * 取一个格式化的毫秒时间戳
     * @author Mr.Nobody
     */
    function get_format_mic_timestamp()
    {
        $micro = microtime();
        $sec = intval(substr($micro, strpos($micro, " ")));
        $ms = floor($micro * 1000); // 毫秒
        return sprintf('%s.%3d', date('Y-m-d H:i:s', $sec), $ms);
    }
}


if (! function_exists('get_sign')) {

    /**
     * 计算签名
     * @author Mr.Nobody
     */
    function get_sign($key, $params, &$str, $signMethod = 'md5')
    {
        unset($params['sign']);
        $params['sign_key'] = $key;

        ksort($params);

        $str = '';

        foreach ($params as $k => $v) {
            if (is_array($v)) {
                isset($_REQUEST[$k]) && $v = $_REQUEST[$k];
                $v = json_encode($v);
            }
            if ('' == $str) {
                $str .= $k . '=' . trim($v);
            } else {
                $str .= '&' . $k . '=' . trim($v);
            }
        }
        return $signMethod($str);
    }
}



function recurse_copy($src,$dst) {  // 原目录，复制到的目录
    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recurse_copy($src . '/' . $file,$dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

function deldir($dir) {
    //先删除目录下的文件：
    $dh=opendir($dir);
    while ($file=readdir($dh)) {
        if($file!="." && $file!="..") {
          $fullpath=$dir."/".$file;
              if(!is_dir($fullpath)) {
                  unlink($fullpath);
              } else {
                  deldir($fullpath);
              }
        }
    }
    closedir($dh);
    //删除当前文件夹：
    if(rmdir($dir)) {
        return true;
    } else {
        return false;
    }
}


/**
 * [tree 递归分类]
 */
function tree($table,$pid='0',$pidName = 'pid',$childName = 'child') {
    $tree = array();
    foreach($table as $row){
        if($row[$pidName]==$pid){
            $tmp = tree($table,$row['id'],$pidName,$childName);
            if($tmp){
                $row[$childName]=$tmp;
            }
            $tree[]=$row;                
        }
    }
    return $tree;        
}



function dump($arr){
    echo "<pre>";
    print_r( $arr);
    echo "</pre>";
}




function generate_password($length = 6){
    // 密码字符集，可任意添加你需要的字符
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    // !@#$%^&*()-_ []{}<>~`+=,.;:/?|
    $password = '';
    for ( $i = 0; $i < $length; $i++ )
    {
        // 这里提供两种字符获取方式
        // 第一种是使用 substr 截取$chars中的任意一位字符；
        // 第二种是取字符数组 $chars 的任意元素
        // $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        $password .= $chars[ mt_rand(0, strlen($chars) - 1) ];
    }
    return $password;
}



//密码md5加盐
function do_hash($pwd) {
    $salt = 'fdsafagfdgv43532ju76jM';  //定义一个salt值，最好够长，或者随机
    return md5($pwd . $salt); //返回加salt后的散列
}



/**
 * 时间转化函数
 *
 * @param $now
 * @param $datetemp
 * @param $dstr
 * @return string
 */
function smartDate($datetemp, $dstr = 'Y-m-d H:i') {
    $timezone = Option::get('timezone');
    $op = '';
    $sec = time() - $datetemp;
    $hover = floor($sec / 3600);
    if ($hover == 0) {
        $min = floor($sec / 60);
        if ($min == 0) {
            $op = $sec . ' 秒前';
        } else {
            $op = "$min 分钟前";
        }
    } elseif ($hover < 24) {
        $op = "约 {$hover} 小时前";
    } else {
        $op = gmdate($dstr, $datetemp + $timezone * 3600);
    }
    return $op;
}

/**
 * 生成一个随机的字符串
 *
 * @param int $length
 * @param boolean $special_chars
 * @return string
 */
function getRandStr($length = 12, $special_chars = true) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    if ($special_chars) {
        $chars .= '!@#$%^&*()';
    }
    $randStr = '';
    for ($i = 0; $i < $length; $i++) {
        $randStr .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
    }
    return $randStr;
}

function checkAuth($class,$method,$uid){
    $CI = &get_instance();
    $CI->load->model('user_model','user');
    $user =$CI->user->getUserInfo($uid,true);
    $userRules = unserialize($user['group_rules']) ? unserialize($user['group_rules']) : array();
    $menu = $CI->db->get_where('auth_menu',array('class'=>$class))->row_array();
    $methods = $menu['method'] ? explode(',', $menu['method']) : array();
    $newArr = array();
    if($user['id'] == '1' || $user['group_id'] =='1'){
        return true;
    }

    foreach ($userRules as $key => $value) {
        if($value['id']==$menu['id']){
            $newArr = $value['rule'];
            array_push($newArr,'index');
        }
    }
    if($class != 'Index' && $method == 'index'){
        array_push($methods,'index');
    }

    $result = array_diff($methods, $newArr);
    if(in_array($method, $result)){
        return false;
    }
    return true;
}


/**
 * [getPid 获取子分类的所有父级分类]
 */
if (!function_exists('getPid')) {
    function getPid($id,$arr){
        static $list;
        foreach($arr as $v){
            if($v['id'] == $id){
                $list[] =$v;
                getPid($v['pid'],$arr);
            }
        }
        return $list;
    }
}


/**
 * 安全过滤函数
 *
 * @param $string
 * @return string
 */
function safe_replace($string) {
    $string = str_replace('%20','',$string);
    $string = str_replace('%27','',$string);
    $string = str_replace('%2527','',$string);
    $string = str_replace('*','',$string);
    $string = str_replace('"','&quot;',$string);
    $string = str_replace("'",'',$string);
    $string = str_replace('"','',$string);
    $string = str_replace(';','',$string);
    $string = str_replace('<','&lt;',$string);
    $string = str_replace('>','&gt;',$string);
    $string = str_replace("{",'',$string);
    $string = str_replace('}','',$string);
    $string = str_replace('\\','',$string);
    return $string;
}



/**
 * 递归无限级分类【先序遍历算】，获取任意节点下所有子孩子
 * @param array $arrCate 待排序的数组
 * @param int $parent_id 父级节点
 * @param int $level 层级数
 * @return array $arrTree 排序后的数组
 */
function getMenuTree($arrCat, $parent_id = 0, $level = 0)
{
    static  $arrTree = array(); //使用static代替global
    if( empty($arrCat)) return FALSE;
    $level++;
    foreach($arrCat as $key => $value)
    {
        if($value['pid' ] == $parent_id)
        {
            $value[ 'level'] = $level;
            $arrTree[] = $value;
            unset($arrCat[$key]); //注销当前节点数据，减少已无用的遍历
            getMenuTree($arrCat, $value[ 'id'], $level);
        }
    }
   
    return $arrTree;
}