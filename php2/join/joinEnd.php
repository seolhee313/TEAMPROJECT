<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 완료</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->
    <main id="main" class="mint">
        <div class="joinend__inner container">
            <div class="joinend__box">
                <div class="top">
                    <h1 class="mb20"><img src="../html/assets/img/joinEndhello.png" alt="hello"></h1>
                    <h2>COMPLETE</h2>
<?php
    include "../connect/connect.php";
    $youId = $_POST['youId'];
    $youName = $_POST['youName'];
    $youPass = $_POST['youPass'];
    $youPassC = $_POST['youPassC'];
    $youEmail = $_POST['youEmail'];
    $youNick = $_POST['youNick'];
    $youPhone = $_POST['youPhone'];
    $youGender = $_POST['youGender'];
    $regTime = time();
    $youId = $connect -> real_escape_string(trim($youId));
    $youName = $connect -> real_escape_string(trim($youName));
    $youPass = $connect -> real_escape_string(trim($youPass));
    $youPassC = $connect -> real_escape_string(trim($youPassC));
    $youEmail = $connect -> real_escape_string(trim($youEmail));
    $youNick = $connect -> real_escape_string(trim($youNick));
    $youPhone = $connect -> real_escape_string(trim($youPhone));
    $youGender = $connect -> real_escape_string(trim($youGender));
    // $youPass = sha1("web".$youPass);
    // 파일 정보
    $youImageFile = $_FILES['youImage'];
    $youImageSize = $_FILES['youImage']['size'];
    $youImageType = $_FILES['youImage']['type'];
    $youImageName = $_FILES['youImage']['name'];
    $youImageTmp = $_FILES['youImage']['tmp_name'];
    $sql = "INSERT INTO swMember(youId, youName, youPass, youEmail, youNick, youPhone, youGender, regTime) VALUES('$youId', '$youName', '$youPass', '$youEmail', '$youNick', '$youPhone', '$youGender', '$regTime')";
        $connect -> query($sql);
        if($result){
            msg("회원가입이 완료 되었습니다!<br>반가워요! 하루 한 지문의 가족이<br>되어 주셔서 감사합니다. <br><div class='intro__btn'><a href='../login/login.php'>로그인 하러가기</a></div>");
            exit;
        }
?>
                    <p class="mb30">회원가입이 완료 되었습니다!<br>
                        반가워요! 하루 한 지문의 가족이<br>되어 주셔서 감사합니다.</p>
                </div>
                <div class="nav">
                    <h3 class="mb40"><img src="../html/assets/img/joinEndlogo.png" alt="아이디 찾기 완료 로고"></h3>
                </div>
                <div class="joinend__form">
                    <div class="top mb30">
                        <a href="../login/login.php">로그인 하러 가기</a>
                    </div>
                    <div class="bottom mb10">
                        <a href="../main/main.php">메인으로</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->
    <?php include "../include/footer.php"?>
    <!-- //footer -->
    <!-- 모달 -->
</body>
</html>