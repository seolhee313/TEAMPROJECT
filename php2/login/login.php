<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
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
                        <a href="../login/idFind.php">아이디 찾기</a> / <a href="../login/passFind.php">비밀번호 찾기</a>
                    </div>
                    <div class="right">
                        <a href="../join/join.php">회원가입</a>
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