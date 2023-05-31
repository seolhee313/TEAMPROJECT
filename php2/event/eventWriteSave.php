<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $swMemberID = $_SESSION['swMemberID'];

    $eventTitle = $_POST['eventTitle'];
    $eventContents = nl2br($_POST['eventContents']);

    $regTime = time();

    $eventImgFile = $_FILES['eventThumbnail'];
    $eventImgSize = $_FILES['eventThumbnail']['size'];             
    $eventImgType = $_FILES['eventThumbnail']['type'];              
    $eventImgName = $_FILES['eventThumbnail']['name'];              
    $eventImgTmp = $_FILES['eventThumbnail']['tmp_name'];              

    // 이미지 파일명 확인
    if ($eventImgType) {
        $fileTypeExtension = explode("/", $eventImgType);
        $fileType = $fileTypeExtension[0];
        $fileExtension = $fileTypeExtension[1];

        // 이미지 타입 확인
        if ($fileType == "image") {
            if ($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif") {
                $eventImgDir = "../html/assets/event/";
                $eventImgName = "Img_" . time() . rand(1, 99999) . "." . $fileExtension;

                echo "이미지 파일이 맞습니다.";
                $sql = "INSERT INTO swEvent(swMemberID, eventTitle, eventContents, eventImgFile, eventImgSize, eventDelete, eventRegTime) VALUES('$swMemberID', '$eventTitle', '$eventContents', '$eventImgName', '$eventImgSize', NULL, '$regTime')";

                // 이미지 파일 이동
                move_uploaded_file($eventImgTmp, $eventImgDir . $eventImgName);
            } else {
                echo "<script>alert('이미지 파일이 아닙니다.')</script>";
            }
        } else {
            echo "<script>alert('이미지 파일이 아닙니다.')</script>";
        }
    } else {
        echo "이미지 파일을 첨부하지 않았습니다.";
        $sql = "INSERT INTO swEvent(swMemberID, eventTitle, eventContents, eventImgFile, eventImgSize, eventDelete, eventRegTime) VALUES('$swMemberID', '$eventTitle', '$eventContents', 'Img_default.jpg', '$eventImgSize', NULL, '$regTime')";
    }

    // 이미지 사이즈 확인
    if ($eventImgSize > 10000000) {
        echo "<script>alert('이미지 파일 용량이 1메가를 초과했습니다.')</script>";
    }

    $result = $connect->query($sql);

    Header("Location: event.php");
?>