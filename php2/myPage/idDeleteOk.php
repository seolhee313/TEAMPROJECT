<?php
    include "../connect/connect.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 탈퇴 완료</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" class="mint">
        <div class="idDeleteOk__inner container">
            <div class="idDeleteOk__box">
                <div class="top">
                    <h1 class="mb20"><img src="../html/assets/img/idDeleteOkGoodBye.png" alt="hello"></h1>
                    <h2>COMPLETE</h2>
                    <p class="mb30">그동안 ‘하루 한 지문’을 이용해주셔서 감사해요.<br>
                        다음에 또 뵙게 될 날을 기다릴게요...!</p>
                </div>
                <div class="nav">
                    <h3 class="mb40"><img src="../html/assets/img/idDeleteOklogo.png" alt="아이디 찾기 완료 로고"></h3>
                </div>
                <div class="idDeleteOk__form">
                    <div class="top mb30">
                        <a href="../main/main.php">닫기</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php"?>
    <!-- //footer -->

</body>
</html>