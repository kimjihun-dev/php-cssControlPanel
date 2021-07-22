<?php
    $host = "localhost";
    $user = "root";
    $pw = "1234";
    $dbName = "php200project";
    $dbConnect = new mysqli($host, $user, $pw, $dbName);
    $dbConnect->set_charset("utf8");

    if(mysqli_connect_errno()){
        echo "데이터베이스 접속실패";
    }

    $selectorName = $_POST['selectorName'];

    if($selectorName == ''){
        echo "값을 입력하세요";
    } else {
        $float = $_POST['float'];
        $width = (int) $_POST['width'];
        $height = (int) $_POST['height'];
        $background = $_POST['background'];

        $marginTop = (int) $_POST['marginTop'];
        $marginRight = (int) $_POST['marginRight'];
        $marginBottom = (int) $_POST['marginBottom'];
        $marginLeft = (int) $_POST['marginLeft'];

        // update
        $sql = "UPDATE controlCSS SET floata='{$float}',width='{$width}',height='{$height}',background='{$background}',";
        $sql .= "marginTop='{$marginTop}',marginRight='{$marginRight}',marginBottom='{$marginBottom}',";
        $sql .= "marginLeft='{$marginLeft}' WHERE selectorName='{$selectorName}'";

        $result = $dbConnect->query($sql);

        if( $result ){
            echo "변경 완료";
        } else {
            echo "실패";
        }

    }
    
    echo "<br>";
    echo "<a href='./index.php'>CSS 디자인 페이지로 이동</a>";
    echo "<br>";
    echo "<a href='./controlPanel.php'>CSS 컨트롤 페이지로 이동</a>";
?>
