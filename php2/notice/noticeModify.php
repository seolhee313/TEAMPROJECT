<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    if (!isset($_GET['swNoticeID'])) {
        echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
        exit;
    }

    $swNoticeID = mysqli_real_escape_string($connect, $_GET['swNoticeID']);
    $swMemberID = mysqli_real_escape_string($connect, $_SESSION['swMemberID']);

    // 해당 게시글의 작성자와 로그인한 사용자가 다를 경우
    $sql = "SELECT swNoticeID FROM swNotice WHERE swNoticeID = {$swNoticeID} AND swMemberID = '{$swMemberID}'";
    $result = $connect->query($sql);

    if ($result->num_rows == 0) {
        echo "<script>alert('작성자만 수정할 수 있습니다.'); history.back();</script>";
        exit;
    }

    $sql = "SELECT b.swNoticeID, b.noticeTitle, b.noticeContents, m.youNick, b.noticeRegTime FROM swNotice b JOIN swMember m ON(m.swMemberID = b.swMemberID) WHERE b.swNoticeID = {$swNoticeID}";
    $result = $connect->query($sql);

    if ($result->num_rows == 0) {
        echo "<script>alert('게시글이 존재하지 않습니다.'); history.back();</script>";
        exit;
    }

    $info = $result->fetch_array(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공지사항 수정</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <div class="tab__menu">
        <div class="tab__inner">
            <h1>공지사항 수정하기</h1>
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
                <form action="noticeModifySave.php" name="noticeModifySave" method="post" enctype="multipart/form-data">
                <input type="hidden" name="swNoticeID" value="<?php echo $swNoticeID; ?>">
                    <fieldset>
                        <legend class="blind">공지사항 수정하기</legend>
                        <div class="board__writeInner">
                            <input type="text" id="noticeTitle" name="noticeTitle" class="inputStyle4" placeholder="제목을 입력해주세요!" required value="<?php echo $info['noticeTitle']; ?>">
                            <textarea name="noticeContents" id="noticeContents" rows="20" class="inputStyle4" placeholder="내용을 입력해주세요!" required><?php echo $info['noticeContents']; ?></textarea>
                        </div>
                        <div class="boardWrite__btn">
                            <a href="notice.php" class="btnStyle6">취소하기</a>
                            <button type="submit" class="btnStyle6">수정하기</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>
</html>