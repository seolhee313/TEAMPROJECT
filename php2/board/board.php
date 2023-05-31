<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
    $sql = "SELECT count(swBoardID) FROM swBoard";
    $result = $connect -> query($sql);
    $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardTotalCount = $boardTotalCount['count(swBoardID)'];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->
    <main id="main" class="center">
        <div class="tab-menu">
            <?php include "../include/boardCate.php" ?>
        </div>
        <div class="board__inner container mt50">
            <div class="board__head list">
                <a href="board.php"><img src="../html/assets/img/list.png" alt="리스트"></a>
                <h2><a href="board.php">전체 게시판</a></h2>
            </div>
            <div class="board__table">
                <table>
                    <colgroup>
                        <col style="width: 5%">
                        <col>
                        <col style="width: 10%">
                        <col style="width: 15%">
                        <col style="width: 7%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>카테고리</th>
                            <th>제목</th>
                            <th>등록자</th>
                            <th>등록일</th>
                            <th>조회수</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td>10</td>
                            <td><a href="boardView.html">어쩌면 국어를 포기하고 코딩을 배우는게 나을지도...</a></td>
                            <td>장진용</td>
                            <td>2023.05.08</td>
                            <td>100</td>
                        </tr> -->
<?php
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }
    $viewNum = 10;
    $viewLimit = ($viewNum * $page) - $viewNum;
    $sql = "SELECT b.swBoardID, b.boardCategory, b.boardTitle, m.youNick, b.boardRegTime, b.boardView FROM swBoard b JOIN swMember m ON(b.swMemberID = m.swMemberID) ORDER BY b.swBoardID DESC LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect -> query($sql);
    if($result){
        $count = $result -> num_rows;
        if($count > 0){
            for($i=0; $i<$count; $i++){
                $info = $result -> fetch_array(MYSQLI_ASSOC);
                echo "<tr>";
                echo "<td>".$info['boardCategory']."</td>";
                echo "<td><a href='boardView.php?swBoardID={$info['swBoardID']}'>".$info['boardTitle']."</a></td>";
                echo "<td>".$info['youNick']."</td>";
                echo "<td>".date('Y-m-d', $info['boardRegTime'])."</td>";
                echo "<td>".$info['boardView']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>게시글이 없습니다.</td></tr>";
        }
    }
?>
                    </tbody>
                </table>
                <div class="btn mt20">
                    <a href="../board/boardWrite.php" class="btnStyle4">글쓰기</a>
                </div>
            </div>
            <div class="board__pages">
                <ul>
<?php
    // 게시글 총 갯수
    $sql = "SELECT count(swBoardID) FROM swBoard";
    $result = $connect -> query($sql);
    $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardTotalCount = $boardTotalCount['count(swBoardID)'];
    // 총 페이지 갯수
    $boardTotalCount = ceil($boardTotalCount/$viewNum);
    $pageView = 5;
    $startPage = $page - $pageView;
    $endPage = $page + $pageView;
    // 처음 페이지 초기화
    if($startPage < 1) $startPage = 1;
    // 마지막 페이지 초기화
    if($endPage >= $boardTotalCount) $endPage = $boardTotalCount;
    // 처음으로/이전
    if($page != 1 && $page <= $boardTotalCount){
        $prevPage = $page - 1;
        echo "<li><a href='board.php?page=1'><img src='../html/assets/img/arrow1.png' alt='처음으로'></a></li>";
        echo "<li><a href='board.php?page={$prevPage}'><img src='../html/assets/img/arrow2.png' alt='이전'></a></li>";
    }
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($page <= $boardTotalCount){
            if($i == $page) $active = 'active';
            echo "<li class='{$active}'><a href='board.php?page={$i}'>{$i}</a></li>";
        }
    }
    // 마지막으로/다음
    if($page < $boardTotalCount){
        $nextPage = $page + 1;
        echo "<li><a href='board.php?page={$nextPage}'><img src='../html/assets/img/arrow3.png' alt='다음'></a></li>";
        echo "<li><a href='board.php?page={$boardTotalCount}'><img src='../html/assets/img/arrow4.png' alt='마지막으로'></a></li>";
    }
?>
                </ul>
            </div>
            <div class="board__search">
                <div class="right">
                    <form action="boardSearch.php" name="boardSearch" method="get">
                        <fieldset>
                            <legend class="blind">게시판 검색 영역</legend>
                            <select name="searchOption" id="searchOption">
                                <option value="title">제목</option>
                                <option value="content">내용</option>
                                <option value="name">등록자</option>
                            </select>
                            <input type="search" name="searchKeyword" id="searchKeyword" placeholder="검색어를 입력해주세요!" required>
                            <button type="submit" class="btnStyle5 white">검색</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->
    <?php include "../include/footer.php"?>
    <!-- //footer -->
    <script>
    const tabMenu = document.querySelectorAll(".tab-menu ul li");
    const currentURL = window.location.href;
    // 페이지 로드 시 쿠키에서 액티브한 항목 인덱스를 가져와서 설정
    const activeIndex = getActiveIndexFromCookie();
    if (activeIndex !== null) {
        tabMenu[activeIndex].classList.add("active");
    }
    tabMenu.forEach((li, index) => {
        const link = li.querySelector("a");
        const href = link.getAttribute("href");
        if (currentURL.includes(href)) {
            li.classList.add("active");
            setActiveCookie(index); // 액티브한 항목 인덱스를 쿠키에 저장
        }
        li.addEventListener("click", (event) => {
            event.preventDefault();
            const isActive = li.classList.contains("active");
            if (!isActive) {
                tabMenu.forEach((el) => {
                    e   l.classList.remove("active");
                });
                li.classList.add("active");
                setActiveCookie(index); // 액티브한 항목 인덱스를 쿠키에 저장
                const href = link.getAttribute("href");
                window.location.href = href;
            }
        });
    });
    // 쿠키에서 액티브한 항목 인덱스 가져오기
    function getActiveIndexFromCookie() {
        const cookies = document.cookie.split("; ");
        for (let i = 0; i < cookies.length; i++) {
            const cookie = cookies[i].split("=");
            if (cookie[0] === "activeIndex") {
                return parseInt(cookie[1]);
            }
        }
        return null;
    }
    // 액티브한 항목 인덱스를 쿠키에 저장
    function setActiveCookie(index) {
        document.cookie = `activeIndex=${index}; path=/`;
    }
    // board.php 페이지에서 모든 액티브 상태 제거
    const boardPage = "board.php";
    if (currentURL.includes(boardPage)) {
        tabMenu.forEach((li) => {
            li.classList.remove("active");
        });
        document.cookie = "activeIndex=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    }
</script>
</body>
</html>