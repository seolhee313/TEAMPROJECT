<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>키보드 게임</title>
    <?php include "../include/head.php" ?>
</head>
<body class="keyboard">
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->

    <div class="kmodal">
        <div class="kmodal__inner">
            <h1 class="mt50">참고하기</h1>
            <p class="mt40">1. 문장 마지막 글자를 입력한 후 엔터가 아닌<br>스페이스 바를 누르면 다음 문장으로 넘어갑니다.</p>
            <p class="mt30">2. 노트북을 사용하시는 분들은 브라우저 비율을 80%로 설정해주세요.</p>
            <div class="kmodal__wrap mt90">
                <!-- <textarea name="boardContents" id="boardContents" rows="10" class="inputStyle4" maxlength="256" placeholder="여기서 댓글을 수정할 수 있습니다.!" required></textarea> -->
            </div>
            <button class="kmodal__close kmodalBtn"><img src="../html/assets/img/keyboardclose.svg" alt="닫기"></button>
            <!-- <button type="submit" class="kmodalBtn">수정하기</button> -->
        </div>
    </div>
    <!-- modal -->

    <main>
        <div class="boardView__inner container">
            <div class="typing__wrap">
                <input type="text" class="input__field">
                <div class="typing__inner">
                    <div class="typing__container" id="typingContainer">
                        <div>
                            <h2>문학과 함께하는 타자 게임</h2>
                        </div>
                        <div class="typing__text">
                          <p></p>
                        </div>
                    </div>
                    <div class="typing__info">
                        <ul>
                            <li class="time">
                                <p>시간: </p>
                                <span><b>0</b>초</span>
                            </li>
                            <li class="mistake">
                                <p>틀림: </p>
                                <span>0</span>
                            </li>
                            <li class="cpm">
                                <p>타수: </p>
                                <span>0</span>
                            </li>
                        </ul>
                        <!-- <button class="again">다시 시작</button> -->
                        <div>
                            <a class="kmodal-btn"><img src="../html/assets/img/keyboardbook.svg" alt="팁"></a>
                            <a href="../game/mzTest.php"><img src="../html/assets/img/keyboardmenu.svg" alt="뒤로가기"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php"?>
    <!-- //footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $('.typing__info .kmodal-btn').click(function(){
            $('.kmodal').fadeIn()
        })
        $('.kmodal__close').click(function(){
            $('.kmodal').fadeOut();
        })
    </script>
    
    <script>
        const poems = [
            [
                "모닥불 - 이시영 ",
                "영하의 추위 ",
                "검푸른 하늘을 향해 가지를  ",
                "툭툭 뻗고 있는 고목을 보면 ",
                "저 강인한 자연 속에 순명을 다하고 있는 것들의 아름다운 침묵이 ",
                "내 안에서도 무지개처럼 조금씩 조금씩 달아오르기 때문일까 ",
            ],[
                "서시 - 윤동주 ",
                "죽는 날까지 하늘을 우러러 한 점 부끄럼이 없기를, ",
                "잎새에 이는 바람에도 나는 괴로워했다. ",
                "별을 노래하는 마음으로 모든 죽어가는 것을 사랑해야지 ",
                "그리고 나한테  주어진 길을 걸어가야겠다. ",
                "오늘 밤에도 별이 바람에 스치운다. "
            ],[
                "고향의 봄 - 이원수 ",
                "나의 살던 고향은 꽃피는 산골 ",
                "복숭아꽃 살구꽃 아기 진달래 ",
                "울긋 불긋 꽃대궐 차린 동네 ",
                "그 속에서 놀던 때가 그립습니다. ",
                "꽃동네 새 동네 나의 옛고향 파란 들 남쪽에서 바람이 불면 ",
                "냇가의 수양버들 춤추는 동네 그 속에서 살던 때가 그립습니다. "
            ],[
                "내가 너를 - 나태주 ",
                "내가 너를 얼마나 좋아하는지 ",
                "너는 몰라도 된다. ",
                "너를 좋아하는 마음은 ",
                "오로지 나의 것이요, ",
                "나의 그리움은 나 혼자만의 것으로도 차고 넘치니까. ",
                "나는 이제 너 없이도 너를 좋아할 수 있다. "
            ],[
                "멀리서 빈다 - 나태주 ",
                "어딘가 내가 모르는 곳에 보이지 않는 꽃처럼 웃고 있는 ",
                "너 한 사람으로 하여 세상은 다시 한번 눈부신 아침이 되고 ",
                "어딘가 네가 모르는 곳에 보이지 않는 풀잎처럼 숨쉬고 있는 ",
                "나 한 사람으로 하여 세상은 다시 한번 고요한 저녁이 온다. ",
                "가을이다, 부디 아프지 마라 "
            ],[
                "발자국 - 박두순 ",
                "바닷가 모래밭에서 외줄기 발자국을 본다. ",
                "문득 무언가 하나 남기고 싶어진다. ",
                "바람이 지나고 물결이 스쳐 모든 흔적이 사라져도 ",
                "자그만 발자국을 남기고 싶다. "
            ],[
                "삶 - 김달진 ",
                "등 뒤의 무한한 어둠의 시간 눈앞의 무한한 어둠의 시간 ",
                "그 중간의 한 토막 이것이 나의 삶이다. ",
                "불을 붙이자 ",
                "무한한 어둠 속에 ",
                "나의 삶으로 빛을 밝히자 "
            ],[
                "첫눈 - 송선애 ",
                "깻단 위에 눈이 내렸다. ",
                "깨알같은 말이 쏟아졌다. ",
                "첫눈 오는 날 약속이 유효하다고 ",
                "새가 발자국을 남겼다. ",
                "기억을 털어 낸 들판 ",
                "전율의 틈으로 깨꽃 같은 소식이 다녀갔다. "
            ]
        ];

        const typingText = document.querySelector(".typing__text p");
        const inputField = document.querySelector(".input__field");
        const typingMistake = document.querySelector(".mistake span");
        const typingTime = document.querySelector(".time span b");
        const typingCpm = document.querySelector(".cpm span");
        const typingWpm = document.querySelector(".wpm span");
        const typingAgain = document.querySelector(".again");

        let charIndex = 0;
        let mistakes = 0;
        let timer;
        let maxTime = 10000;
        let timeLeft = 0;
        let isTyping = false;
        let characters;
        let currentPoemIndex = 0;

        function randomPoem() {
            typingText.innerHTML = "";

            // 시간, 틀린 개수, 타수 초기화
            timeLeft = 0;
            mistakes = 0;
            typingCpm.innerText = 0;

            // Select a random poem
            const randomIndex = Math.floor(Math.random() * poems.length);
            const randomPoem = poems[randomIndex];

            randomPoem.forEach((line) => {
                line.split("").forEach((span) => {
                    let spanTag = `<span>${span}</span>`;
                    typingText.innerHTML += spanTag;
                });

                typingText.innerHTML += "<br>";
            });

            document.addEventListener("keydown", () => inputField.focus());
            typingText.addEventListener("click", () => inputField.focus());
            characters = typingText.querySelectorAll("span");
        }

        // Initialize with a random poem
        randomPoem();

        function scrollTypingText() {
            const typingContainer = document.getElementById("typingContainer");
            typingContainer.scrollTop = typingContainer.scrollHeight;

            if (charIndex < characters.length - 1 && timeLeft < maxTime) {
                if (!isTyping) {
                isTyping = true;
                timer = setInterval(initTimer, 1000);
                scrollTypingText();
                }
            }
        }

        function initTyping() {
            let typedChar = inputField.value.split("")[charIndex];

            if (charIndex < characters.length - 1 && timeLeft < maxTime) {
                if (!isTyping) {
                isTyping = true;
                timer = setInterval(initTimer, 1000);
                }

                if (typedChar == null) {
                charIndex--;

                if (characters[charIndex].classList.contains("incorrect")) {
                    mistakes--;
                }

                characters[charIndex].classList.remove("correct", "incorrect");
                } else {
                if (characters[charIndex].innerText === typedChar) {
                    characters[charIndex].classList.add("correct");
                } else {
                    // Only increase mistakes if the typed character is not empty or a space
                    if (typedChar.trim() !== '' && typedChar !== ' ') {
                    mistakes++;
                    }
                    characters[charIndex].classList.add("incorrect");
                }
                charIndex++;
                }

                characters.forEach((span, index) => {
                if (index < charIndex) {
                    span.classList.add("active");
                } else {
                    span.classList.remove("active");
                }
                });

                typingMistake.innerText = Math.max(mistakes, 0); // Ensure mistakes is not negative

                let cpm = Math.round((charIndex / timeLeft) * 60);
                cpm = cpm < 0 || !cpm || cpm === Infinity ? 0 : cpm;
                typingCpm.innerText = cpm + "타";

                const container = document.getElementById("typingContainer");
                const containerHeight = container.offsetHeight;
                const currentCharOffsetTop = characters[charIndex].offsetTop;
                const currentCharHeight = characters[charIndex].offsetHeight;

                if (currentCharOffsetTop + currentCharHeight > containerHeight) {
                container.scrollTop =
                    currentCharOffsetTop +
                    currentCharHeight -
                    containerHeight +
                    currentCharHeight;
                }

                const typingTextContainer = document.querySelector(".typing__text");
                const inputFieldHeight = inputField.offsetHeight;

                typingTextContainer.scrollTop = inputFieldHeight;

                scrollTypingText();
            }

            if (charIndex >= characters.length - 1 || timeLeft >= maxTime) {
                clearInterval(timer);
                inputField.value = "";
                charIndex = 0; // Reset the charIndex to start from the beginning of the next poem

                displayResult();

                currentPoemIndex++;

                if (currentPoemIndex === poems.length) {
                currentPoemIndex = 0;
                }

                isTyping = false; // Reset the typing state

                randomPoem();
            }
            }

            function initTimer() {
            if (timeLeft <= maxTime) {
                timeLeft++;
                typingTime.innerText = timeLeft;
            } else {
                clearInterval(timer);
            }
        }

        function displayResult() {
            const totalCharacters = poems[currentPoemIndex].join("").length;
            const totalMistakes = Math.max(mistakes, 0);
            const totalSeconds = timeLeft;
            const cpm = Math.round((totalCharacters / totalSeconds) * 60);

            const resultText = `시간: ${totalSeconds}초, 틀린 개수: ${totalMistakes}, 타수: ${cpm}타`;
            alert(resultText);
        }

        function resetGame() {
            randomPoem();

            charIndex = mistakes = isTyping = 0;
            clearInterval(timer);
            inputField.value = "";
            timeLeft = maxTime;
            typingWpm.innerText = 0;
            typingCpm.innerText = 0;
            typingTime.innerText = timeLeft;
            typingMistake.innerText = 0;

            inputField.disabled = false;
            inputField.focus();
            typingAgain.style.display = "none";
        }

        inputField.addEventListener("input", initTyping);
        typingAgain.addEventListener("click", resetGame);
    </script>
</body>
</html>