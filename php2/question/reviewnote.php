<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>오답노트 모음</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->
    <div class="tab__menu">
        <div class="tab__inner">
            <h1>오답노트</h1>
            <p>틀린 문제에 대한 오답노트를  모아볼 수 있습니다.<br>
                오답노트를 통해 공부해보세요!</p>
        </div>
    </div>
    <!-- tab -->
    <main>
        <div class="boardView__inner container">
            <div class="view__head">
                <a href="../myPage/myPage.php"><img src="../html/assets/img/list.png" alt="리스트"></a>
                <h2><a href="../myPage/myPage.php">마이페이지</a></h2><em>></em>
                <h2><a href="../question/reviewnote.php"><span>오답노트</span></a></h2>
            </div>
            <div class="notice__inner mt50">
<?php
    $swMemberID = $_SESSION['swMemberID'];
    $sql = "SELECT * FROM swReview WHERE swMemberID = '$swMemberID' ORDER BY swReviewID DESC";
    $swReviewresult = $connect -> query($sql);
?>
    <?php foreach($swReviewresult as $swReview) { ?>
    <div class="notice__box">
    <div class="reviewnote__img <?php echo ($swReview['questionCate'] == '비문학') ? 'yellow' : 'pink'; ?>"></div>
        <a href="<?php if ($swReview['questionCate'] == '비문학'): ?>../question/questionView.php?id=<?= $swReview['questionID'] ?><?php elseif ($swReview['questionCate'] == '문학'): ?>../question/questionViewMoonhak.php?id=<?= $swReview['questionID'] ?><?php endif; ?>">
            <div class="notice__info">
                <div class="notice__main">
                    <div class="not1"><span><?= $swReview['questionCate'] ?></span></div>
                    <div class="notice__title">오답노트</div>
                </div>
            </div>
        </a>
    </div>
<?php } ?>
            </div>
            <div class="notice__pages">
                <ul>
                </ul>
            </div>
        </div>
    </main>
    <?php include "../include/footer.php"?>
    <!-- //footer -->
</body>
</html>