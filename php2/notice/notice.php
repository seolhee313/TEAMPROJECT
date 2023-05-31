<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
    $sql = "SELECT count(swNoticeID) FROM swNotice";
    $result = $connect -> query($sql);
    $noticeTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $noticeTotalCount = $noticeTotalCount['count(swNoticeID)'];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공지사항</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->

    <div class="tab__menu">
        <div class="tab__inner">
            <h1>공지사항</h1>
            <p>하루 한 지문의 공지사항입니다.<br>
                공지사항을 참조해주세요!</p>
        </div>
    </div>
    <!-- tab -->
    
    <main>
        <div class="boardView__inner container">
            <div class="view__head">
                <a href="notice.php"><img src="../html/assets/img/list.png" alt="리스트"></a>
                <h2><a href="notice.php">공지사항</a></h2><em>></em>
                <h2><a href="notice.php"><span>공지사항</span></a></h2>
            </div>
            <div class="notice__inner mt50">
                <!-- <div class="notice__box">
                    <div class="notice__img"><img src="../html/assets/img/logo.png" alt="로고"></div>
                    <div class="notice__info">
                        <div class="notice__main">
                            <div class="not1"><span>공지사항</span></div>
                            <div class="notice__title"><a href="noticeView.html">비문학 10지문 업데이트 완료</a></div>
                        </div>
                        <div class="notice__regtime">
                            <p>2023-05-09</p>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="notice__box">
                    <div class="notice__img"><img src="../html/assets/img/logo.png" alt="로고"></div>
                    <div class="notice__info">
                        <div class="notice__main">
                            <div class="not1"><span>공지사항</span></div>
                            <div class="notice__title"><a href="noticeView.html">비문학 10지문 업데이트 완료</a></div>
                        </div>
                        <div class="notice__regtime">
                            <p>2023-05-09</p>
                        </div>
                    </div>
                </div>
                <div class="notice__box">
                    <div class="notice__img"><img src="../html/assets/img/logo.png" alt="로고"></div>
                    <div class="notice__info">
                        <div class="notice__main">
                            <div class="not1"><span>공지사항</span></div>
                            <div class="notice__title"><a href="noticeView.html">비문학 10지문 업데이트 완료</a></div>
                        </div>
                        <div class="notice__regtime">
                            <p>2023-05-09</p>
                        </div>
                    </div>
                </div>
                <div class="notice__box">
                    <div class="notice__img"><img src="../html/assets/img/logo.png" alt="로고"></div>
                    <div class="notice__info">
                        <div class="notice__main">
                            <div class="not1"><span>공지사항</span></div>
                            <div class="notice__title"><a href="noticeView.html">비문학 10지문 업데이트 완료</a></div>
                        </div>
                        <div class="notice__regtime">
                            <p>2023-05-09</p>
                        </div>
                    </div>
                </div>
                <div class="notice__box">
                    <div class="notice__img"><img src="../html/assets/img/logo.png" alt="로고"></div>
                    <div class="notice__info">
                        <div class="notice__main">
                            <div class="not1"><span>공지사항</span></div>
                            <div class="notice__title"><a href="noticeView.html">비문학 10지문 업데이트 완료</a></div>
                        </div>
                        <div class="notice__regtime">
                            <p>2023-05-09</p>
                        </div>
                    </div>
                </div> -->
<?php
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }
    $viewNum = 5;
    $viewLimit = ($viewNum * $page) - $viewNum;
    $sql = "SELECT swNoticeID, noticeCategory, noticeTitle, noticeRegTime FROM swNotice ORDER BY swNoticeID DESC LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect -> query($sql);
    if($result){
        $count = $result -> num_rows;
        if($count > 0){
            while($info = $result -> fetch_array(MYSQLI_ASSOC)){
                echo "<div class='notice__box'>";
                echo "<div class='notice__img'><img src='../html/assets/img/logo.png' alt='로고'></div>";
                echo "<a href='noticeView.php?swNoticeID={$info['swNoticeID']}'><div class='notice__info'>";
                echo "<div class='notice__main'>";
                echo "<div class='not1'><span>공지사항</span></div>";
                echo "<div class='notice__title'>".$info['noticeTitle']."</div>";
                echo "</div>";
                echo "<div class='notice__regtime'>";
                echo "<p>".date('Y-m-d', $info['noticeRegTime'])."</p>";
                echo "</div>";
                echo "</div></a>";
                echo "</div>";
            }
        } else {
            echo "<div class='notice__box'>";
            echo "<p>게시글이 없습니다.</p>";
            echo "</div>";
        }
    }
?>
                <!-- <div class="btn">
                    <a href="noticeWrite.php" class="btnStyle4">글쓰기</a>
                </div> -->
            </div>
            <div class="board__pages mt60">
                <ul>
<?php
    // 게시글 총 갯수
    $sql = "SELECT count(swNoticeID) AS totalCount FROM swNotice";
    $result = $connect->query($sql);
    $noticeTotalCount = $result->fetch_assoc()['totalCount'];
    // 총 페이지 갯수

    $totalPages = ceil($noticeTotalCount / $viewNum);
    $pageView = 5;
    $startPage = $page - $pageView;
    $endPage = $page + $pageView;

    // 처음 페이지 초기화
    if($startPage < 1) $startPage = 1;

    // 마지막 페이지 초기화
    if($endPage > $totalPages) $endPage = $totalPages;

    // 처음으로/이전
    if($page != 1 && $page <= $noticeTotalCount){
        $prevPage = $page - 1;
        echo "<li><a href='notice.php?page=1'><img src='../html/assets/img/arrow1.png' alt='처음으로'></a></li>";
        echo "<li class='prev'><a href='notice.php?page={$prevPage}'><img src='../html/assets/img/arrow2.png' alt='이전'></a></li>";
    }
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($page <= $noticeTotalCount){
            if($i == $page) $active = 'active';
            echo "<li class='{$active}'><a href='notice.php?page={$i}'>{$i}</a></li>";
        }
    }

    // 마지막으로/다음
    if($page < $totalPages){
        $nextPage = $page + 1;
        echo "<li class='next'><a href='notice.php?page={$nextPage}'><img src='../html/assets/img/arrow3.png' alt='다음'></a></li>";
        echo "<li><a href='notice.php?page={$totalPages}'><img src='../html/assets/img/arrow4.png' alt='마지막으로'></a></li>";
    }
?>
                </ul>
            </div>
        </div>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php"?>
    <!-- //footer -->
</body>
</html>