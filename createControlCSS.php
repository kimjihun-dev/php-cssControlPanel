<?php

    $host = "localhost";
    $user = "root";
    $pw = "1234";
    $dbName = "php200project";
    $dbConnect = new mysqli($host, $user, $pw, $dbName);
    $dbConnect->set_charset("utf8");

    if(mysqli_connect_errno()){
        echo "데이터베이스 접속실패";
    } else {
        echo "데이터베이스 정상접속";
        echo "<br>";
    }

    $sql = "CREATE TABLE controlCSS (";
    $sql .= "controlCSSID int(10) unsigned not null auto_increment,";
    $sql .= "selectorName enum('wrap','header','leftArea','rightArea','footer') not null,";
    $sql .= "floata enum('left','right','none','unser') default null,";
    $sql .= "width int(11) default null,";
    $sql .= "height int(11) default null,";
    $sql .= "background varchar(10) default null,";
    $sql .= "marginTop int(11) default null,";
    $sql .= "marginRight int(11) default null,";
    $sql .= "marginBottom int(11) default null,";
    $sql .= "marginLeft int(11) default null,";
    $sql .= "primary key (controlCSSID)";
    $sql .= ")charset=utf8";

    $res = $dbConnect->query($sql);

    if($res){
        echo "테이블 생성 완료";
    } else {
        echo "테이블 생성 실패";
    }

?>
