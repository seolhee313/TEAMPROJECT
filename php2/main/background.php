<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>배경 페이지</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/swiper.css"/> -->

    <link rel="stylesheet" href="https://unpkg.com/swiper@9/swiper-bundle.min.css"/>

    <!-- SCRIPT -->
    <script src="../html/assets/js/common.js"></script>

    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main" class="mint">
        <section id="backslider">
            <h2 class="blind">슬라이드 영역</h2>
            <div class="backslider__inner">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="slider img1">
                                <div class="backslider__info container">
                                    <span class="small">하루 한 지문</span>
                                    <h3 class="title">하루 한 지문</h3>
                                    <p class="desc">문학/ 비문학 지문을 풀며 <br>
                                        어휘력을 향상을 도와주는 사이트입니다.</p>
                                    <div class="btn">
                                        <a href="../question/question.php">문제 풀기</a>
                                        <a href="../main/main.php">메인으로</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slider img2">
                                <div class="backslider__info container">
                                    <span class="small">event</span>
                                    <h3 class="title">하루 한 지문</h3>
                                    <p class="desc">리뷰 쓰고 선물 받자!✍️<br>
                                        상당한 사은품이 준비되어 있습니다!</p>
                                    <div class="btn">
                                        <a href="../board/board.php">바로 가기</a>
                                        <a href="../main/main.php">메인으로</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="slider img3">
                                <div class="backslider__info container">
                                    <span class="small">event</span>
                                    <h3 class="title">하루 한 지문</h3>
                                    <p class="desc">스타벅스 커피 이벤트☕ <br>
                                        스타벅스 아메리카노 쿠폰을 쏩니다!</p>
                                    <div class="btn">
                                        <a href="../event/event.php">문제 풀기</a>
                                        <a href="../main/main.php">메인으로</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button">
                        <div class="swiper-button-play"><span class="ir">play</span></div>
                        <div class="swiper-button-stop"><span class="ir">stop</span></div>
                    </div>
                </div>
                <div class="floating bot">
                    <button class="top-btn" type="button" name="상단으로 바로가기">
                        <span class="icon-arrow_up"><img src="../html/assets/img/mainArrow01.svg" alt="화살표"></span>
                    </button>
                </div>
            </div>
        </section>
        <section id="overview1">
            <div class="overview1__inner container">
                <div>
                    <h2>overview</h2>
                    <p>이제는 책과 문제집이 아닌 디지털 기기로<br>
                        독서와 문제를 풀고 있습니다.
                    </p>
                </div>
                <div class="over1">
                    <em>온라인 수업이 지속되고, 디지털 기기의 보급으로 인해 들고다니던 기존의 책과 문제집 사용률이 많이 감소했습니다.</em>
                    <em>태블릿 emc의 경우, 그 안에 문제 풀이와 필기를 동시에 할 수 있으므로 더욱 사용 빈도가 높아지는 추세입니다.</em>
                </div>
                <div class="over2"> 
                    <div class="bubble1"><span>🙄 문제집이 너무 무거워 태블릿을 살까<br>고민중이에요..</span></div>
                    <div class="bubble2"><span>🤔 문제에 대한 정보를 쉽게 얻고<br>정리를 같이 할 수는 없을까?</span></div>
                    <div class="bubble3"><span>😒책 값만 한 달에 얼마가 들어가는 건지..</span></div>
                </div>
            </div>
        </section>
        <section id="backbanner1">
            <h1><span>수험생들 뿐만 아니라 성인들의 독서 습관도 중요합니다.</span></h1>
            <div class="backbanner1__box mt10">
                <div class="box1">어휘력</div>
                <div class="box1">독해력</div>
                <div class="box1">문해율</div>
            </div>
        </section>
        <section id="overview2">
            <div class="overview1__inner container">
                <div>
                    <h2>overview</h2>
                    <p>이제는 책과 문제집이 아닌 디지털 기기로<br>
                        독서와 문제를 풀고 있습니다.
                    </p>
                </div>
                <div class="over1">
                    <em>독서율이 점점 감소하고 있는 추세로서, 요즘
                        10대, 20대의 어휘능력이 많이 떨어지고 있습니다.</em>
                    <em>기본적인 단어의 뜻이나 쓰임새를 알지 못하는 경우도 많아 일부러 문학/비문학 지문을 읽는 경우도 있습니다.</em>
                </div>
                <div class="overview2Img">
                    <div>
                        <h3>20대 연평균 독서량</h3>
                        <img src="../html/assets/img/overview2_01.svg" alt="그래프1">
                    </div>
                    <div>
                        <h3>1년간 책을 한 권 이상 읽은 성인 비율</h3>
                        <img src="../html/assets/img/overview2_02.svg" alt="그래프2">
                    </div>
                </div>
            </div>
        </section>
        <section id="backbanner2">
            <h1>“그럼 <em>하루 한 지문</em>이라면 <em>어휘력</em> 및 <em>독해력</em>을 <em>향상</em> 시킬 수 있지 않을까요?”</h1>
        </section>
        <section id="research">
            <div class="research__inner container">
                <h1>Research</h1>
                <div class="research__box mt20">
                    <div class="research__left">
                        <h2>문제와 해설, 풀이방법이 나와있는 웹사이트 혹은 애플리케이션에 대한 인식 설문조사를 진행했습니다.</h2>
                        <p class="mt30">기존 시장의 서비스를 기반으로 목표 달성의<br>
                            기본적인 니즈, 동기 부여들을 파악하는 설문조사를 진행했습니다.
                        </p>
                        <h3>main target</h3>
                        <p class="mt20">어휘력과 독해력을 향상 시키고 싶은 사람들.<br>
                            혹은 국어 영역 중에 문학 및 비문학을 공부하고 싶은 학생들.
                        </p>
                    </div>
                    <div class="research__right">
                        <div class="research__right__inner">
                            <p class="mb30"><em>Q</em>. 문학 독서(비문학) 문제, 해설과 풀이방법을 사용할 수 있는<br>
                                웹사이트 혹은 애플리케이션을 알고있다면 사용하시겠습니까?
                            </p>
                            <img src="../html/assets/img/research.png" alt="리서치이미지">
                            <h3>사용할 것 같음<br><em>71.2%</em></h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="process">
            <div class="process__inner container">
                <h1 class="mb50">"하루 한 지문, <em>어떻게 만들어 졌을까요?</em>"</h1>
                <p>목표 설정에 맞는 UI/UX 전략을 도출하기 위해 설문조사를 통해 독서에 관한 인식과 평소 학생들이 느끼는 불편함 등을
                    알게되었습니다. 이후 리서치를 진행해 전반적인 니즈 파악과 필요한 기능들을 구상하였고,
                    그에 맞춰 인사이트를 제작과 동시에 개발하게 되었습니다.
                </p>
                <div class="processImg mt70">
                    <div class="processImg1">
                        <img src="../html/assets/img/process1.png" alt="프로세스이미지1">
                        <p>SeonWah_Affinity Diagram</p>
                    </div>
                    <div class="processImg2">
                        <img src="../html/assets/img/process2.png" alt="프로세스이미지2">
                        <p>Desk & User Research/Survey</p>
                    </div>
                    <div class="processImg3">
                        <img src="../html/assets/img/process3.png" alt="프로세스이미지3">
                        <p>Design Solution & Cooperation</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- //main -->
    
    <?php include "../include/footer.php"?>
    <!-- //footer -->
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            direction: 'horizontal',
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },

            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

        const btnStop = document.querySelector(".swiper-button-stop")
        const btnStart = document.querySelector(".swiper-button-play")

        btnStart.style.display = "none";

        btnStop.addEventListener("click", () => {
            swiper.autoplay.stop();
            btnStart.style.display = "block";
            btnStop.style.display = "none";
        });
        btnStart.addEventListener("click", () => {
            swiper.autoplay.start();
            btnStart.style.display = "none";
            btnStop.style.display = "block";
        });

        const scrollToTopBtn = document.querySelector('.top-btn');

        scrollToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
    <script>
        function isElementInViewport(el) {
            const rect = el.getBoundingClientRect();
            const partialThreshold = 0.5; // 일부만 보여질 때의 임계값 (0부터 1 사이의 값)

            return (
                rect.top + (rect.height * partialThreshold) >= 0 &&
                rect.left + (rect.width * partialThreshold) >= 0 &&
                rect.bottom - (rect.height * partialThreshold) <= (window.innerHeight || document.documentElement.clientHeight) &&
                rect.right - (rect.width * partialThreshold) <= (window.innerWidth || document.documentElement.clientWidth)
            );
        }

        function handleScroll() {
            const divs = document.querySelectorAll('.overview1__inner > div');
            divs.forEach((div) => {
                if (isElementInViewport(div)) {
                    div.classList.add('show');
                }
            });

            const divs1 = document.querySelectorAll('.research__box > div');
            divs1.forEach((div) => {
                if (isElementInViewport(div)) {
                    div.classList.add('show');
                }
            });
            
        }
        window.addEventListener('scroll', handleScroll);
    </script>
</body>
</html>