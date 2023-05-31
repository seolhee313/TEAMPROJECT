<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 완료</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->
    <main id="main" class="mint">
        <div class="login__inner container">
            <h2>하루 한 지문<br>로그인</h2>
<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    $youId = $_POST['youId'];
    $youPass = $_POST['youPass'];
    // echo $youId, $youPass;
    // 데이터 출력
    function msg($alert){
        echo "<p class='msg' style='color:red' id='youPassCheck'>$alert</p>";
    }
    // 데이터 조회
    $sql = "SELECT swMemberID, youId, youName, youPass FROM swMember WHERE youId = '$youId' AND youPass = '$youPass'";
    $result = $connect -> query($sql);
    if($result){
        $count = $result -> num_rows;
        if($count == 0){
            msg("이메일 또는 비밀번호가 틀렸습니다.<br>다시 한 번 확인해주세요!");
        } else {
            // 로그인 성공
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
            echo "<pre>";
            var_dump($memberInfo);
            echo "</pre>";
            // // 세션 설정
            $_SESSION['swMemberID'] = $memberInfo['swMemberID'];
            $_SESSION['youEmail'] = $memberInfo['youEmail'];
            $_SESSION['youName'] = $memberInfo['youName'];
            Header("location: ../main/main.php");
        }
    }
?>
            <p class="msg" style="color:red"></p>
            <div class="login__form">
                <form action="loginSave.php" name="loginSave" method="post">
                    <fieldset>
                        <legend class="blind">로그인 영역</legend>
                        <div>
                            <label for="youId" class="required blind">아이디</label>
                            <input type="text" id="youId" name="youId" class="inputStyle" placeholder="아이디를 입력해주세요." required>
                        </div>
                        <div>
                            <label for="youPass" class="required blind">비밀번호</label>
                            <input type="password" id="youPass" name="youPass" class="inputStyle" placeholder="비밀번호를 입력해주세요." required>
                        </div>
                        <button type="submit" class="btnStyle mt10 mb30">로그인</button>
                    </fieldset>
                </form>
                <div class="login__footer">
                    <div class="left">
                        <a href="login/idFind.php">아이디 찾기</a> / <a href="login/passFind.php">비밀번호 찾기</a>
                    </div>
                    <div class="right">
                        <a href="join/join.join.php">회원가입</a>
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