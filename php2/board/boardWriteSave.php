<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../../connect/sessionCheck.php";
    $swMemberID = $_SESSION['swMemberID'];
    $boardAuthor = $_SESSION['youNick'];                     //작성자
    $boardCategory = $_POST['boardCategory'];                 //카테고리
    $boardTitle = $_POST['boardTitle'];                       //제목
    $boardContents = nl2br($_POST['boardContents']);          //내용
    $boardView = 1;                                          //조회수
    $boardLike = 0;                                          //좋아요
    $regTime = time();
    $boardImgFile = $_FILES['boardFile'];                     //이미지 파일
    $boardImgSize = $_FILES['boardFile']['size'];
    $boardImgType = $_FILES['boardFile']['type'];
    $boardImgName = $_FILES['boardFile']['name'];
    $boardImgTmp = $_FILES['boardFile']['tmp_name'];
    // echo"<pre>";
    // var_dump($boardImgName);
    // echo"</pre>";
    // 이미지 파일명 확인
    if($boardImgType){
        $fileTypeExtension = explode("/", $boardImgType);
        $fileType = $fileTypeExtension[0];               //image
        $fileTypeExtension = $fileTypeExtension[1];      //jpeg
        //이미지 타입 확인
        if($fileType == "image"){
            if($fileTypeExtension == "jpg" || $fileTypeExtension == "jpeg" || $fileTypeExtension == "png" || $fileTypeExtension == "gif"){
                $boardImgDir = "../html/assets/board/";
                $boardImgName = "Img_".time().rand(1,99999)."."."{$fileTypeExtension}";
                echo "이미지 파일이 맞습니다.";
                $sql = "INSERT INTO swBoard(swMemberID, boardTitle, boardContents, boardCategory, boardAuthor, boardView, boardLike, boardImgFile, boardImgSize, boardDelete, boardRegTime) VALUES('$swMemberID', '$boardTitle', '$boardContents', '$boardCategory', '$boardAuthor', '$boardView', '$boardLike', '$boardImgName', '$boardImgSize', '0', '$regTime')";
            } else {
                echo "<script>alert('이미지 파일이 아닙니다.')</script>";
            }
        } else {
            echo "<script>alert('이미지 파일이 아닙니다.')</script>";
        }
    } else {
        echo "이미지 파일을 첨부하지 않았습니다.";
        $sql = "INSERT INTO swBoard(swMemberID, boardTitle, boardContents, boardCategory, boardAuthor, boardView, boardLike, boardImgFile, boardImgSize, boardDelete, boardRegTime) VALUES('$swMemberID', '$boardTitle', '$boardContents', '$boardCategory', '$boardAuthor', '$boardView', '$boardLike', 'Img_default.jpg', '$boardImgSize', '0', '$regTime')";
    }
    //이미지 사이즈 확인
    if($boardImgSize > 10000000){
        echo "<script>alert('이미지 파일 용량이 1메가를 초과했습니다.')</script>";
    }
    $result = $connect -> query($sql);
    $result = move_uploaded_file($boardImgTmp, $boardImgDir.$boardImgName);
    Header("Location: board.php");
?>