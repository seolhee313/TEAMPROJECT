<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>맞춤법 테스트 결과</title>
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
                지금 바로 시험해보세요! </p>
        </div>
    </div>
    <!-- tab -->
    <main>
        <div class="hangeulTestView__inner container">
            <div class="htest">
                <div class="htest__header">
                    <div class="htest__number mb20"></div>
                    <h2>다음 중 맞는 걸 고르세요!</h2>
                </div>
                <div class="htest__main mt30">
                    <div class="htest__desc"></div>
                    <div class="htest__choice mt10">
                        <label for="choice1">
                            <span></span>
                        </label>
                        <label for="choice2">
                            <span></span>
                        </label>
                    </div>
                    <div class="htest__count mt10 mb30"><em></em> 남았습니다.</div>
                </div>
            </div>
        </div>
    </main>

    <?php include "../include/footer.php"?>
    <!-- //footer -->

    <script>
        // 선택자
        const htest = document.querySelector(".htest");
        const htestNum = htest.querySelector(".htest__number");
        const htestChoice = htest.querySelector(".htest__choice");
        const htestCount = htest.querySelector(".htest__count");
        const htestDesc = htest.querySelector(".htest__desc");
    
        let quizCount = 0;
        let quizScore = 0;
    
        // 문제 정보
        const quizInfo = [
            {   
                testcount: "하나",
                desc: "컴퓨터 데이터가 다 ____.",
                infoChoice: ["날아갔다.","날라갔다."],
                infoAnswer: "날아갔다",
            },{ 
                testcount: "둘",
                desc: "다슬이에게 일을 ____.",
                infoChoice: ["맡기다","맞기다"],
                infoAnswer: "맡기다",
            },{   
                testcount: "셋",
                infoChoice: ["전입가경","점입가경"],
                infoAnswer: "점입가경",
            },{   
                testcount: "넷",
                desc: "장난감을 온통 ____뜨렸다.",
                infoChoice: ["널부러","널브러"],
                infoAnswer: "널브러",
            },{   
                testcount: "다섯",
                infoChoice: ["했을런지도","했을는지도"],
                infoAnswer: "했을는지도",
            },{   
                testcount: "여섯",
                infoChoice: ["내노라하다","내로라하다"],
                infoAnswer: "내로라하다",
            },{   
                testcount: "일곱",
                infoChoice: ["보다시피","보다싶이"],
                infoAnswer: "보다시피",
            },{   
                testcount: "여덟",
                desc: "산 ____ 산이다.",
                infoChoice: ["넘어","너머"],
                infoAnswer: "넘어",
            },{   
                testcount: "아홉",
                desc: "야, 너 천 원 가지고 ____ 왜 그러는 거야?",
                infoChoice: ["째째하게","쩨쩨하게"],
                infoAnswer: "쩨쩨하게",
            },{   
                testcount: "열",
                infoChoice: ["가능한 한 빨리","가능한 빨리"],
                infoAnswer: "가능한 한 빨리",
            },{   
                testcount: "열 하나",
                desc: "____ 할 생각하지 마.",
                infoChoice: ["허튼짓","허튼 짓"],
                infoAnswer: "허튼짓",
            },{   
                testcount: "열 둘",
                desc: "소문이 너무 황당하여 ____.",
                infoChoice: ["어이가 없다","어의가 없다"],
                infoAnswer: "어이가 없다",
            },{   
                testcount: "열 셋",
                desc: "지각한 ____에 따라 벌금이 달라진다.",
                infoChoice: ["회수","횟수"],
                infoAnswer: "횟수",
            },{   
                testcount: "열 넷",
                infoChoice: ["옴싹달싹","옴짝달싹"],
                infoAnswer: "옴짝달싹",
            },{   
                testcount: "열 다섯",
                infoChoice: ["수꿩","수퀑"],
                infoAnswer: "수꿩",
            },{   
                testcount: "열 여섯",
                infoChoice: ["스무두 살","스물두 살"],
                infoAnswer: "스물두 살",
            },{   
                testcount: "열 일곱",
                infoChoice: ["기절할 뻔 했어","기절할 뻔했어"],
                infoAnswer: "기절할 뻔했어",
            },{   
                testcount: "열 여덟",
                desc: "이번 경기는 ____ 아쉽게 졌다.",
                infoChoice: ["한 끗 차이로","한 끝 차이로"],
                infoAnswer: "한 끗 차이로",
            },{   
                testcount: "열 아홉",
                infoChoice: ["할키다","할퀴다"],
                infoAnswer: "할퀴다",
            },{   
                testcount: "스물",
                desc: "다시 만난 가족들은 서로 ____.",
                infoChoice: ["부둥켜안았다","부등켜안았다"],
                infoAnswer: "부둥켜안았다",
            },
        ];
    
        const updateQuiz = (index) => {
            let typeTag = `
                ${quizInfo[index].testcount}
            `;
            let questionTag = `
                ${quizInfo[index].desc}
            `;
            let choiceTag = `
                <label for="choice1">
                    <span>${quizInfo[index].infoChoice[0]}</span>
                </label>
                <label for="choice2">
                    <span>${quizInfo[index].infoChoice[1]}</span>
                </label>
            `;
            let h4Tag = `
                총 ${quizInfo.length - index}문제 남았습니다.
            `;
    
            htestNum.innerHTML = typeTag;
            htestChoice.innerHTML = choiceTag;
            htestDesc.innerHTML = questionTag;
            htestCount.innerHTML = h4Tag;

            // 퀴즈가 종료되었을 때 로컬 스토리지에 점수를 저장
            const saveScoreToLocalStorage = () => {
                // 점수를 백분위로 계산하여 저장
                const calculatedScore = Math.ceil((quizScore / quizInfo.length) * 100);
                localStorage.setItem("quizScore", calculatedScore);
            };

            // 퀴즈가 종료되었을 때 페이지 이동
            const navigateToResultPage = () => {
                saveScoreToLocalStorage(); // 점수를 로컬 스토리지에 저장
                window.location.href = "../game/hangeulTestResult.php"; // 결과 페이지로 이동
            };
            // 보기 클릭 이벤트 처리
            const choices = document.querySelectorAll(".htest__choice label");
            choices.forEach((choice, choiceIndex) => {
                choice.addEventListener("click", () => {
                    // 사용자가 선택한 보기를 가져옴
                    const selectedChoice = quizInfo[quizCount].infoChoice[choiceIndex];
                    // 정답과 비교하여 점수 계산
                    if (selectedChoice === quizInfo[quizCount].infoAnswer) {
                        quizScore++;
                    }
                    // 다음 문제로 넘어감
                    quizCount++;
                    if (quizCount < quizInfo.length) {
                        updateQuiz(quizCount);
                    } else {
                        // 모든 문제가 끝났을 경우에 대한 처리
                        navigateToResultPage(); // 페이지 이동하여 점수 표시
                    }
                });
            });
            // 해설 없는 곳 제거
            document.querySelectorAll(".htest__desc").forEach(desc => {
                if(desc.innerText === "undefined"){
                    desc.classList.add("hide");
                }
            });
        };
    
        updateQuiz(quizCount);
    </script>
</body>
</html>