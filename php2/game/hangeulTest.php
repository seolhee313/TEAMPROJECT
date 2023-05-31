<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>맞춤법 테스트</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->

    <div class="tab__menu">
        <div class="tab__inner">
            <h1>맞춤법 테스트</h1>
            <p>나의 한글 맞춤법 실력은 과연?<br>
                지금 바로 시험해보세요! </p>
        </div>
    </div>
    <!-- tab -->
    <main>
        <div class="hangeultest__inner container">
            <img src="../html/assets/img/hangeulTest.svg" alt="세종대왕 이미지">
            <p class="mt30">맞춤법 모르면 그렇게 창피할 수 없다는데..<br>
                당신의 맞춤법 실력은?</p>
            <a href="../game/hangeulTestView.php">
                <button class="button">
                    테스트 하러가기 Click!
                    <div class="button__horizontal"></div>
                    <div class="button__vertical"></div>
                </button>
            </a>
        </div>
    </main>

    <?php include "../include/footer.php"?>
    <!-- //footer -->
</body>
</html>