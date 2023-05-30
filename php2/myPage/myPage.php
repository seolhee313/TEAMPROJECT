<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
    $swMemberID = $_SESSION['swMemberID'];
    $userSql = "SELECT * FROM swMember WHERE swMemberID = '$swMemberID'";
    // $userResult = $connect -> query($userSql);
    // $userInfo = $userResult -> fetch_array(MYSQLI_ASSOC);
    $result = $connect -> query($userSql);
    $info = $result -> fetch_array(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마이페이지</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->
    <div class="floating bot">
        <button class="top-btn" type="button" name="상단으로 바로가기">
            <span class="icon-arrow_up"><img src="../html/assets/img/mainArrow01.svg" alt="화살표"></span>
        </button>
    </div>
    <div class="modalNick">
        <div class="commentMmodal__inner">
            <h1 class="mt80">닉네임 변경하기</h1>
            <p class="mt20 mb70">닉네임을 변경할 수 있습니다.</p>
            <form name="nickChange" action="nickChange.php" method="post" onsubmit="return nickChecks()">
                <fieldset>
                    <legend class="blind">닉네임 변경 입력칸</legend>
                    <input type="text" id="youNickChange" name="youNickChange" class="inputStyle5 mb20" placeholder="변경하실 닉네임을 입력해주세요!" required>
                    <a href="#c" class="multiCheck" onclick="nickChecking()">닉네임 중복 확인</a>
                    <p class="msg mt10" style='color:red' id="youNickComment"><!--닉네임이 이미 존재합니다.--></p>
                    <button type="submit" class="changeBtn mt70 mb30">닉네임 변경하기</button>
                </fieldset>
            </form>
            <div class="mypageMmodal__close"></div>
        </div>
    </div>
    <!-- modalNick -->
    <div class="modalPassC">
        <div class="commentMmodal__inner">
            <h1 class="mt60">비밀번호 변경하기</h1>
            <p class="mt20 mb50">비밀번호를 변경할 수 있습니다.<br>3개월 주기로 바꾸는 것을 권장드립니다.</p>
            <form name="passChange" action="passChange.php" method="post">
                <fieldset>
                    <legend class="blind">비밀번호 변경 입력칸</legend>
                    <input type="password" id="youPass" name="youPass" class="inputStyle5 mb20" placeholder="현재 비밀번호를 입력해주세요!" required>
                    <input type="password" id="youPassChange" name="youPassChange" class="inputStyle5 mb20" placeholder="새 비밀번호를 입력해주세요!" required>
                    <input type="password" id="youPassChangeOk" name="youPassChangeOk" class="inputStyle5 mb20" placeholder="비밀번호를 확인해주세요!" required>
                    <button type="submit" class="changeBtn mt20">비밀번호 변경하기</button>
                </fieldset>
            </form>
            <div class="mypageMmodal__close"></div>
        </div>
    </div>
    <!-- modalPassC -->
    <div class="modalProP">
        <div class="commentMmodal__inner">
            <h1 class="mt60">프로필 사진 변경하기</h1>
            <p class="mt20 mb30">프로필 사진을 변경할 수 있습니다.</p>
            <img src="../html/assets/img/profilePicC.png" alt="프로필변경" id="image-preview">
            <form name="photoChage" action="photoChange.php" method="post" enctype="multipart/form-data">
                <fieldset>
                    <legend class="blind">사진 변경</legend>
                    <div class="Profile_choose">
                        <label class="file_choose blind" for="youImage">파일선택 : </label>
                        <input type="file" class="inputStyle5 mt30" name="changFile" id="youImage" accept=".jpg, .jpeg, .png, .gif" placeholder="jpg, gif, png 파일만 넣어주세요!">
                    </div>
                    <button type="submit" class="changeBtn mt20">프로필 변경 저장</button>
                </fieldset>
            </form>
            <div class="mypageMmodal__close"></div>
        </div>
    </div>
    <!-- modalPopP -->
    <main id="main">
        <div class="mypage__inner container">
            <h1 class="mylogo mb50"><img src="../html/assets/img/logo_jin.svg" alt=""></h1>
            <h2>마이 페이지</h2>
            <div class="mypage__info">
                <div class="info__box">
                <div class="img__circle mb40">
                    <?php
                    $profileImage = $info['youImgFile'] != '' ? "../html/assets/profile/" . $info['youImgFile'] : "../html/assets/profile/Img_default.jpg";
                    ?>
                    <img src="<?php echo $profileImage; ?>" alt="프로필 이미지">
                </div>
                    <!--<div class="info__nick mb10">진드래곤</div>
                    <div class="info__email mb10">sunwa__fam123@naver.com</div>
                    <div class="info__birth">장진용</div> -->
<?php
    // 두개의 테이블 join
    $swMemberID = $_SESSION['swMemberID'];
    $sql = "SELECT swMemberID, youEmail, youNick, youName, youPass FROM swMember WHERE swMemberID = '$swMemberID'";
    $result = $connect -> query($sql);
    $info = $result -> fetch_array(MYSQLI_ASSOC);
    // $count = $result -> num_rows;
    echo "<div class='info__nick mb10'>".$info['youNick']."</div>";
    echo "<div class='info__email mb10'>".$info['youEmail']."</div>";
    echo "<div class='info__birth'>".$info['youName']."</div>";
?>
                </div>
                <div class="info__modify">
                    <h2 class="mb50">내 정보 수정하기</h2>
                    <div class="img__modify profC">프로필 사진 변경</div>
                    <div class="pass__modify passC">비밀번호 변경</div>
                    <div class="nick__modify nickC">닉네임 변경</div>
                </div>
            </div>
            <div class="review__note">
                <div class="note__head">
                    <h2>나의 오답노트</h2>
                    <a href="../question/reviewnote.php"><img src="../html/assets/img/more.svg" alt="더보기"></a>
                </div>
                <div class="note__inner">
<?php
    // 두 개의 테이블 join
    $swMemberID = $_SESSION['swMemberID'];
    $sql = "SELECT DISTINCT r.swReviewID, r.reviewContents, r.questionID, r.questionCate FROM swReview r JOIN swMember m ON (r.swMemberID = m.swMemberID) WHERE m.swMemberID = '$swMemberID' ORDER BY r.swReviewID DESC LIMIT 0, 4";
    $result = $connect->query($sql);
    $count = $result->num_rows;
    if ($result) {
        $viewCount = $result->num_rows;
        if ($viewCount > 0) {
            while ($info = $result->fetch_array(MYSQLI_ASSOC)) {
                $reviewID = $info['swReviewID'];
                $questionID = $info['questionID'];
                $questionCate = $info['questionCate'];
                echo "<div class='note'>";
                echo "<div class='note__img pink'>";
                if ($questionCate == '비문학') {
                    echo "<a href='../question/questionView.php?id=$questionID'><img src='../html/assets/img/note.svg' alt=''></a>";
                } elseif ($questionCate == '문학') {
                    echo "<a href='../question/questionViewMoonhak.php?id=$questionID'><img src='../html/assets/img/note.svg' alt=''></a>";
                }
                echo "</div>";
                echo "<p>" . $questionCate . "</p>";
                echo "</div>";
            }
        } else {
            echo "<div class='rank_item'>아직 작성된 나의 오답노트가 없습니다!</div>";
        }
    } else {
        echo "데이터를 가져오는 데 실패했습니다. 오류 메시지: " . $connect->error;
    }
    $connect->close();
?>
                </div>
            </div>
            <div class="memberBye mt30">
                <a href="idDelete.php" class="btnStyle5">회원 탈퇴</a>
            </div>
        </div>
    </main>
    <?php include "../include/footer.php"?>
    <!-- //footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $('.nickC').click(function(){
            $('.modalNick').fadeIn()
        })
        $('.mypageMmodal__close').click(function(){
            $('.modalNick').fadeOut();
        })
        $('.passC').click(function(){
            $('.modalPassC').fadeIn()
        })
        $('.mypageMmodal__close').click(function(){
            $('.modalPassC').fadeOut();
        })
        $('.profC').click(function(){
            $('.modalProP').fadeIn()
        })
        $('.mypageMmodal__close').click(function(){
            $('.modalProP').fadeOut();
        })
    </script>
    <script>
        let isNickCheck = false;
        function nickChecking(){
            let youNick = $("#youNickChange").val();
            if(youNick == null || youNick ==''){
                $("#youNickComment").text("* 닉네임을 입력해주세요!");
                return false;
            } else {
                // 닉네임 유효성 검사
                if($("#youNickChange").val() == ''){
                    $("#youNickComment").text("* 닉네임을 입력해주세요!");
                    return false;
                }
                let getYouNick = RegExp(/^[가-힣|0-9]+$/);
                if(!getYouNick.test($("#youNickChange").val())){
                    $("#youNickComment").text("* 닉네임은 한글 또는 숫자만 사용 가능합니다.");
                    $("#youNickChange").val('');
                    return false;
                }
                $.ajax({
                    type: "POST",
                    url : "nickCheck.php",
                    data: {"youNickChange" : youNick, "type" : "isNickCheck"},
                    dataType : "json",
                    success : function(data){
                        if(data.result == "good"){
                            $("#youNickComment").text("* 사용 가능한 닉네임 입니다");
                            isNickCheck = true;
                        } else {
                            $("#youNickComment").text("* 이미 존재하는 닉네임 입니다");
                            isNickCheck = false;
                        }
                    },
                    error : function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        }
        function nickChecks() {
            if (!isNickCheck) {
                // 닉네임 중복 확인을 하지 않았을 경우
                alert("닉네임 중복 확인을 해주세요!");
                return false; // 폼 제출을 막음
            }
            return true; // 폼 제출을 허용
        }
        // 이미지 업로드
        function showPreview(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function(){
                var dataURL = reader.result;
                var imagePreview = document.getElementById('image-preview');
                imagePreview.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        }
        var fileInput = document.getElementById('youImage');
        fileInput.addEventListener('change', showPreview);
        
    </script>
</body>
</html>