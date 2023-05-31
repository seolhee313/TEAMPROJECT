<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>신조어 테스트 결과</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->

    <div class="modal">
        <div class="questionModal__inner">
            <button class="questionModal__close">닫기</button>
            <div class="hangeulTestResult__box__inner">
                <h2 class="mb30">정답 확인하기</h2>
                <span>오늘 방송 알찼다.</span><br>
                <span>당연히 모든 치킨은 옳다</span><br>
                <span>저녁 메뉴 추천</span><br>
                <span>위꾸 - 위장 꾸미기</span><br>
                <span>주소 불러</span><br>
                <span>129</span><br>
                <span>국가대표 축구선수 조규성</span><br>
                <span>스스로 불러온 재앙</span><br>
                <span>환승연애 시즌2</span><br>
                <span>친구와 내기에서 이긴 상황</span> <br>
                <span>당근마켓</span><br>
                <span>가게 인테리어가 예쁘다.</span><br>
                <span>맛있는 것을 먹었을 때의 감탄사.</span><br>
                <span>기절할 뻔했어</span><br>
                <span>자유로운 우리를 봐 자유로워</span>
            </div>
        </div>
    </div>
    <!-- modal -->
    <div class="correct__button">
        <a class="modal"></a>정답 확인하기
    </div>
    <div class="retry__button">
        <a href="../game/mzTest.php">다시<br>도전하기</a>
    </div>
    <div class="main__button">
        <a href="../main/main.php"><h1>메인으로</h1></a>
    </div>
    <!-- 고정 버튼 -->
    <main id="main" class="mint">
        <div class="mzTestResult container">
            <p>하루 한지문 X 신조어 테스트</p>
            <div class="result__one"></div>
            <h1></h1>
            <div class="mzTestResult_img"><img src="./assets/img/mzIcon01.svg" alt="" class="mz__img"></div>
            <div class="mzTestResult__score mb30"><em></em>점!!</div>
            <h2></h2>
            <p class="desc__box"></p>
        </div>
    </main>
    <!-- main -->

    <?php include "../include/footer.php"?>
    <!-- //footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $('.correct__button').click(function(){
            $('.modal').fadeIn()
        })
        $('.questionModal__close').click(function(){
            $('.modal').fadeOut();
        })
    </script>
    <script>
        // 결과 페이지에서 로컬 스토리지에서 점수를 가져와 표시
        const quizScore = localStorage.getItem("quizScore");
        const scoreElement = document.querySelector(".mzTestResult__score em");
        scoreElement.textContent = quizScore;

        const resultOne = document.querySelector(".result__one");
        const mzIMG = document.querySelector(".mz__img");
        const h1El = document.querySelector(".mzTestResult h1");
        const h2El = document.querySelector(".mzTestResult h2");
        const descBox = document.querySelector(".mzTestResult .desc__box");

        if(quizScore <= 30){
            resultOne.textContent = "라떼는 말이야~";
            mzIMG.src = "../html/assets/img/mzIcon01.svg";
            h1El.textContent = "그냥 꼰대";
            h2El.textContent = "꼰대 특";
            descBox.textContent = "줄임 신조어 보면 재밌으면서 괜히 '별 걸 다 줄이네' 라고 함. 나름 잘 알고있다고 생각했는데 모르는 게 많음. mz세대에 관심 없는 '척'함. 아직도 이미 지난 유행어나 신조어 사용함";
        }
        if(quizScore >= 31 && quizScore <=70 ){
            resultOne.textContent = "아는 게 별로 없는 답답이";
            mzIMG.src = "../html/assets/img/mzIcon02.svg";
            h1El.textContent = "핑거 프린세스";
            h2El.textContent = "핑거 프린세스 특";
            descBox.textContent = "자꾸 그게 뭐야? 하고 물어봄.유행에 별로 관심 없음.인방, TV 안봄, SNS비공개신조어로 말하면 대화 불가능함.뭔가 들으면 혼자만 못즐김";
        }
        if(quizScore >= 70 ){
            resultOne.textContent = "악마의 재능";
            mzIMG.src = "../html/assets/img/mzIcon03.svg";
            h1El.textContent = "우주 최강 MZ";
            h2El.textContent = "우주 최강 MZ 특";
            descBox.textContent = "기본적으로 센스가 있어야 올 수 있는 단계 밈, 짤, 신조어를 적절하고 센스있게 사용함.신조어나 유행하는 밈, 짤을 주변인들에게 자신있게 밀고 나갈 수 있는 경지. 유행, 트랜드는 가장 빨리 아는 유형이라 보면 됨. 주변 사람들에게도 진정한 MZ세대로 인정받음";
        }

    </script>
</body>
</html>