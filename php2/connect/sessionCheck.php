<?php
    if(!isset($_SESSION['swMemberID'])){
        Header("Location:../login/login.php");
    }
?>