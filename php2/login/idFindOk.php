<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>아이디 찾기 완료</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->
    <main id="main" class="mint">
        <div class="idfindok__inner container">
            <div class="idfindok__box">
                <div class="top">
                    <h2>COMPLETE</h2>
                    <p class="mb30">회원님의 아이디 찾기가 완료되었습니다.</p>
                </div>
                <div class="nav">
                    <h3 class="mb20"><img src="../html/assets/img/idFindOklogo.png" alt="아이디 찾기 완료 로고"></h3>
                    <span>회원님의 아이디는</span>
                </div>
<?php
    include "../connect/connect.php";
    if($_POST["youEmail"] == "" || $_POST["youName"] == ""){
        echo '<script> alert("항목을 입력하세요"); history.back(); </script>';
    } else {
        $youEmail = $_POST['youEmail'];
        $youName = $_POST['youName'];
        $sql = "SELECT * FROM swMember WHERE youEmail = '{$youEmail}' AND youName = '{$youName}'";
        // $result -> query($sql);
        $result = $connect -> query($sql);
        // echo $sql;
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        if($info['youEmail'] == $youEmail && $info['youName'] == $youName ){
            echo "<div class='bottom mb40'><em> ".$info['youId']." </em></div>";
        }else{
            echo "<script>alert('이메일과 이름을 다시 확인해주세요.'); history.back();</script>";
        }
    }
?>
                <div class="idfindok__form">
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
    <!-- main -->
    <?php include "../include/footer.php"?>
    <!-- //footer -->
</body>
</html>