<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    if (!isset($_GET['swEventID'])) {
        echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
        exit;
    }

    $swEventID = mysqli_real_escape_string($connect, $_GET['swEventID']);
    $swMemberID = mysqli_real_escape_string($connect, $_SESSION['swMemberID']);

    // 해당 게시글의 작성자와 로그인한 사용자가 다를 경우
    $sql = "SELECT swEventID FROM swEvent WHERE swEventID = {$swEventID} AND swMemberID = '{$swMemberID}'";
    $result = $connect->query($sql);

    if ($result->num_rows == 0) {
        echo "<script>alert('작성자만 수정할 수 있습니다.'); history.back();</script>";
        exit;
    }

    $sql = "SELECT b.swEventID, b.eventTitle, b.eventContents, m.youNick, b.eventRegTime FROM swEvent b JOIN swMember m ON(m.swMemberID = b.swMemberID) WHERE b.swEventID = {$swEventID}";
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
    <title>이벤트 수정</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <div class="tab__menu">
        <div class="tab__inner">
            <h1>이벤트 수정</h1>
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
                <form action="eventModifySave.php" name="eventModifySave" method="post"  enctype="multipart/form-data">
                <input type="hidden" name="swEventID" value="<?php echo $swEventID; ?>">
                    <fieldset>
                        <legend class="blind">이벤트 수정하기</legend>
                        <div class="board__writeInner">
                            <input type="text" id="eventTitle" name="eventTitle" class="inputStyle4" placeholder="제목을 입력해주세요!" required value="<?php echo $info['eventTitle']; ?>">
                            <textarea name="eventContents" id="eventContents" rows="20" class="inputStyle4" placeholder="내용을 입력해주세요!" required><?php echo $info['eventContents']; ?></textarea>
                        </div>
                        <div class="boardWrite__btn">
                            <a href="event.php" class="btnStyle6">취소하기</a>
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