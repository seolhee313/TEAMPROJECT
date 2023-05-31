<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
    $sql = "SELECT count(swEventID) FROM swEvent";
    $result = $connect->query($sql);
    $eventTotalCount = $result->fetch_array(MYSQLI_ASSOC);
    $eventTotalCount = $eventTotalCount['count(swEventID)'];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>이벤트 작성</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->

    <div class="tab__menu">
        <div class="tab__inner">
            <h1>이벤트 작성</h1>
            <p>하루 한 지문의 이벤트입니다.<br>
                다양한 이벤트를 접해보세요!</p>
        </div>
    </div>
    <!-- tab -->

    <main id="main" class="container">
        <div class="intro__inner center bmStyle"></div>
        <!-- //intro__inner-->

        <div class="board__inner">
            <div class="board__write">
                <form action="eventWriteSave.php" name="eventWriteSave" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="blind">이벤트 작성</legend>
                        <div class="board__title">
                            <select name="tipSection" id="searchOptions">
                                <option value="event">이벤트</option>
                            </select>
                            <input type="text" id="boardTitle" name="eventTitle" class="inputStyle4" placeholder="제목을 입력해주세요!" required>
                        </div>
                        <div>
                            <input type="file" name="eventThumbnail" id="file-input" class="inputStyle4" />
                            <div id="image-preview"></div>
                        </div>
                        <div>
                            <textarea name="eventContents" id="boardContents" rows="20" class="inputStyle4" placeholder="내용을 입력해주세요!" required></textarea>
                        </div>
                        <div class="boardWrite__btn">
                            <a href="event.php" class="btnStyle6">취소하기</a>
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