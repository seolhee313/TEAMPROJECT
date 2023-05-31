<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    // boardID가 존재하지 않을 경우
    if (!isset($_GET['swBoardID'])) {
        echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
        exit;
    }
    $swBoardID = $_GET['swBoardID'];
    $swMemberID = $_SESSION['swMemberID'];
    // 해당 게시글의 작성자와 로그인한 사용자가 다를 경우
    $sql = "SELECT swBoardID FROM swBoard WHERE swBoardID = {$swBoardID} AND swMemberID = '{$swMemberID}'";
    $result = $connect->query($sql);
    if ($result->num_rows == 0) {
        echo "<script>alert('작성자만 삭제할 수 있습니다.'); history.back();</script>";
        exit;
    }
    $swBoardID = $connect->real_escape_string($swBoardID);
    $sql = "DELETE FROM swBoard WHERE swBoardID = {$swBoardID}";
    $connect->query($sql);
?>
<script>
    location.href = "board.php";
</script>