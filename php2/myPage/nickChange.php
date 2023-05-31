<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    // 파일 정보
    $swMemberID = $_SESSION['swMemberID'];
    $youNick = $_POST['youNickChange'];
    // var_dump($youBirth);
    if(!is_null( $youNick )){
        $sql = "UPDATE swMember SET youNick = '".$youNick."' WHERE swMemberID = '".$swMemberID."'";
        var_dump($sql);
        $result = $connect -> query($sql);
        var_dump($result);
        echo "<script>alert('닉네임 변경을 완료했습니다.'); history.back(1)</script>";
    }
?>