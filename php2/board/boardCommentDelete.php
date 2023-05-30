<?php
    include "../connect/connect.php";
    $id = $_POST['name'];
    $commentID = $_POST['commentID'];
    $sql = "SELECT swMemberID FROM swComment WHERE swMemberID='$id' AND commentID='$commentID'";
    $result = $connect -> query($sql);
    if($result -> num_rows == 0){
        $jsonResult = "bad";
    } else {
        $sql = "DELETE FROM swComment WHERE swMemberID='$id' AND commentID='$commentID'";
        $connect -> query($sql);
        $jsonResult = "good";
    }
    echo json_encode(array("result" => $jsonResult));
?>