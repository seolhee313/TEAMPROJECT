<?php
    include "../connect/connect.php";

    $commentMsg = $_POST['commentMsg'];
    $commentID = $_POST['commentID'];
    $id = $_POST['name'];
    $sql = "SELECT swMemberID FROM swComment WHERE swMemberID='$id' AND commentID='$commentID'";
    $result = $connect -> query($sql);
    
    if($result -> num_rows == 0){
        $jsonResult = "bad";
    } else {
        $sql = "UPDATE swComment SET commentMsg = '$commentMsg' WHERE commentID = '$commentID'";
        $connect -> query($sql);
        $jsonResult = "good";
    }

    echo json_encode(array("result" => $jsonResult));
?>