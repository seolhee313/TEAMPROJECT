<header id="header" class="">
    <div class="header__inner container">
        <div class="left">
            <h1><a href="/php2/index.html"><img src="../html/assets/img/logo.png" alt="로고"></a></h1>
        </div>
        <nav class="nav__inner">
            <div class="nav__bg"></div>
            <ul>
                <li><a href="../main/main.php">하루 한 지문</a>
                    <ul class="sub">
                        <li><a href="../main/background.php">배경</a></li>
                    </ul>
                </li>
                <li><a href="../question/question.php">문제</a>
                    <ul class="sub">
                        <li><a href="../question/questionMoonhak.php">문학</a></li>
                        <li><a href="../question/question.php">비문학</a></li>
                    </ul>
                </li>
                <li><a href="../game/mzTest.php">게임</a>
                    <ul class="sub">
                        <li><a href="../game/mzTest.php">신조어 테스트</a></li>
                        <li><a href="../game/hangeulTest.php">맞춤법 테스트</a></li>
                        <li><a href="../game/keyboard.php">타자연습</a></li>
                    </ul>
                </li>
                <li><a href="../board/board.php">커뮤니티</a>
                    <ul class="sub">
                        <li><a href="../board/board.php">자유게시판</a></li>
                        <li><a href="../board/board.php">나만의 해설</a></li>
                        <li><a href="../board/board.php">일상 꿀팁</a></li>
                        <li><a href="../board/board.php">인강/문제집</a></li>
                    </ul>
                </li>
                <li><a href="../notice/notice.php">공지사항</a>
                    <ul class="sub">
                        <li><a href="../notice/notice.php">공지사항</a></li>
                        <li><a href="../event/event.php">이벤트</a></li>
                        <li><a href="../faq/faq.php">FAQ</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div class="right">
        <?php if(isset($_SESSION['swMemberID'])){   ?>
                <ul>
                    <li><a href="../login/logout.php">로그아웃</a></li>
                </ul>
                <div class="my">
                    <a href="../myPage/myPage.php"><img src="../html/assets/img/mypage.svg" alt="마이페이지"></a>
                </div>
            <?php } else { ?>
                <ul>
                    <li><a href="../login/login.php">로그인</a></li>
                </ul>
            <?php } ?>
        </div>
    </div>
</header>
<!-- //header -->