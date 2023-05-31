<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $swNoticeID = $_POST['swNoticeID'];
    $noticeTitle = $_POST['noticeTitle'];
    $noticeContents = $_POST['noticeContents'];
    $noticeTitle = $connect->real_escape_string($noticeTitle);
    $noticeContents = $connect->real_escape_string($noticeContents);
    $swMemberID = $_SESSION['swMemberID'];

    $sql = "UPDATE swNotice SET noticeTitle = '{$noticeTitle}', noticeContents = '{$noticeContents}' WHERE swNoticeID = '{$swNoticeID}'";
    $connect->query($sql);

    header("Location: notice.php");
    exit;
?>