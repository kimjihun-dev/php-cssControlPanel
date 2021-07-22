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

    $sql = "SELECT * FROM controlCSS";
    $result = $dbConnect->query($sql);
    $dataCount = $result->num_rows;

    $cssSelectorList = array();

    for ($i = 0; $i < $dataCount; $i++){
        $cssData = $result->fetch_array(MYSQLI_ASSOC);
        array_push($cssSelectorList, $cssData);
    }

    $floatList = array();
    $floatList = ['left','right','none','unset'];

    $borderWidthList = array();
    $borderWidthList = range(1, 10);
?>
<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CSS CONTROL PANEL</title>
</head>
<style>
    span { float: left; margin-left: 10px; padding: 10px; border: 1px solid black; }
</style>
<body>
    <div class="wrap">
        <h1>CSS CONTROL PANLE</h1>
        <br>
        <?php
            foreach ($cssSelectorList as $csl){
        ?>
        <span>
            <h2><?= $csl['selectorName'] ?></h2>
            <form action="controlPanelSave.php" method="post" name="wrap">
                <h3>흐름</h3>
                <select name="float">
                    <?php
                        foreach ($floatList as $fl){
                            $isChecked = '';
                            if( $fl == $csl['floata'] ) {
                                $isChecked = 'selected';
                            }
                            echo "<option value='{$fl}' $isChecked>{$fl}</option>";
                        }
                    ?>
                </select>
                <h3>가로길이</h3>
                <input type="number" name="width" value="<?= $csl['width'] ?>">px
                <br>
                <h3>세로길이</h3>
                <input type="number" name="height" value="<?= $csl['height'] ?>">px
                <br>
                <h3>배경색</h3>
                <input type="color" name="background" value="<?= $csl['background'] ?>">
                <br>
                <h3>바깥여백</h3>
                위<br>
                <input type="number" name="marginTop" value="<?= $csl['marginTop'] ?>">px
                <br><br>
                오른쪽<br>
                <input type="number" name="marginRight" value="<?= $csl['marginRight'] ?>">px
                <br><br>
                아래<br>
                <input type="number" name="marginBottom" value="<?= $csl['marginBottom'] ?>">px
                <br><br>
                왼쪽<br>
                <input type="number" name="marginLeft" value="<?= $csl['marginLeft'] ?>">px
                <br><br>
                <input type="hidden" name="selectorName" value="<?= $csl['selectorName'] ?>">
                <input type="submit" value="<?= $csl['selectorName'] ?> 적용">
            </form>
        </span>
        <?php }  ?>
    </div>
</body>
</html>
