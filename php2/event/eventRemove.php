<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if (!isset($_GET['swEventID'])) {
        echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
        exit;
    }

    $swEventID = $_GET['swEventID'];
    $swMemberID = $_SESSION['swMemberID'];

    // 해당 게시글의 작성자와 로그인한 사용자가 다를 경우
    $sql = "SELECT swEventID FROM swEvent WHERE swEventID = {$swEventID} AND swMemberID = '{$swMemberID}'";
    $result = $connect->query($sql);

    if ($result->num_rows == 0) {
        echo "<script>alert('작성자만 삭제할 수 있습니다.'); history.back();</script>";
        exit;
    }

    $swEventID = $connect->real_escape_string($swEventID);
    $sql = "DELETE FROM swEvent WHERE swEventID = {$swEventID}";
    $connect->query($sql);
?>

<script>
    location.href = "event.php";
</script>