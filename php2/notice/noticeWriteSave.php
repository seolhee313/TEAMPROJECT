<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    $swMemberID = $_SESSION['swMemberID'];
    $noticeCategory = $_POST['tipSection'];
    $noticeTitle = $_POST['boardTitle'];
    $noticeContents = nl2br($_POST['boardContents']);
    $regTime = time();
    $noticeImgFile = $_FILES['noticeFile'];
    $noticeImgSize = $_FILES['noticeFile']['size'];
    $noticeImgType = $_FILES['noticeFile']['type'];
    $noticeImgName = $_FILES['noticeFile']['name'];
    $noticeImgTmp = $_FILES['noticeFile']['tmp_name'];
    // 이미지 파일명 확인
    if($noticeImgType){
        $fileTypeExtension = explode("/", $noticeImgType);
        $fileType = $fileTypeExtension[0];
        $fileExtension = $fileTypeExtension[1];
        // 이미지 타입 확인
        if($fileType == "image"){
            if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                $noticeImgDir = "../html/assets/notice/";
                $noticeImgName = "Img_" . time() . rand(1, 99999) . "." . $fileExtension;
                echo "이미지 파일이 맞습니다.";
                $sql = "INSERT INTO swNotice(swMemberID, noticeTitle, noticeContents, noticeCategory, noticeImgFile, noticeImgSize, noticeDelete, noticeRegTime) VALUES('$swMemberID', '$noticeTitle', '$noticeContents', '$noticeCategory', '$noticeImgName', '$noticeImgSize', NULL, '$regTime')";
                // 이미지 파일 이동
                move_uploaded_file($noticeImgTmp, $noticeImgDir . $noticeImgName);
            } else {
                echo "<script>alert('이미지 파일이 아닙니다.')</script>";
            }
        } else {
            echo "<script>alert('이미지 파일이 아닙니다.')</script>";
        }
    } else {
        echo "이미지 파일을 첨부하지 않았습니다.";
        $sql = "INSERT INTO swNotice(swMemberID, noticeTitle, noticeContents, noticeCategory, noticeImgFile, noticeImgSize, noticeDelete, noticeRegTime) VALUES('$swMemberID', '$noticeTitle', '$noticeContents', '$noticeCategory', 'Img_default.jpg', '$noticeImgSize', NULL, '$regTime')";
    }
    // 이미지 사이즈 확인
    if($noticeImgSize > 10000000){
        echo "<script>alert('이미지 파일 용량이 1메가를 초과했습니다.')</script>";
    }
    $result = $connect->query($sql);
    Header("Location: notice.php");
?>