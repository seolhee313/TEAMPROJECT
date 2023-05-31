<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>신조어 테스트</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->

    <div class="tab__menu">
        <div class="tab__inner">
            <h1>신조어 테스트</h1>
            <p>요즘 MZ들은 무슨 언어를 쓸까?<br>
                신조어 테스트로 당신의 트렌드를 확인해보세요!
            </p>
        </div>
    </div>
    <!-- tab -->
    <main>
        <div class="boardView__inner container">
            <div class="mzTest__inner">
                <div class="mzLeft">
                    <div>
                        <img src="../html/assets/img/mzIcon01.svg" alt="mz테스트 하트 캐릭터">
                        <div><h3>요즘 mz세대들 쓰는 말 뭘까?</h3></div>
                    </div>
                    <div>
                        <div><h3>솔직히 MZ세대들이 하는 말 못알아듣겠어 ㅠㅠㅠ</h3></div>
                        <img src="../html/assets/img/mzIcon02.svg" alt="mz테스트 동그라미 캐릭터">
                    </div>
                    <div>
                        <img src="../html/assets/img/mzIcon03.svg" alt="mz테스트 뾰족 캐릭터">
                        <div><h3>어디 가서 늙었다는 말은 듣기 싫은데....</h3></div>
                    </div>
                </div>
                <div class="mzRight">
                    <div>
                        <h2>2023<br>
                            <em>신조어 테스트</em>
                        </h2>
                        <p>당신의 힙 지수는 과연?<br>
                            신세대인지 한 번 확인해보세요!
                        </p>
                        <a href="../game/mzTestView.php">
                            <button class="button">
                                테스트 하러가기 Click!
                                <div class="button__horizontal"></div>
                                <div class="button__vertical"></div>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mzTest__bottom">
                <div class="mzTestInfo">
                    <div>
                        <p>응시자</p>
                        <div><span class="count-num" data-count="1024">0</span><em> 명</em></div>
                    </div>
                    <div>
                        <p>응시자 평균 정답</p>
                        <div><span class="count-num" data-count="58">0</span><em> 점</em></div>
                    </div>
                    <div>
                        <p>만점자</p>
                        <div><span class="count-num" data-count="231">0</span><em> 명</em></div>
                    </div>
                </div>
                <div class="mzGame">
                    <h3>하루 한 지문의 다른 게임 </h3>
                    <div class="mzGame__inner">
                        <div>
                            <a href="../game/hangeulTest.php"><img src="../html/assets/img/mzGameIcon01.svg" alt="게임1" class="mzImg"></a>
                            <div>
                                <p>바로가기</p>
                                <a href="../game/hangeulTest.php"><img src="../html/assets/img/mzArrow01.svg" alt="바로가기"></a>
                            </div>
                        </div>
                        <div>
                            <a href="../game/keyboard.php"><img src="../html/assets/img/mzGameIcon02.svg" alt="게임1" class="mzImg"></a>
                            <div>
                                <p>바로가기</p>
                                <a href="../game/keyboard.php"><img src="../html/assets/img/mzArrow01.svg" alt="바로가기"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php"?>
    <!-- //footer -->

    <script>
        function isElementInViewport(el) {
            const rect = el.getBoundingClientRect();
            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }
        function handleScroll() {
            const divs = document.querySelectorAll('.mzLeft > div');
            divs.forEach((div) => {
                if (isElementInViewport(div)) {
                    div.classList.add('show');
                }
            });
            const divs1 = document.querySelectorAll('.mzRight > div');
            divs1.forEach((div) => {
                if (isElementInViewport(div)) {
                    div.classList.add('show');
                }
            });
            const divs2 = document.querySelectorAll('.mzTestInfo > div');
            divs2.forEach((div) => {
                if (isElementInViewport(div)) {
                    div.classList.add('show');
                }
            });
            const divs3 = document.querySelectorAll('.mzGame');
            divs3.forEach((div) => {
                if (isElementInViewport(div)) {
                    div.classList.add('show');
                }
            });
        }
        window.addEventListener('scroll', handleScroll);
    </script>
    <script>
        $('.count-num').each(function() { // .count-num에 각각 적용
        var $this = $(this),
        countTo = $this.attr('data-count');
        // $this = 첫번째~세번째 .count-num
        // countTo = 첫번째~세번째 .count-num의 data-count 속성의 값(777,555,333)
        $({ countNum: $this.text()}).animate({
            countNum: countTo
            // countNum: $this.text() = 0, countNum: countTo = 777, 555, 333
            // 0에서 countNum이 된다
        },
            {
                duration: 3000, // 애니메이션이 완료될때까지 걸리는 시간
                easing:'linear', // 애니메이션 효과 방식
                step: function() { // 움직임 각 스텝별로 실행될 함수
                $this.text(Math.floor(this.countNum));
                // Math.floor -> this.countNum의 값을 정수로 만들어준다
                },
                complete: function() { // 움직임이 멈춘 후 실행될 함수
                $this.text(this.countNum);
                // this.countNum이 $this의 text값이 된다
                //alert('finished');
                }
            });
        });
    </script>
</body>
</html>