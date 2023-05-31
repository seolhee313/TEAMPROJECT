<?php
    include "../connect/connect.php";
    $swMemberID = $_POST['swMemberID'];
    $msg = $_POST['msg'];
    $name = $_POST['name'];
    $id = $_POST['id'];
    $regTime = time();
    $sql = "INSERT INTO swComment(swMemberID,commentMsg,swBoardID,commentName,commentDelete,regTime) VALUES('$swMemberID','$msg','$id','$name','0','$regTime')";
    $result = $connect -> query($sql);
    echo json_encode(array("info" => $blogID));
?>