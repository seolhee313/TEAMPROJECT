<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비밀번호 찾기</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->
    <main id="main" class="mint">
        <div class="login__inner container">
            <h2 class="">비밀번호 찾기</h2>
            <div class="login__form">
                <form action="passFindOk.php" name="passFind" method="post">
                    <fieldset>
                        <legend class="blind">비밀번호 찾기를 위한 입력폼</legend>
                        <div class="mt20 mb20"><span>* </span>가입시 등록한 이메일 주소</div>
                        <div>
                            <label for="youEmail" class="blind required">이메일</label>
                            <input type="text" id="youEmail" name="youEmail" class="inputStyle" placeholder="이메일을 입력해 주세요." required>
                        </div>
                        <div class="mb20"><span>* </span>가입시 등록한 아이디</div>
                        <div>
                            <label for="youId" class="blind required">아이디</label>
                            <input type="text" id="youId" name="youId" class="inputStyle" placeholder="아이디를 입력해 주세요." required>
                        </div>
                        <button type="submit" class="btnStyle mt10 mb20">비밀번호 찾기</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </main>
    <!-- main -->
    <?php include "../include/footer.php"?>
    <!-- //footer -->
</body>
</html>