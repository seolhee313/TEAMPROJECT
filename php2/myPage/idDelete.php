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
    <title>회원 탈퇴</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" class="mint">
        <div class="idDelete__inner container">
            <div class="idDelete__box">
                <div class="top">
                    <h1 class="mb20"><img src="../html/assets/img/idDeleteOkGoodBye.png" alt="GoodBye"></h1>
                    <h2>COMPLETE</h2>
                    <p class="mb30">회원탈퇴를 진행합니다.<br>
                        동의시 하단의 버튼을 클릭해주세요!</p>
                </div>
                <div class="nav">
                    <h3 class="mb40"><img src="../html/assets/img/idDeleteOklogo.png" alt="아이디 찾기 완료 로고"></h3>
                </div>
                <div class="idDelete__form">
                    <form action="#" method="post">
                        <fieldset>
                            <legend class="blind"></legend>
                            <div class="top mb30">
                                <!-- <a href="../main/main.php">탈퇴하기</a> -->
                                <button type="submit" class="quit">탈퇴하기</button>
                            </div>
                            <!-- 삭제 -->
                            <div class="idDelete__delete" style="display: none ">
                                <div class="mb20">
                                    <label for="idDeletePass" class="blind">비밀번호</label>
                                    <input type="password" id="idDeletePass" name="idDeletePass" placeholder="비밀번호">
                                </div>
                                <div>
                                    <button id="idDeleteCancel" type="button">취소</button>
                                    <button id="idDeleteButton">탈퇴</button>
                                </div>
                            </div>
                            <div class="bottom mt40">
                                <a href="myPage.php">닫기</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php"?>
    <!-- //footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        const form = document.querySelector('.idDelete__form');

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            pwdChecking();
            e.target.querySelector('input').value = '';
            e.target.querySelector('input').focus();
        });

        //탈퇴 하기 -> 탈퇴 버튼
        function pwdChecking() {
            let youPass = $('#idDeletePass').val();
            if (youPass === "") {
                alert("비밀번호를 입력하세요");
                return;
            }
            // alert(youPass)
            $.ajax({
                type: "POST",
                url: "idDeleteCheck.php",
                data: { "idDeletePass": youPass },
                dataType: "json",
                success: function (data) {
                    if (data.result == "good") {
                        alert("지금까지 하루 한 지문을 이용하여 주셔서 감사합니다.");
                        location.href = "idDeleteOk.php";
                    } else {
                        alert("비밀번호가 틀렸습니다.");
                    }
                },
                error: function (request, status, error) {
                    console.log("request", request);
                    console.log("status", status);
                    console.log("error", error);
                }
            });
        }

        //탈퇴 하기 버튼
        $(".quit").click(function (e) {
            e.preventDefault();
            $(".idDelete__delete").show();
        });

        // 탈퇴 하기 -> 취소 버튼
        $("#idDeleteCancel").click(function () {
            $(".idDelete__delete").hide();
        });
    </script>
</body>
</html>