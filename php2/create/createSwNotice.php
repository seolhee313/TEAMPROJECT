<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE swNotice (";
    $sql .= "swNoticeID int(10) unsigned auto_increment,";
    $sql .= "swMemberID int(10) unsigned NOT NULL,";
    $sql .= "noticeTitle varchar(255) NOT NULL,";
    $sql .= "noticeContents longtext NOT NULL,";
    $sql .= "noticeCategory varchar(40) DEFAULT NULL,";
    $sql .= "noticeImgFile varchar(100) DEFAULT NULL,";
    $sql .= "noticeImgSize varchar(100) DEFAULT NULL,";
    $sql .= "noticeDelete int(10) DEFAULT NULL,";
    $sql .= "noticeRegTime int(10) NOT NULL,";
    $sql .= "noticeModTime int(10) DEFAULT NULL,";
    $sql .= "PRIMARY KEY (swNoticeID)";
    $sql .= ") charset=utf8";
    
    $connect -> query($sql);
?>