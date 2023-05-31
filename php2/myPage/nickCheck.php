<?php
    include "../connect/connect.php";
    $type = $_POST['type'];
    $jsonResult = "bad";
    if( $type == "isNickCheck"){
        $youNick = $connect -> real_escape_string(trim($_POST['youNickChange']));
        $sql = "SELECT youNick FROM swMember WHERE youNick = '{$youNick}'";
    }
    $result = $connect -> query($sql);
    if( $result -> num_rows == 0 ){
        $jsonResult = "good";
    }
    echo json_encode(array("result" => $jsonResult));
?>