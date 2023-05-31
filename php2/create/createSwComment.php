<?php
    include "../connect/connect.php";
    $sql = "CREATE TABLE swComment (";
    $sql .= "commentID int(10) unsigned auto_increment,";
    $sql .= "swMemberID int(10) unsigned,";
    $sql .= "swBoardID int(100) unsigned,";
    $sql .= "commentName varchar(10) NOT NULL,";
    $sql .= "commentMsg varchar(255) NOT NULL,";
    $sql .= "commentDelete int(10) NOT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (commentID)";
    $sql .= ") charset=utf8";
    $connect -> query($sql);
?>