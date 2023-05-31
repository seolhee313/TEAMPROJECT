<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    // boardID가 존재하지 않을 경우
    if (!isset($_GET['swBoardID'])) {
        echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
        exit;
    }
    $swBoardID = mysqli_real_escape_string($connect, $_GET['swBoardID']);
    $swMemberID = mysqli_real_escape_string($connect, $_SESSION['swMemberID']);
    // 해당 게시글의 작성자와 로그인한 사용자가 다를 경우
    $sql = "SELECT swBoardID FROM swBoard WHERE swBoardID = {$swBoardID} AND swMemberID = '{$swMemberID}'";
    $result = $connect->query($sql);
    if ($result->num_rows == 0) {
        echo "<script>alert('작성자만 수정할 수 있습니다.'); history.back();</script>";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 수정</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->
    <div class="tab__menu">
        <div class="tab__inner">
            <h1>게시글 수정하기</h1>
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
                <form action="boardModifySave.php" name="boardModifySave" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="blind">게시글 수정하기</legend>
                        <!-- <div class="board__title">
                            <select name="tipSection" id="searchOptions">
                                <option value="freetalk">자유게시판</option>
                                <option value="explain">나만의 해설</option>
                                <option value="tip">일상 꿀팁</option>
                                <option value="study">인강/문제집</option>
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
                        </div> -->
<?php
    $swBoardID = $_GET['swBoardID'];
    $sql = "SELECT swBoardID, boardTitle, boardContents FROM swBoard WHERE swBoardID = {$swBoardID}";
    $result = $connect -> query($sql);
    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        echo "<div style='display:none'><label for='swBoardID'>번호</label><input type='text' id='swBoardID' name='swBoardID' class='inputStyle' value='".$info['swBoardID']."'></div>";
        echo "<input type='text' id='boardTitle' name='boardTitle' class='inputStyle4' placeholder='제목을 입력해주세요!' required value='".$info['boardTitle']."'>";
        // echo "<select name='tipSection' id='searchOptions'><option value='freetalk'>자유게시판</option><option value='explain'>나만의 해설</option><option value='tip'>일상 꿀팁</option><option value='study'>인강/문제집</option></select>";
        echo "<textarea name='boardContents' id='boardContents' rows='20' class='inputStyle4' placeholder='내용을 입력해주세요!' required >".$info['boardContents']."</textarea>";
        echo "<div class='mt50'><label for='boardPass'>비밀번호</label><input type='password' id='boardPass' name='boardPass' class='inputStyle' autocomplete='off' required placeholder='글을 수정하려면 로그인 비밀번호를 입력하셔야 합니다.'></div>";
        // echo "<div style='display:none'><label for='swBoardID'>번호</label><input type='text' id='swBoardID' name='swBoardID' class='inputStyle' value='".$info['swBoardID']."'></div>";
        // echo "<div><label for='boardTitle'>제목</label><input type='text' id='boardTitle' name='boardTitle' class='inputStyle' value='".$info['boardTitle']."'></div>";
        // echo "<div><label for='boardContents'>내용</label><textarea name='boardContents' id='boardContents' rows='20' class='inputStyle'>".$info['boardContents']."</textarea></div>";
    }
?>
                        <div class="boardWrite__btn">
                            <a href="board.php" class="btnStyle6">취소하기</a>
                            <button type="submit" class="btnStyle6">수정하기</button>
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