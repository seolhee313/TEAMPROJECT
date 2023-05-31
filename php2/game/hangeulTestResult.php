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
                지금 바로 시험해보세요!
            </p>
        </div>
    </div>
    <!-- tab -->
    <div class="retry__button">
        <a href="../game/hangeulTestView.php">다시<br>도전하기</a>
    </div>
    <div class="main__button">
        <a href="../main/main.php"><h1>메인으로</h1></a>
    </div>
    <!-- 고정 버튼 -->
    <main id="main">
        <div class="hangeulTestResult container">
            <p class="mb30">맞춤법 테스트</p>
            <div class="hangeulTestResult__score mb40"><em></em>점!!</div>
            <h1 class="mb10"></h1>
            <h2 class="mb50"></h2>
            <div class="hangeulTestResult__boxTop">정답 확인하기</div>
            <div class="hangeulTestResult__box__wrap">
                <div class="hangeulTestResult__box__inner">
                    <span>날아갔다</span><em>날라갔다</em><br>
                    <span>맡기다</span><em>맞기다</em><br>
                    <em>전입가경</em><span>점입가경</span><br>
                    <span>널브러</span><em>널부러</em><br>
                    <em>했을런지도</em><span>했을는지도</span><br>
                    <span>내로라하다</span><em>내노라하다</em><br>
                    <span>보다시피</span><em>보다싶이</em><br>
                    <span>넘어</span><em>너머</em><br>
                    <em>가능한 빨리</em><span>가능한 한 빨리</span><br>
                    <em>어의가 없다</em><span>어이가 없다</span> <br>
                    <em>회수</em><span>횟수</span><br>
                    <span>수꿩</span>  <em>수퀑</em><br>
                    <em>스무두 살</em><span>스물두 살</span><br>
                    <span>기절할 뻔했어</span>  <em>기절할 뻔 했어</em><br>
                    <span>한 끗 차이로</span>  <em>한 끝 차이로</em><br>
                    <em>할키다</em><span>할퀴다</span><br>
                    <span>부둥켜안았다</span>  <em>부등켜안았다</em><br>
                </div>
            </div>
        </div>
    </main>
    <!-- main -->

    <?php include "../include/footer.php"?>
    <!-- //footer -->

    <script>
        // 결과 페이지에서 로컬 스토리지에서 점수를 가져와 표시
        const quizScore = localStorage.getItem("quizScore");
        const scoreElement = document.querySelector(".hangeulTestResult__score em");
        scoreElement.textContent = quizScore;
        const h1Element = document.querySelector(".hangeulTestResult h1");
        const h2Element = document.querySelector(".hangeulTestResult h2");

        if(quizScore <= 30){
            h1Element.textContent = "한국인 맞으세요?";
            h2Element.textContent = "힘내세요! 더 많은 연습으로 한글 실력을 향상시킬 수 있어요!";
        }
        if(quizScore >= 31 && quizScore <=70 ){
            h1Element.textContent = "국어시간에 졸진 않았네요!";
            h2Element.textContent = "하지만 공부가 더 필요할 거 같아요! 화이팅!";
        }
        if(quizScore >= 70 ){
            h1Element.textContent = "세종대왕이세요?";
            h2Element.textContent = "혹시... 걸어다니는 백과사전? 이정도면 국립국어원";
        }
        

    </script>
</body>
</html>