<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>메인 페이지</title>
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- <link rel="stylesheet" href="assets/css/swiper.css"/> -->

    <link rel="stylesheet" href="https://unpkg.com/swiper@9/swiper-bundle.min.css"/>


    <?php include "../include/head.php" ?>

    <style>
        .slick-slide {
            display: none;
            float: left;
            height: 100%;
            min-height: 1px;
            margin: 0 10px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <script  src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main">
        <banner id="banner">
            <div class="slider__wrap">
                <div class="slider__inner container">
                    <div class="text__inner">
                        <p class="mt40 ">EVENT</p>
                        <h2>하루 한 지문 <br><span>오픈</span></h2>
                        <div class="desc mt20 mb30">문학/ 비문학 지문을 풀며 <br>어휘력을 향상을 도와주는 사이트입니다.</div>
                        <div><a href="../main/background.php">자세히 보기</a></div>
                    </div>
                    <div class="img__inner">
                        <!-- Slider main container -->
                        <div class="swiper">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                            <!-- Slides -->
                            <div class="swiper-slide"><img src="../html/assets/img/banner.png" alt=""></div>
                            <div class="swiper-slide"><img src="../html/assets/img/banner02.png" alt=""></div>
                            <div class="swiper-slide"><img src="../html/assets/img/banner03.png" alt=""></div>
                            <div class="swiper-slide"><img src="../html/assets/img/banner04.png" alt=""></div>
                            <div class="swiper-slide"><img src="../html/assets/img/banner05.png" alt=""></div>
                            
                            </div>
                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>
                            <div class="swiper-scrollbar"></div>
                        </div>
                    </div>
                </div>
                <div class="floating bot">
                    <button class="top-btn" type="button" name="상단으로 바로가기">
                        <span class="icon-arrow_up"><img src="../html/assets/img/mainArrow01.svg" alt="화살표"></span>
                    </button>
                </div>
            </div>
        </banner>
        <section id="content1">
            <div class="content1__wrap container">
                <p class="content1__desc mb20">매일매일  새로운 지문을 만나보세요.</p>
                <p class="content1__h2 mb50">오늘의 추천 지문</p>
                <div class="content1__all mb30">
                    <div class="left">비문학
                        <span class="count-num" data-count="1320">0</span>
                    <em>지문</em></div>
                    <div class="right">문학
                        <span class="count-num" data-count="777">0</span>
                    <em>지문</em></div>
                </div>
            </div>
            <div class="multiple-items">
                <div class="content1__card">
                    <a href="../question/questionView.php?id=1">
                        <figure class="content1__card__header">
                            <img src="../html/assets/img/content1__card.svg" alt="르네상스 예술">
                        </figure>
                        <div class="content1__card__body">
                            <h3 class="title">르네상스 예술</h3>
                            <p class="subject">예술</p>
                        </div>
                    </a>
                </div>
                <div class="content1__card">
                    <a href="../question/questionView.php?id=3">
                        <figure class="content1__card__header">
                            <img src="../html/assets/img/content1__card1.svg" alt="산업의 발달">
                        </figure>
                        <div class="content1__card__body">
                            <h3 class="title">산업의 발달</h3>
                            <p class="subject">사회/경제</p>
                        </div>
                    </a>
                </div>
                <div class="content1__card">
                    <a href="../question/questionViewMoonhak.php?id=7">
                        <figure class="content1__card__header">
                            <img src="../html/assets/img/content1__card2.svg" alt="쉽게 씌어진 시">
                        </figure>
                        <div class="content1__card__body">
                            <h3 class="title">쉽게 씌어진 시 / 윤동주</h3>
                            <p class="subject">문학(서사시)</p>
                        </div>
                    </a>
                </div>
                <div class="content1__card">
                    <a href="../question/questionViewMoonhak.php?id=10">
                        <figure class="content1__card__header">
                            <img src="../html/assets/img/content1__card3.svg" alt="샤갈의 마을에 내리는 눈">
                        </figure>
                        <div class="content1__card__body">
                            <h3 class="title">샤갈의 마을에 내리는 눈</h3>
                            <p class="subject">문학(서사시)</p>
                        </div>
                    </a>
                </div>
                <div class="content1__card">
                    <a href="../question/questionView.php?id=5">
                        <figure class="content1__card__header">
                            <img src="../html/assets/img/content1__card4.svg" alt="삼단 논법">
                        </figure>
                        <div class="content1__card__body">
                            <h3 class="title">삼단 논법</h3>
                            <p class="subject">인문</p>
                        </div>
                    </a>
                </div>
                <div class="content1__card">
                    <a href="../question/questionViewMoonhak.php?id=6">
                        <figure class="content1__card__header">
                            <img src="../html/assets/img/content1__card5.svg" alt="섬진강">
                        </figure>
                        <div class="content1__card__body">
                            <h3 class="title">"섬진강" / 김용택</h3>
                            <p class="subject">문학(시)</p>
                        </div>
                    </a>
                </div>
                <div class="content1__card">
                    <a href="../question/questionView.php?id=4">
                        <figure class="content1__card__header">
                            <img src="../html/assets/img/content1__card6.svg" alt="혈액과 세포">
                        </figure>
                        <div class="content1__card__body">
                            <h3 class="title">혈액과 세포</h3>
                            <p class="subject">과학</p>
                        </div>
                    </a>
                </div>
                <div class="content1__card">
                    <a href="../question/questionView.php?id=15">
                        <figure class="content1__card__header">
                            <img src="../html/assets/img/content1__card7.svg" alt="경제 성장">
                        </figure>
                        <div class="content1__card__body">
                            <h3 class="title">경제 성장</h3>
                            <p class="subject">사회/경제</p>
                        </div>
                    </a>
                </div>
                <div class="content1__card">
                    <a href="../question/questionView.php?id=14">
                        <figure class="content1__card__header">
                            <img src="../html/assets/img/content1__card8.svg" alt="상표법에 관해">
                        </figure>
                        <div class="content1__card__body">
                            <h3 class="title">상표법에 관해</h3>
                            <p class="subject">이슈</p>
                        </div>
                    </a>
                </div>
                <div class="content1__card">
                    <a href="../question/questionViewMoonhak.php?id=5">
                        <figure class="content1__card__header">
                            <img src="../html/assets/img/content1__card9.svg" alt="성산별곡">
                        </figure>
                        <div class="content1__card__body">
                            <h3 class="title">성산별곡 / 정철</h3>
                            <p class="subject">문학(고전)</p>
                        </div>
                    </a>
                </div>
                <div class="content1__card">
                    <a href="../question/questionViewMoonhak.php?id=3">
                        <figure class="content1__card__header">
                            <img src="../html/assets/img/content1__card10.svg" alt="카드">
                        </figure>
                        <div class="content1__card__body">
                            <h3 class="title">평지 / 김정한</h3>
                            <p class="subject">문학(소설)</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="content1__more container mt50"><a href="../question/question.php">더보기</a></div>
        </section>
        <banner id="banner2">
            <div class="banner2__wrap">
                <div class="banner2__inner">
                    <div class="banner2__info container">
                        <div class="banner2__left">
                            <h2 class="mb10 mt70">베스트 꿀팁왕 <em>EVENT!</em></h2>
                            <p>매달 나만의 해설 게시글에서 3명 추첨하여 기프티콘을 드려요!</p>
                        </div>
                        <div class="banner2__right">
                            <a href="../board/board.php"><img src="../html/assets/img/comu (1).png" alt="커뮤니티"></a>
                            <a href="../notice/notice.php"><img src="../html/assets/img/comu2.png" alt="공지사항"></a>
                            <a href="../event/event.php"><img src="../html/assets/img/comu3.png" alt="이벤트"></a>
                        </div>
                    </div>
                </div>
            </div>
        </banner>
        <section id="content2">
            <div class="content2__wrap container">
                <div class="content2__inner mt100 mb20">
                    <div class="content2__left">
                        <p class="mb10">자주 출제되는 지문을  <em>콕!</em> 찝어드립니다.</p>
                        <h2>핵심 문제 </h2>
                    </div>
                    <div class="content2__right mt60"><a href="../question/question.php">전체 보기</a></div>
                </div>
                <div class="content2__card mb100">
                    <div class="card__inner">
                        <a href="../question/questionView.php?id=10"><img src="../html/assets/img/content2__card.svg" alt="카드 이미지"></a>
                        <div class="card">
                            <div class="title mb30">예술의 종말을 선언하다</div>
                            <div class="desc">
                                <div class="desc1">예술</div>
                                <div><a href="../question/questionView.php?id=10">풀러 가기</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="card__inner">
                        <a href="../question/questionViewMoonhak.php?id=9"><img src="../html/assets/img/content2__card2.svg" alt="카드 이미지"></a>
                        <div class="card">
                            <div class="title mb30">난장이가 쏘아올린 작은 공</div>
                            <div class="desc">
                                <div class="desc1">문학 (소설)</div>
                                <div><a href="../question/questionViewMoonhak.php?id=9">풀러 가기</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="card__inner">
                        <a href="../question/questionView.php?id=8"><img src="../html/assets/img/content2__card3.svg" alt="카드 이미지"></a>
                        <div class="card">
                            <div class="title mb30">정의를 존재케 하는 것</div>
                            <div class="desc">
                                <div class="desc1">철학/인문</div>
                                <div><a href="../question/questionView.php?id=8">풀러 가기</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="card__inner">
                        <a href="../question/questionViewMoonhak.php?id=2"><img src="../html/assets/img/content2__card1.svg" alt="카드 이미지"></a>
                        <div class="card">
                            <div class="title mb30">장풍운전</div>
                            <div class="desc">
                                <div class="desc1">문학 (고전)</div>
                                <div><a href="../question/questionViewMoonhak.php?id=2">풀러 가기</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="content3" class="mint">
            <div class="content3__wrap container">
                <div class="content3__top">
                    <div class="content3__img"><a href="../game/keyboard.php"><img src="/php2/html/assets/img/gameimg.png" alt="타자연습 이미지"></a></div>
                    <div class="content3__text">
                        <div class="content3__text__desc">단어도 알아가고, 타자 속도도 향상되고!</div>
                        <div class="content3__text__h2">타자 게임</div>
                        <div class="content3__text__desc2">생소한 단어나, 평소에 많이 접해보지 못한 단어 위주로 준비했어요.<br>즐겁게 단어를 배워봅시다.</div>
                        <div class="content3__text__more"><a href="../game/keyboard.php">바로가기</a></div>
                    </div>
                </div>
                <div class="content3__bottom">
                    <div class="content3__text">
                        <div class="content3__text__desc">당신은 과연 MZ세대일까?</div>
                        <div class="content3__text__h2">신조어 테스트</div>
                        <div class="content3__text__desc2">매번 생겨나는 신조어들!<br>신조어 테스트로 당신을 신세대로 만들어줍니다.</div>
                        <div class="content3__text__more"><a href="../game/mzTest.php">바로가기</a></div>
                    </div>
                    <div class="content3__img"><a href="../game/mzTest.php"><img src="/php2/html/assets/img/gameimg2.png" alt="MZ테스트 게임 사진"></a></div>
                </div>
            </div>
        </section>
        <section id="content4">
            <div class="content4__inner container">
                <div class="left">
                    <div class="content4__head">
                        <h2>공지사항</h2>
                        <a href="../notice/notice.php"></a>
                    </div>
                    <div class="content4__a">
                        <a href="../notice/noticeView.php?swNoticeID=119">
                            <div class="content4__info mt10">
                                <span>공지</span>
                                <div class="notice">
                                    <p>[공지] 하루 한 지문 보안 강화 안내</p>
                                    <strong>2023.05.24</strong>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="content4__a">
                        <a href="../notice/noticeView.php?swNoticeID=118">
                            <div class="content4__info mt10">
                                <span>공지</span>
                                <div class="notice">
                                    <p>[안내] 하루 한 지문 신규 컨텐츠 추..</p>
                                    <strong>2023.05.24</strong>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="content4__a">
                        <a href="../notice/noticeView.php?swNoticeID=116">
                            <div class="content4__info mt10">
                                <span>공지</span>
                                <div class="notice">
                                    <p>[공지] 하루 한 지문 이용 안내</p>
                                    <strong>2023.05.24</strong>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="content4__a">
                        <a href="../notice/noticeView.php?swNoticeID=105">
                            <div class="content4__info mt10">
                                <span>공지</span>
                                <div class="notice">
                                    <p>[문학] 신규 문제 유형 추가 안내</p>
                                    <strong>2023.05.23</strong>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="right">
                    <div class="content4__head">
                        <h2>자주 받는 질문</h2>
                        <a href="../faq/faq.php"></a>
                    </div>
                    <div class="content4__a">
                        <a href="../faq/faq.php">
                            <div class="content4__info mt10">
                                <span>문의</span>
                                <div class="notice">
                                    <p>[회원 관련] 아이디/비밀번호 찾기</p>
                                    <strong>2023.05.23</strong>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="content4__a">
                        <a href="../faq/faq.php">
                            <div class="content4__info mt10">
                                <span>문의</span>
                                <div class="notice">
                                    <p>[회원 관련] 회원 정보 수정</p>
                                    <strong>2023.05.23</strong>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="content4__a">
                        <a href="../faq/faq.php">
                            <div class="content4__info mt10">
                                <span>문의</span>
                                <div class="notice">
                                    <p>[회원 관련] 회원 가입 방법</p>
                                    <strong>2023.05.23</strong>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="content4__a">
                        <a href="../notice/noticeView.php?swNoticeID=105">
                            <div class="content4__info mt10">
                                <span>문의</span>
                                <div class="notice">
                                    <p>[회원 관련] 이벤트 당첨 관련</p>
                                    <strong>2023.05.23</strong>
                                </div>
                            </div>
                        </a>
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
        const scrollToTopBtn = document.querySelector('.top-btn');

        scrollToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
    
    <script>
        $('.multiple-items').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows : true,
            prevArrow : "<button type='button' class='slick-prev'></button>",
            nextArrow : "<button type='button' class='slick-next'></button>",
            autoplay: true,
            autoplaySpeed: 2000,
        });
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
            const divs = document.querySelectorAll('.content2__card > div');
            divs.forEach((div) => {
                if (isElementInViewport(div)) {
                    div.classList.add('show');
                }
            });
            
        }
        window.addEventListener('scroll', handleScroll);
    </script>
</body>
</html>