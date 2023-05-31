<?php
    include "../connect/connect.php";

    $swReviewID = $_POST['swReviewID'];
    $swMemberID = $_POST['swMemberID'];
    $reviewContents = $_POST['reviewContents'];
    $questionID = $_POST['questionID'];
    $questionCate = $_POST['questionCate'];
    
    $sql = "INSERT INTO swReview(swMemberID, reviewContents, questionID, questionCate) VALUES('$swMemberID', '$reviewContents', '$questionID', '$questionCate')";
    $result = $connect -> query($sql);

    echo json_encode(array("result" => $jsonResult));
?>