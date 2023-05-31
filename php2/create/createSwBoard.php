<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE swBoard (";
    $sql .= "swBoardID int(10) unsigned auto_increment,";
    $sql .= "swMemberID int(10) unsigned NOT NULL,";
    $sql .= "boardTitle varchar(255) NOT NULL,";
    $sql .= "boardContents longtext NOT NULL,";
    $sql .= "boardCategory varchar(40) DEFAULT NULL,";
    $sql .= "boardAuthor varchar(40) NOT NULL,";
    $sql .= "boardView int(10) NOT NULL,";
    $sql .= "boardLike int(10) DEFAULT NULL,";
    $sql .= "boardImgFile varchar(100) DEFAULT NULL,";
    $sql .= "boardImgSize varchar(100) DEFAULT NULL,";
    $sql .= "boardDelete int(10) DEFAULT NULL,";
    $sql .= "boardRegTime int(10) NOT NULL,";
    $sql .= "boardModTime int(10) DEFAULT NULL,";
    $sql .= "PRIMARY KEY (swBoardID)";
    $sql .= ") charset=utf8";
    
    $connect -> query($sql);
?>