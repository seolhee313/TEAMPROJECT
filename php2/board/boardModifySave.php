<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $swBoardID = $_POST['swBoardID'];
    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];
    $boardPass = $_POST['boardPass'];
    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents = $connect -> real_escape_string($boardContents);
    $boardPass = $connect -> real_escape_string($boardPass);
    $swMemberID = $_SESSION['swMemberID'];
    $sql = "SELECT * FROM swMember WHERE swMemberID = {$swMemberID}";
    $result = $connect -> query($sql);
    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        if($info['swMemberID'] == $swMemberID && $info['youPass'] == $boardPass){
            $sql = "UPDATE swBoard SET boardTitle = '{$boardTitle}', boardContents = '{$boardContents}' WHERE swBoardID = '{$swBoardID}'";
            $connect -> query($sql);
        } else {
            echo "<script>alert('비밀번호가 틀렸습니다. 다시 한 번 확인해주세요!')</script>";
        }
    } else {
        echo "<script>alert('관리자 에러!!')</script>";
    }
?>
<script>
    location.href = "board.php";
</script>ㄴ