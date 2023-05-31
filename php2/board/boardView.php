<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    $swMemberID = $_SESSION['swMemberID'];
    $name = $_SESSION['youName'];
    $id = $_GET['swBoardID'];

    $userSql = "SELECT * FROM swMember WHERE swMemberID = '$swMemberID'";
    $userResult = $connect -> query($userSql);
    $userinfo = $userResult -> fetch_array(MYSQLI_ASSOC);
    // if(isset($_GET['blogID'])){
    //     $blogID = $_GET['blogID'];
    // } else {
    //     Header("Location: board.php");
    // }
    $blogSql = "SELECT * FROM swComment WHERE swBoardID = '$id'";
    $blogResult = $connect -> query($blogSql);
    $blogInfo = $blogResult -> fetch_array(MYSQLI_ASSOC);
    $commentSql = "SELECT * FROM swComment WHERE swBoardID = '$id' AND commentDelete = '0' ORDER BY commentID DESC";
    $commentResult = $connect -> query($commentSql);
    $commentInfo = $commentResult -> fetch_array(MYSQLI_ASSOC);
?>
<?php
    include "../connect/connect.php";
    // 각각의 게시판에 대한 댓글 개수 조회 쿼리
    $sql = "SELECT swBoardID, COUNT(*) AS commentCount FROM swComment GROUP BY swBoardID";
    $result = $connect->query($sql);
    // 각각의 게시판에 대한 댓글 개수를 배열로 저장
    $commentCounts = array();
    while ($row = $result->fetch_assoc()) {
        $boardID = $row['swBoardID'];
        $commentCount = $row['commentCount'];
        $commentCounts[$boardID] = $commentCount;
    }
    // 게시판 ID에 해당하는 댓글 개수가 없을 경우, 0으로 초기화
    $swBoardID = 1; // 예시로 게시판 ID 1로 설정
    if (!isset($commentCounts[$swBoardID])) {
        $commentCounts[$swBoardID] = 0;
    }
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
    <div class="tab__menu">
        <div class="tab__inner">
            <h1>게시글 보기</h1>
            <p>하루 한 지문에서 자유롭게 소통해주세요!<br>
                비방, 모욕, 욕설 등의 게시글은 무단 삭제될 수 있습니다.</p>
        </div>
    </div>
    <!-- tab -->
    <div class="modal" id="modal__modify">
        <div class="modal__inner">
            <h1 class="mt50">댓글 수정하기</h1>
            <p class="mt30">댓글을 수정할 수 있습니다.</p>
            <div class="modal__wrap mt90">
                <textarea name="boardContents" id="boardContents" rows="10" class="inputStyle4" placeholder="여기서 댓글을 수정할 수 있습니다.!" maxlength=200 required></textarea>
            </div>
            <button class="modal__close modalBtn">닫기</button>
            <button type="submit" class="modalBtn" id="commentModifyBtn">수정하기</button>
        </div>
    </div>
    <!-- modal -->
    <main>
        <div class="boardView__inner container">
            <div class="view__head">
                <a href="../board/board.php"><img src="../html/assets/img/list.png" alt="리스트"></a>
                <h2><a href="../board/board.php">커뮤니티</a></h2><em>></em>
<?php
    $swBoardID = $_GET['swBoardID'];
    $sql = "SELECT b.swBoardID, b.boardCategory, b.boardTitle, b.boardContents, m.youNick, b.boardRegTime, b.boardView FROM swBoard b JOIN swMember m ON(m.swMemberID = b.swMemberID) WHERE b.swBoardID = {$swBoardID}";
    $result = $connect -> query($sql);
    $info = $result -> fetch_array(MYSQLI_ASSOC);
    echo "<h2><a href='../board/board.php'><span>".$info['boardCategory']."</span></a></h2>";
?>
            </div>
            <div class="view__body">
            <div class="boardView__info mt20">
<?php
    if(isset($_GET['swBoardID'])){
        $swBoardID = $_GET['swBoardID'];
        // 보드 뷰 + 1
        $sql = "UPDATE swBoard SET boardView = boardView + 1 WHERE swBoardID = {$swBoardID}";
        $connect -> query($sql);
        $sql = "SELECT b.swBoardID, b.boardCategory, b.boardTitle, b.boardContents, m.youNick, b.boardRegTime, b.boardView, m.youImgFile FROM swBoard b JOIN swMember m ON(m.swMemberID = b.swMemberID) WHERE b.swBoardID = {$swBoardID}";
        $result = $connect -> query($sql);
        if($result){
            $info = $result -> fetch_array(MYSQLI_ASSOC);
            $boardProfileImage = $info['youImgFile'] != '' ? "../html/assets/profile/" . $info['youImgFile'] : "../html/assets/profile/Img_default.jpg";
            echo "<div class='boardView__left'><div class='boardView__num'>".$info['boardCategory']."</div><div class='boardView__title'>".$info['boardTitle']."</div></div>";
            echo "<div class='boardView__right'><div class='boardView__count'>".$info['boardView']."</div><div class='boardView__img'><img src='".$boardProfileImage."' alt='아이콘'></div><div class='boardView__writer'><div class='name'>".$info['youNick']."</div><div class='regtime'>".date('Y-m-d', $info['boardRegTime'])."</div></div></div>";
        }
    } else {
        echo "<tr><td colspan='5'>게시글이 없습니다.</td></tr>";
    }
?>
                </div>
                <div class="boardView__main">
<?php
    if(isset($_GET['swBoardID'])){
        $swBoardID = $_GET['swBoardID'];
        // 보드 뷰 + 1
        $sql = "UPDATE board SET boardView = boardView + 1 WHERE swBoardID = {$swBoardID}";
        $connect -> query($sql);
        $sql = "SELECT b.swBoardID, b.boardTitle, b.boardContents, m.youNick, b.boardRegTime, b.boardView, b.boardImgFile FROM swBoard b JOIN swMember m ON(m.swMemberID = b.swMemberID) WHERE b.swBoardID = {$swBoardID}";
        $result = $connect -> query($sql);
        if($result){
            $info = $result -> fetch_array(MYSQLI_ASSOC);
            $boardImgFile = "../html/assets/board/" . $info['boardImgFile'];
            echo "<div><img src='{$boardImgFile}' alt='이미지' class='viewImg mb50'></div>";
            echo "<p>".$info['boardContents']."</p>";
        }
    } else {
        echo "<tr><td colspan='4'>게시글이 없습니다.</td></tr>";
    }
?>
                </div>
                <div class="boardView__btn mt60">
                    <a href="../board/board.php" class="btnStyle6">목록보기</a>
<?php if(isset($_GET['swBoardID'])): ?>
    <a href="boardModify.php?swBoardID=<?=$_GET['swBoardID']?>" class="btnStyle6">수정하기</a>
    <a href="boardRemove.php?swBoardID=<?=$_GET['swBoardID'] ?>" class="btnStyle6" onclick="return confirm('정말 삭제하시겠습니까?', '')">삭제하기</a>
<?php endif; ?>
                </div>
            </div>
            <div class="view__foot">
                <div class="comment__write">
                <p><?php echo ($commentCounts[$swBoardID] > 0) ? $commentCounts[$swBoardID] . '개' : '0개'; ?></p>
                    <form action="#">
                        <fieldset>
                            <legend class="blind">댓글쓰기</legend>
                            <div class="comment__box">
                                <textarea type="text" name="commentWrite" class="commentWrite" maxlength="1000" placeholder="댓글을 입력해주세요!"></textarea>
                                <button type="button" name="commentBtn" class="commentBtn">등록</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="comment__view">
                    <?php foreach($commentResult as $comment){ ?>
                        <div id="comment<?=$comment['commentID']?>">
                            <div class="comment__img">
                            <?php
                                    $commentID = $comment['commentID'];
                                    $sql = "SELECT c.commentID, m.youNick, m.youImgFile, m.swMemberID FROM swComment c JOIN swMember m ON(c.swMemberID = m.swMemberID) WHERE c.commentID = {$commentID}";
                                    $result = $connect -> query($sql);
                                    $info = $result -> fetch_array(MYSQLI_ASSOC);
                                    $profileImage = $info['youImgFile'] != '' ? "../html/assets/profile/" . $info['youImgFile'] : "../html/assets/profile/Img_default.jpg";
                                    echo "<img src='".$profileImage."' alt='아이콘'>";
                                ?>
                            </div>
                            <div class="comment__writer">
                                <div class="name"><?=$comment['commentName']?></div>
                                <div class="contents"><?=$comment['commentMsg']?></div>
                            </div>
                            <div class="comment__delete">
                                <a class="modal-btn">수정 / </a>
                                <a class="commentDeleteButton" href="#" data-commentid="<?=$comment['commentID']?>">삭제</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->
    <?php include "../include/footer.php"?>
    <!-- //footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>
        $('.comment__delete .modal-btn').click(function(e){
            $('.modal').fadeIn()
            let commentID = $(this).parent().parent().attr("id");
            let number = commentID.replace(/[^0-9]/g, "");
            a(number);
        });
        $('.modal__close').click(function(){
            
            $('.modal').fadeOut();
        })
        function a(commentID){
            $("#commentModifyBtn").click(function() {
                
                const number = commentID;
                let id = "<?=$swMemberID?>";
                
                if ($("#boardContents").val() === "") {
                $("#boardContents").focus();
                } else {
                $.ajax({
                    url: "boardCommentModify.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "commentMsg": $("#boardContents").val(),
                        "commentID": number,
                        "name": id,
                    },
                    success: function(data) {
                    console.log(data);
                    if (data.result === "bad") {
                        alert("틀렸습니다!");
                    } else {
                        alert("댓글이 수정되었습니다.");
                    }
                    location.reload();
                    },
                    error: function(request, status, error) {
                    console.log("request: " + request);
                    console.log("status: " + status);
                    console.log("error: " + error);
                    }
                });
                }
            })
        }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        let commentID = "";

        // 댓글 쓰기 버튼
        $(".commentBtn").click(function(){
            if($(".commentWrite").val() == ""){
                alert("댓글을 작성해주세요!");
                $(".commentWrite").focus();
            } else {
                let a = "<?=$name?>";
                let id = "<?=$id?>";
                $.ajax({
                    url: "boardCommentWrite.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "swMemberID": <?=$swMemberID?>,
                        "msg": $(".commentWrite").val(),
                        "name" : a,
                        "id" : id
                    },
                    success: function(data){
                        console.log(data);
                        location.reload();
                    },
                    error: function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        });


        //댓글 삭제 버튼
        $(document).ready(function() {
            $(".commentDeleteButton").click(function(e) {
                e.preventDefault();
                let commentID = $(this).data("commentid");
                let id = "<?=$swMemberID?>";
                
                $.ajax({
                    url: "boardCommentDelete.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        "name": id,
                        "commentID": commentID
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.result == "bad") {
                            alert("권한이 없습니다. 당사자만 삭제할 수 있습니다.");
                        } else {
                            alert("댓글이 삭제되었습니다.");
                        }
                        location.reload();
                    },
                    error: function(request, status, error) {
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                });
            });
        });

    </script>
</body>
</html>