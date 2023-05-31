<?php
    include "../connect/connect.php";

    $swReviewID = $_POST['swReviewID'];
    $swMemberID = $_POST['swMemberID'];
    $questionID = $_POST['questionID'];
    $reviewContents = $_POST['reviewContents'];
    $questionCate = $_POST['questionCate'];
    $sql = "UPDATE swReview SET reviewContents = '$reviewContents' WHERE swMemberID = '$swMemberID' AND questionID = '$questionID' AND questionCate = '$questionCate'";
    $result = $connect->query($sql);
    
    echo json_encode(array("result" => $jsonResult));
?>