<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    
    $sql = "SELECT count(swEventID) FROM swEvent";
    $result = $connect -> query($sql);
    $eventTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $eventTotalCount = $eventTotalCount['count(swEventID)'];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>이벤트</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->

    <div class="tab__menu">
        <div class="tab__inner">
            <h1>이벤트</h1>
            <p>하루 한 지문의 이벤트입니다.<br>
                다양한 이벤트를 접해보세요!</p>
        </div>
    </div>
    <!-- tab -->

    <main>
        <div class="boardView__inner container">
            <div class="view__head">
                <a href="notice.php"><img src="../html/assets/img/list.png" alt="리스트"></a>
                <h2><a href="notice.php">공지사항</a></h2><em>></em>
                <h2><a href="event.php"><span>이벤트</span></a></h2>
            </div>
            <div class="event__wrap">
                <div class="event__top mt50">
<?php
    $sql = "SELECT * FROM swEvent ORDER BY swEventID DESC LIMIT 3";
    $result = $connect->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($event = $result->fetch_assoc()) {
            // 이미지 파일 경로 설정
            $eventImage = "../html/assets/event/" . $event['eventImgFile'];

            echo "<div class='event__top{$event['swEventID']}'>";
            echo "<a href='eventView.php?swEventID={$event['swEventID']}'>";
            echo "<img src='{$eventImage}' alt='이벤트'>";
            echo "<p>{$event['eventTitle']}</p>";
            echo "</a>";
            echo "</div>";
        }
    }
?>
                </div>
                <div class="event__bottom mt50 mb100">
<?php
    $sql = "SELECT * FROM swEvent ORDER BY swEventID DESC LIMIT 3, 3";
    $result = $connect->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($event = $result->fetch_assoc()) {
            // 이미지 파일 경로 설정
            $eventImage = "../html/assets/event/" . $event['eventImgFile'];

            echo "<div class='event__top{$event['swEventID']}'>";
            echo "<a href='eventView.php?swEventID={$event['swEventID']}'>";
            echo "<img src='{$eventImage}' alt='이벤트'>";
            echo "<p>{$event['eventTitle']}</p>";
            echo "</a>";
            echo "</div>";
        }
    }
?>

                </div>
                <!-- <div class="event__button mt80 mb100">
                    <a href="eventWrite.php" class="btnStyle4">글쓰기</a>
                </div> -->
            </div>
        </div>
    </main>
    <!-- //main -->

    <?php include "../include/footer.php"?>
    <!-- //footer -->
</body>
</html>