<?php
    header("Content-type: text/css");

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

    $sql = "SELECT * FROM controlCSS";
    $result = $dbConnect->query($sql);

    $dataCount = $result->num_rows;

    $cssSource = "";

    for ($i = 0; $i < $dataCount; $i++){
        $cssInfo = $result->fetch_array(MYSQLI_ASSOC);
        $cssSource .= "#".$cssInfo['selectorName']."{";
        $cssSource .= "float:".$cssInfo['floata'].";";
        $cssSource .= "width:".$cssInfo['width']."px;";
        $cssSource .= "height:".$cssInfo['height']."px;";
        $cssSource .= "background:".$cssInfo['background'].";";
        $cssSource .= "margin-top:".$cssInfo['marginTop']."px;";
        $cssSource .= "margin-right:".$cssInfo['marginRight']."px;";
        $cssSource .= "margin-bottom:".$cssInfo['marginBottom']."px;";
        $cssSource .= "margin-left:".$cssInfo['marginLeft']."px;";
        $cssSource .= "}";
    }

    echo $cssSource;
?>