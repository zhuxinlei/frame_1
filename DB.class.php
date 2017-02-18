<?php
/**
 * Created by PhpStorm.
 * User: zhuxinlei
 * Date: 2017/2/18
 * Detail 连接数据库类
 */



class DB{
    private $con;
    private $db;
    private $query;
    /**
     * User: zhuxinlei
     * Date: 2017/2/18
     * Detail 连接数据库
     * mysql_connect(servername,username,password);
     */
    public function __construct($host,$username,$password,$language){
        $con = mysql_connect($host,$username,$password);
        if(!$con){
            die('连接数据库失败');
        }else{
            $this->con = $con;
        }
        if($language){
            $this->query('SET NAMES '.$language);
        }
    }
    /**
     * User: zhuxinlei
     * Date: 2017/2/18
     * Detail 选择表
     */
    public function selectDb($db){
       $this->db = mysql_select_db($db, $this->con);
    }

    /**
     * User: zhuxinlei
     * Date: 2017/2/18
     * Detail query
     */
    public function query($sql){
        $this->query = mysql_query($sql);
        return $this->query;
    }
    /**
     * User: zhuxinlei
     * Date: 2017/2/18
     * Detail 读取数据
     */
    public function fetch($sql){
        $query = $this->query($sql);
        while($row = mysql_fetch_array($query)){
            $result[] = $row;
        }
        return $result;
    }
    /**
     * User: zhuxinlei
     * Date: 2017/2/18
     * Detail 插入数据
     */
    public function insert($table_name,$data){
        $sql = 'INSERT INTO '. '`'.$table_name.'` SET ';
        foreach($data as $column_name=>$value){
            $sql .= '`'.$column_name.'` = '."'".$value."',";
        }
        $sql = substr($sql,0,-1);
        return $this->query($sql);
    }

    /**
     * User: zhuxinlei
     * Date: 2017/2/18
     * Detail 删除数据
     */
    public function delete($sql){
        return $this->query($sql);
    }

    /**
     * User: zhuxinlei
     * Date: 2017/2/18
     * Detail 更新数据
     */
    public function update($table_name,$data,$where){
        $sql = 'update `'.$table_name.'` set ';
        foreach($data as $column_name=>$value){
            $sql .= "`$column_name`= "."'".$value."',";
        }
        $sql = substr($sql,0,-1);
        $sql .= ' where '.$where;   
        return $this->query($sql);
    }


}
?>