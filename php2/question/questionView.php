<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $swMemberID = $_SESSION['swMemberID'];

    $id = $_GET['id'];

    $jsonPath = "../html/json/ex" . $id . ".json";

    $swReviewID = $id; // swReviewID 값을 현재 페이지의 id 값으로 설정합니다.
    $questionID = $id;
    $questionCate = '비문학';

    
    $swReviewSql = "SELECT * FROM swReview WHERE swMemberID = '$swMemberID' AND questionID = '$questionID' AND questionCate = '$questionCate'";
    $swReviewResult = $connect->query($swReviewSql);
    $swReviewInfo = $swReviewResult->fetch_array(MYSQLI_ASSOC);
    
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비문학 문제</title>

    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <header id="Qheader">
        <div class="Qhead__inner container">
            <div class="Qhead__left">
                <div class="Qhead__box">
                    <a href="../question/question.php">←</a>
                    <p class="Qhead__sub"></p>
                </div>
            </div>
            <div class="Qhead__center">
                <h2 class="Qhead__title"></h2>
            </div>
            <div class="Qhead__right">
                <div class="Qhead__memo hide">오답노트</div>
                <div class="Qhead__time"></div>
            </div>
        </div>
    </header>
    <!-- //header -->
    <div class="modal">
        <div class="questionModal__inner">
            <button class="questionModal__close">닫기</button>
            <div class="questionModal__wrap">
                
            </div>
        </div>
    </div>
    <!-- modal -->
    <div class="reviewModal">
        <div class="reviewModal__inner">
            <button class="reviewModal__close">닫기</button>
            <h1>✍️나만의 오답노트</h1>
            <p class="mt30">자신만의 해설을 기록하여 오답노트를 작성해보아요!</p>
            <div class="reviewModal__wrap mt20">
                <form action="#">
                    <fieldset>
                        <legend class="blind">오답노트 쓰기</legend>
                        <textarea name="reviewContents" id="reviewContents" rows="15" class="inputStyle6 reviewModal_scroll" placeholder="오답노트를 작성해 주세요!" required><?= $swReviewInfo['reviewContents'] ?></textarea>
                        <h2 class="questionYearNum mt10"></h2>
                        <div class="review__save">
                            <button type="button" id="reviewUpdateBtn" class="questionReviewModify">수정하기</button>
                            <button type="button" id="reviewWriteBtn" class="questionReviewSave">저장하기</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <!-- 오답노트 modal -->
    <main id="main">
        <div class="question__inner container">
            <div class="question__box">
                <p class="question__title mb10">다음 지문을 읽고 문제를 푸시오.</p>
                <p class="question__text">
                    
                </p>
            </div>
            <div class="question__conts mt30">
                <div class="question__quiz">
                </div>
            </div>
        </div>
    </main>
    <footer id="Qfooter">
        <div class="Qfooter__inner container">
            <button type="submit" class="question__submit">답안 제출</button>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        let swReviewID = "";

        // 오답노트 저장 버튼
        $("#reviewWriteBtn").click(function(){
            if($("#reviewContents").val() == ""){
                alert("오답노트를 작성해주세요!");
                $("#reviewContents").focus();
            } else {
                $.ajax({
                    url: "reviewWriteSave.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "swMemberID": <?=$swMemberID?>,
                        "questionID": <?=$questionID?>,
                        "reviewContents": $("#reviewContents").val(),
                        "questionCate": "비문학"
                    },
                    success: function(data){
                        console.log(data);
                        alert("오답노트가 저장되었습니다.");
                        // location.reload(); // 리로드 삭제
                    },
                    error: function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        });

        // 오답노트 수정 버튼
        $("#reviewUpdateBtn").click(function(){
            if($("#reviewContents").val() == ""){
                alert("오답노트를 수정해주세요!");
                $("#reviewContents").focus();
            } else {
                $.ajax({
                    url: "reviewWriteModify.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "questionID": <?=$questionID?>,
                        "swMemberID": <?=$swMemberID?>,
                        "reviewContents": $("#reviewContents").val(),
                        "questionCate": "비문학"
                    },
                    success: function(data){
                        console.log(data);
                        alert("오답노트가 수정되었습니다.");
                        // location.reload(); // 리로드 삭제
                    },
                    error: function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        });
        
    </script>
    <script>
        $('.question__submit').click(function(){
            $('.modal').fadeIn()
        })
        $('.questionModal__close').click(function(){
            $('.modal').fadeOut();
        })
        $('.Qhead__memo').click(function(){
            $('.reviewModal').fadeIn()
        })
        $('.reviewModal__close').click(function(){
            $('.reviewModal').fadeOut();
        })
    </script>
    <script>
        let startTime = new Date();
        let timerElement = document.querySelector(".Qhead__time");

        function updateTimer() {
            let currentTime = new Date();
            let elapsedTime = currentTime - startTime;
            let hours = Math.floor(elapsedTime / 3600000);
            let minutes = Math.floor((elapsedTime % 3600000) / 60000);
            let seconds = Math.floor((elapsedTime % 60000) / 1000);

            // 시간, 분, 초가 한 자리 숫자인 경우 앞에 0을 추가하여 두 자리로 표시
            minutes = (minutes < 10 ? "0" : "") + minutes;
            seconds = (seconds < 10 ? "0" : "") + seconds;

            // 타이머 표시
            timerElement.textContent = minutes + ":" + seconds;
        }

        // 1초마다 updateTimer 함수 호출하여 타이머 업데이트
        setInterval(updateTimer, 1000);
    </script>
    <script>
        // 선택자
        const questionQuiz = document.querySelector(".question__quiz");
        const questionResult = document.querySelector(".questionModal__wrap");
        const mainText = document.querySelector(".question__text");
        const quizTime = document.querySelector(".Qhead__title");
        const quizModalTime = document.querySelector(".questionYearNum");
        const quizSub = document.querySelector(".Qhead__sub");
        const answerTitle = document.getElementById("answerTitle");

        let questionAll = [];       // 모든 퀴즈 정보
        let mainTextContent = "";   // 메인 지문 내용
        let questionYear = "";      // 문제 년도  
        let questionCate = "";      // 문제 카테고리

        const dataQuestion = () => {
            fetch("<?php echo $jsonPath; ?>")
                .then((res) => res.json())
                .then((data) => {
                    questionAll = data.questions.map((item, index) => {
                        const formattedQuestion = {
                            question: item.question,
                            number: index + 1,
                        };
                        const answerChoices = [...item.incorrect_answers]; // 오답 불러오기
                        formattedQuestion.answer =
                        Math.round(Math.random() * answerChoices.length) + 1;
                        answerChoices.splice(
                            formattedQuestion.answer - 1,
                            0,
                            item.correct_answer
                        );

                        // 보기를 추가
                        answerChoices.forEach((choice, index) => {
                        formattedQuestion["choice" + (index + 1)] = choice;
                        });

                        // 문제에 대한 해설이 있으면 출력
                        if (item.hasOwnProperty("ques_desc")) {
                        formattedQuestion.ques_desc = item.ques_desc;
                        }

                        // 문제의 정답해설 출력
                        formattedQuestion.result = item.result_desc;
                        return formattedQuestion;

                    });

                    mainTextContent = data.main_text;
                    questionYear = data.question_year;
                    questionCate = data.question_cate;
                    newQuestion(); // 문제 만들기
                })
                .catch((err) => console.log(err));
        };

        const newQuestion = () => {
            const exam = [];
            const result = [];

            questionAll.forEach((question, number) => {
                exam.push(`
                    <div class="quiz">
                        <div class="quiz__problem"><span>${question.number}</span>. ${question.question}</div>
                        <div class="quiz__desc">${question.ques_desc}</div>
                        <div class="quiz__selects">
                        <input type="radio" id="select${number}_1" name="select${number}" value="${number}_1">
                        <label for="select${number}_1"><span>${question.choice1}</span></label>
                        <input type="radio" id="select${number}_2" name="select${number}" value="${number}_2">
                        <label for="select${number}_2"><span>${question.choice2}</span></label>
                        <input type="radio" id="select${number}_3" name="select${number}" value="${number}_3">
                        <label for="select${number}_3"><span>${question.choice3}</span></label>
                        <input type="radio" id="select${number}_4" name="select${number}" value="${number}_4">
                        <label for="select${number}_4"><span>${question.choice4}</span></label>
                        <input type="radio" id="select${number}_5" name="select${number}" value="${number}_5">
                        <label for="select${number}_5"><span>${question.choice5}</span></label>
                        </div>
                    </div>
                `);

                result.push(`
                    <h1>정답 : ${question.answer}번</h1><br>
                    <p>${question.result}</p>
                `);
            });

            questionQuiz.innerHTML = exam.join('');
            questionResult.innerHTML = result.join('');
            mainText.innerHTML = mainTextContent;
            quizTime.innerHTML = questionYear;
            quizModalTime.innerHTML = questionYear;
            quizSub.innerHTML = questionCate;
            

            // 문제 설명 없는 곳 제거
            document.querySelectorAll(".quiz__desc").forEach(desc => {
                if(desc.innerText === "undefined"){
                    desc.classList.add("hide");
                }
            });

            
            // 답안 제출 시 실행되는 이벤트 리스너
            document.querySelector(".question__submit").addEventListener("click", () => {
                document.querySelector(".Qhead__memo").classList.remove("hide"); // 오답노트 표시

                // 모든 답안 라벨에 "answer" 클래스 제거
                const allLabels = document.querySelectorAll('label');
                allLabels.forEach(label => {
                    label.classList.remove('answer');
                });

                // 정답 라벨에 "answer" 클래스 추가
                questionAll.forEach((question, index) => {
                    const correctAnswer = question.answer;
                    const correctLabel = document.querySelector(`label[for="select${index}_${correctAnswer}"]`);
                    if (correctLabel) {
                    correctLabel.classList.add('answer');
                    }
                });
            });
        };
        dataQuestion();
    </script>
</body>
</html>