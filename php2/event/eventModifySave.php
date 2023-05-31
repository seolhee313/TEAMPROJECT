<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $swEventID = $_POST['swEventID'];
    $eventTitle = $_POST['eventTitle'];
    $eventContents = $_POST['eventContents'];
    $eventTitle = $connect->real_escape_string($eventTitle);
    $eventContents = $connect->real_escape_string($eventContents);
    $swMemberID = $_SESSION['swMemberID'];

    $sql = "UPDATE swEvent SET eventTitle = '{$eventTitle}', eventContents = '{$eventContents}' WHERE swEventID = '{$swEventID}'";
    $connect->query($sql);

    header("Location: event.php");
    exit;
?>