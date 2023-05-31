<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    if(isset($_GET['swEventID'])){
        $swEventID = $_GET['swEventID'];
        $sql = "SELECT b.swEventID, b.eventTitle, b.eventContents, m.youNick, b.eventRegTime FROM swEvent b JOIN swMember m ON(m.swMemberID = b.swMemberID) WHERE b.swEventID = {$swEventID}";
        $result = $connect->query($sql);
        if($result){
            $info = $result->fetch_array(MYSQLI_ASSOC);
        }
    } else {
        echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
    }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>이벤트 보기</title>
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
                <a href="event.php"><img src="../html/assets/img/list.png" alt="리스트"></a>
                <h2><a href="notice.php">공지사항</a></h2><em>></em>
                <h2><a href="event.php"><span>이벤트</span></a></h2>
            </div>
            <div class="view__body">
                <div class="boardView__info mt20">
                    <div class="boardView__left">
                        <div class="eventView__num">이벤트</div>
                        <div class="boardView__title"><?php echo $info['eventTitle']; ?></div>
                    </div>
                    <div class="boardView__right">
                        <div class="boardView__img"><img src="../html/assets/img/writericon.png" alt="아이콘"></div>
                        <div class="boardView__writer">
                            <div class="name">관리자</div>
                            <div class="regtime">
                                <?php
                                    $timestamp = $info['eventRegTime'];
                                    $date = date("Y-m-d", $timestamp);
                                    echo $date;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="noticeView__main">
<?php
    $sql = "SELECT * FROM swEvent WHERE swEventID = $swEventID";
    $result = $connect->query($sql);
    if ($result && $result->num_rows > 0) {
        while ($event = $result->fetch_assoc()) {
            // 이미지 파일 경로 설정
            $eventImage = "../html/assets/event/" . $event['eventImgFile'];
            echo "<div><img src='{$eventImage}' alt='이벤트' class='viewImg mb50'></div>";
        }
    }
?>
                    <p><?php echo $info['eventContents']; ?></p>
                </div>
                <div class="noticeView__btn mt60">
                    <a href="event.php" class="btnStyle6">목록보기</a>
                    <?php if(isset($_GET['swEventID'])): ?>
                        <a href="eventModify.php?swEventID=<?=$_GET['swEventID']?>" class="btnStyle6">수정하기</a>
                        <a href="eventRemove.php?swEventID=<?=$_GET['swEventID'] ?>" class="btnStyle6" onclick="return confirm('정말 삭제하시겠습니까?', '')">삭제하기</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
    <!-- main -->
    <?php include "../include/footer.php"?>
    <!-- //footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $('.comment__delete .modal-btn').click(function(){
            $('.modal').fadeIn()
        })
        $('.modal__close').click(function(){
            $('.modal').fadeOut();
        })
    </script>
</body>
</html>