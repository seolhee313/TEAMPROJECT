<?php
    include "../connect/connect.php";
    $sql = "CREATE TABLE swReview (";
    $sql .= "swReviewID int(10) unsigned auto_increment,";
    $sql .= "swMemberID int(10) unsigned,";
    $sql .= "reviewContents longtext NOT NULL,";
    $sql .= "questionID int(10) unsigned,";
    $sql .= "questionCate varchar(40) DEFAULT NULL,";
    $sql .= "PRIMARY KEY (swReviewID)";
    $sql .= ") charset=utf8";
    $result = $connect-> query($sql);
?>