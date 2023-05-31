<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE swEvent (";
    $sql .= "swEventID int(10) unsigned auto_increment,";
    $sql .= "swMemberID int(10) unsigned NOT NULL,";
    $sql .= "eventTitle varchar(255) NOT NULL,";
    $sql .= "eventContents longtext NOT NULL,";
    $sql .= "eventCategory varchar(40) DEFAULT NULL,";
    $sql .= "eventImgFile varchar(100) DEFAULT NULL,";
    $sql .= "eventImgSize varchar(100) DEFAULT NULL,";
    $sql .= "eventDelete int(10) DEFAULT NULL,";
    $sql .= "eventRegTime int(10) NOT NULL,";
    $sql .= "eventModTime int(10) DEFAULT NULL,";
    $sql .= "PRIMARY KEY (swEventID)";
    $sql .= ") charset=utf8";
    
    $connect -> query($sql);
?>