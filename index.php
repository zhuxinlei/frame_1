<?php
/**
 * Created by PhpStorm.
 * User: zhuxinlei
 * Date: 2017/2/18
 * Time: 下午2:48
 */
include('DB.class.php');
//连接数据库
$db = new DB('127.0.0.1','root','zhuxinlei','utf8');
//读取
$db->selectDb('aishangjia');
$res = $db->fetch('select * from `asj_goods` limit 2');



//插入
$db->selectDb('test_good_doctor');
$info['tngou_id'] = 12;
$info['name'] = 'zhuxinlei';
$info['ordering'] = 13;
$db->insert('gd_type',$info);

//更新
$data['name'] = 'her';
$data['ordering'] = 2;
$upd = $db->update('gd_type',$data,'id = 26');

?>