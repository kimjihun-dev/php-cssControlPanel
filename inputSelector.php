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

    $selectorList = array();
    $selectorList = ['wrap','header','leftArea','rightArea','footer'];

    foreach ($selectorList as $sl) {
        $sql = "INSERT INTO controlCSS (selectorName, floata, width, height, background, marginTop,";
        $sql .= "marginRight, marginBottom, marginLeft) VALUES ('{$sl}','unset',0,0,'',0,0,0,0);";
        $result = $dbConnect->query($sql);

        if($result){
            echo "셀렉터 {$sl} 입력 성공";
        } else {
            echo "셀렉터 {$sl} 입력 실패";
        }
        echo "<br>";
    }
?>
