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

    <main class="mint">
        <div class="mzTestView__inner container">
            <div class="mztest">
                <div class="mzTestQuiz">
                    <h1 class="mz__num"></h1>
                    <div class="mz__quiz"></div>
                </div>
                <div class="mztesst__choice mt10">
                </div>
                <button class="mz__next__btn">다음으로</button>
                <div class="mz__count"><!--19문제 남았습니다.--></div>
            </div>
        </div>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php"?>
    <!-- //footer -->

    <script>
        // 문제 정보
        const quizInfo = [
            {
                testcount: "1단계 도전",
                desc: "신조어 오뱅알은 무엇의 줄임말일까?",
                infoChoice: ["오늘 방송 알찼다.", "오! 방금 알았어", "오픈 뱅킹 알림", "오일뱅크 알바생"],
                infoAnswer: "오늘 방송 알찼다.",
            }, {
                testcount: "2단계 도전",
                desc: "다음 중 '당모치'의 뜻으로 옳은 것은?",
                infoChoice: ["당당한 모습의 치와와", "당근은 모두 치워버려", "당연히 모이면 치킨이지", "당연히 모든 치킨은 옳다"],
                infoAnswer: "당연히 모든 치킨은 옳다",
            }, {
                testcount: "3단계 도전",
                desc: "MZ세대가 말하는 신조어 [저메추]의 뜻은? ",
                infoChoice: ["저 메일주소 추가 좀", "저녁 메뉴 추천", "저평가된 메이저리거 추신수", "저스트 메리 추석"],
                infoAnswer: "저녁 메뉴 추천",
            }, {
                testcount: "4단계 도전",
                desc: "꾸미기 열풍이 만들어 낸 신조어 중 종류가 다른 하나는?",
                infoChoice: ["신꾸 - 신발 꾸미기", "깊꾸 - 기프티콘 꾸미기", "위꾸 - 위장 꾸미기", "폴꾸 - 폴라로이드 꾸미기"],
                infoAnswer: "위꾸 - 위장 꾸미기",
            }, {
                testcount: "5단계 도전",
                desc: "다음 중 '주불'의 해석으로 맞는 것은?",
                infoChoice: ["주꾸미 불고기", "주소 불러", "주식 불장이네", "주차 불가"],
                infoAnswer: "주소 불러",
            }, {
                testcount: "6단계 도전",
                desc: "머선 ___",
                infoChoice: ["123", "129", "135", "175"],
                infoAnswer: "129",
            }, {
                testcount: "7단계 도전",
                desc: "인터뷰에서 중꺾마(중요한 것은 꺾이지 않는 마음)를 처음으로 말 한 사람은?",
                infoChoice: ["국가대표 축구선수 조규성", "롤 프로게이머 이상혁(Faker)", "국가대표 축구선수 나상호", "롤 프로게이머 김혁규(Deft)"],
                infoAnswer: "국가대표 축구선수 조규성",
            }, {
                testcount: "8단계 도전",
                desc: "신조어 ‘스불재’는 무엇의 줄임 말일까?",
                infoChoice: ["스스로 불러온 재앙", "스케줄 불만족시 재수정", "스타성 불타는 재능", "스근하게 불맛 내는 재료"],
                infoAnswer: "스스로 불러온 재앙",
            }, {
                testcount: "9단계 도전",
                desc: "“내일 봬요 누나” (내봬누)가 나온 연애 프로그램은?",
                infoChoice: ["하트시그널 시즌3", "나는솔로", "솔로지옥 시즌2", "환승연애 시즌2"],
                infoAnswer: "환승연애 시즌2",
            }, {
                testcount: "10단계 도전",
                desc: "신조어 “쿠쿠루삥뽕”을 사용할 수 있는 상황은?",
                infoChoice: ["친구가 연인과 이별한 상황", "친구와 내기에서 이긴 상황", "맛있는 음식이 눈앞에 있는 상황", "연인을 그윽하게 바라보는 상황"],
                infoAnswer: "친구와 내기에서 이긴 상황",
            }, {
                testcount: "11단계 도전",
                desc: "MZ세대가 묶어 부르는 [네카라쿠배당토]에 포함되는 회사는?",
                infoChoice: ["네이처리퍼블릭", "라이엇게임즈", "당근마켓", "토마토저축은행"],
                infoAnswer: "당근마켓",
            }, {
                testcount: "12단계 도전",
                desc: "다음 중 성격이 다른 하나는?",
                infoChoice: ["스푼", "릴스", "틱톡", "쇼츠"],
                infoAnswer: "스푼",
            }, {
                testcount: "13단계 도전",
                desc: "다음 중 '가게가 농협은행'의 뜻으로 올바른 것은?",
                infoChoice: ["가게가 농협은행 안에 있다.", "가게 인테리어가 예쁘다.", "가게가 농협은행처럼 시원하다.", "가게가 농협은행 소유다."],
                infoAnswer: "가게 인테리어가 예쁘다.",
            }, {
                testcount: "14단계 도전",
                desc: "'얌미하움'의 뜻으로 올바른 것은?",
                infoChoice: ["연남동 신상 도넛 맛집 이름", "맛있는 것을 먹었을 때의 감탄사", "상대방의 말이 지루할 때 하는 하품", "인플루언서 반려묘 유튜브 채널명"],
                infoAnswer: "맛있는 것을 먹었을 때의 감탄사",
            }, {
                testcount: "15단계 도전",
                desc: "다음 중 아이돌 그룹 '아이브' 로부터 시작된 밈이 아닌 것은?",
                infoChoice: [" 난 몰랐어 내 맘이 이리 다채로운지", "숨참고 러브 다이브", "내 장점이 뭔지 알아? 바로 솔직한 거야", "자유로운 우리를 봐 자유로워"],
                infoAnswer: "자유로운 우리를 봐 자유로워",
            }
        ];

        // 선택자
        const mztest = document.querySelector(".mztest");
        const mzQuiz = mztest.querySelector(".mz__quiz");
        const mzNum = mztest.querySelector(".mz__num");
        const mzChoice = mztest.querySelector(".mztesst__choice");
        const mzCount = mztest.querySelector(".mz__count");
        const mzNext = mztest.querySelector(".mz__next__btn");

        let quizCount = 0;
        let quizScore = 0;
        // 퀴즈가 종료되었을 때 로컬 스토리지에 점수를 저장
        const saveScoreToLocalStorage = () => {
            // 점수를 백분위로 계산하여 저장
            const calculatedScore = Math.ceil((quizScore / quizInfo.length) * 100);
            localStorage.setItem("quizScore", calculatedScore);
        };

        // 퀴즈가 종료되었을 때 페이지 이동
        const navigateToResultPage = () => {
            saveScoreToLocalStorage(); // 점수를 로컬 스토리지에 저장
            window.location.href = "../game/mzTestResult.php"; // 결과 페이지로 이동
        };

        const updateQuiz = (index) => {
            let typeTag = `
                ${quizInfo[index].testcount}
            `;
            let questionTag = `
                ${quizInfo[index].desc}
            `;
            let choiceTag = `
                <label for="choice1" class="">
                    <span>${quizInfo[index].infoChoice[0]}</span>
                </label>
                <label for="choice2" class="">
                    <span>${quizInfo[index].infoChoice[1]}</span>
                </label>
                <label for="choice3" class="">
                    <span>${quizInfo[index].infoChoice[2]}</span>
                </label>
                <label for="choice4" class="">
                    <span>${quizInfo[index].infoChoice[3]}</span>
                </label>
            `;
            let numCountTag = `
                ${quizInfo.length - index} 문제 남았습니다.
            `;

            mzNum.innerHTML = typeTag;
            mzQuiz.innerHTML = questionTag;
            mzChoice.innerHTML = choiceTag;
            mzCount.innerHTML = numCountTag;

            // 이전에 등록한 보기 클릭 이벤트 핸들러 제거
            const choices = document.querySelectorAll(".mztesst__choice label");
            choices.forEach((choice) => {
                choice.removeEventListener("click", handleChoiceClick);
            });

            // 새로운 보기 클릭 이벤트 핸들러 등록
            choices.forEach((choice, choiceIndex) => {
                choice.addEventListener("click", handleChoiceClick);
            });

            // 다음 버튼 클릭 이벤트 처리
            mzNext.addEventListener("click", handleNextButtonClick);
        };

        // 다음 버튼 클릭 이벤트 핸들러
        function handleNextButtonClick() {
            // 현재 선택된 보기를 확인
            const selectedChoice = document.querySelector(".mztesst__choice label.on");

            if (!selectedChoice) {
                // 선택된 보기가 없는 경우 알림 창 띄우기
                alert("보기를 선택해주세요.");
                return;
            }

            quizCount++; // 문제 번호 증가

            if (quizCount < quizInfo.length) {
                // 선택한 보기 클래스 초기화
                const choices = document.querySelectorAll(".mztesst__choice label");
                choices.forEach((choice) => {
                    choice.classList.remove("on");
                });

                // 다음 문제 업데이트
                updateQuiz(quizCount);
            } else {
                // 모든 문제가 끝났을 경우에 대한 처리
                navigateToResultPage(); // 페이지 이동하여 점수 표시
            }
        }

        // 보기 클릭 이벤트 핸들러
        function handleChoiceClick(event) {
            const choice = event.currentTarget;
            const choiceIndex = Array.from(choice.parentNode.children).indexOf(choice);
            // 사용자가 선택한 보기를 가져옴
            const selectedChoice = quizInfo[quizCount].infoChoice[choiceIndex];
            // 정답과 비교하여 점수 계산
            if (selectedChoice === quizInfo[quizCount].infoAnswer) {
                quizScore++;
            }
            // 선택한 보기에 클래스 추가
            choice.classList.add("on");

            // 다른 보기들에 대한 클래스 제거
            const choices = document.querySelectorAll(".mztesst__choice label");
            choices.forEach((otherChoice) => {
                if (otherChoice !== choice) {
                    otherChoice.classList.remove("on");
                }
            });
        }

        updateQuiz(quizCount);
    </script>
</body>
</html>