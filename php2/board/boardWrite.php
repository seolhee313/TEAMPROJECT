<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
    $sql = "SELECT count(swBoardID) FROM swBoard";
    $result = $connect -> query($sql);
    $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardTotalCount = $boardTotalCount['count(swBoardID)'];
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
            <h1>게시글 작성하기</h1>
            <p>하루 한 지문에서 자유롭게 소통해주세요!<br>
                비방, 모욕, 욕설 등의 게시글은 무단 삭제될 수 있습니다.</p>
        </div>
    </div>
    <!-- tab -->
    <main id="main" class="container">
        <div class="intro__inner center bmStyle"></div>
        <!-- //intro__inner-->
        <div class="board__inner">
            <div class="board__write">
                <form action="boardWriteSave.php" name="boardWriteSave" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="blind">게시글 작성하기</legend>
                        <div class="board__title">
                            <select name="boardCategory" id="boardCategory">
                                <option value="자유">자유게시판</option>
                                <option value="해설">나만의 해설</option>
                                <option value="일상">일상 꿀팁</option>
                                <option value="인강">인강/문제집</option>
                            </select>
                            <input type="text" id="boardTitle" name="boardTitle" class="inputStyle4" placeholder="제목을 입력해주세요!" required>
                        </div>
                        <div>
                            <form id="form">
                                <input type="file" name="boardFile" id="boardFile" class="inputStyle4" accept=".jpg, .jpeg, .png, .gif" placeholder="jpg, gif, png 파일만 넣을 수 있습니다. 이미지 용량은 1MB를 넘길 수 없습니다.">
                            </form>
                            <div id="image-preview"></div>
                        </div>
                        <div>
                            <textarea name="boardContents" id="boardContents" rows="20" class="inputStyle4" placeholder="내용을 입력해주세요!" required></textarea>
                        </div>
                        <div class="boardWrite__btn">
                            <a href="board.php" class="btnStyle6">취소하기</a>
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