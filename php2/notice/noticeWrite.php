<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
    $sql = "SELECT count(swNoticeID) FROM swNotice";
    $result = $connect -> query($sql);
    $noticeTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $noticeTotalCount = $noticeTotalCount['count(swNoticeID)'];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 쓰기</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->
    <div class="tab__menu">
        <div class="tab__inner">
            <h1>공지사항 작성하기</h1>
            <p>하루 한 지문의 공지사항입니다.<br>
                공지사항을 참조해주세요!</p>
        </div>
    </div>
    <!-- tab -->
    <main id="main" class="container">
        <div class="intro__inner center bmStyle"></div>
        <!-- //intro__inner-->
        <div class="board__inner">
            <div class="board__write">
                <form action="noticeWriteSave.php" name="noticeWriteSave" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="blind">공지사항 작성하기</legend>
                        <div class="board__title">
                            <select name="tipSection" id="searchOptions">
                                <option value="freetalk">공지사항</option>
                                <!-- <option value="explain">이벤트</option>
                                <option value="tip">문의</option> -->
                            </select>
                            <input type="text" id="boardTitle" name="boardTitle" class="inputStyle4" placeholder="제목을 입력해주세요!" required>
                        </div>
                        <div>
                            <input type="file" name="noticeFile" id="file-input" class="inputStyle4">
                            <div id="image-preview"></div>
                        </div>
                        <div>
                            <textarea name="boardContents" id="boardContents" rows="20" class="inputStyle4" placeholder="내용을 입력해주세요!" required></textarea>
                        </div>
                        <div class="boardWrite__btn">
                            <a href="notice.php" class="btnStyle6">취소하기</a>
                            <button type="submit" class="btnStyle6">저장하기</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </main>
    <!-- //main -->
    <?php include "../include/footer.php"?>
    <!-- //footer -->
</body>
</html>