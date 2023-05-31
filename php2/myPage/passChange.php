<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
    $youName = $_SESSION[ 'youName' ];
    if ( is_null( $youName ) ) {
        header( 'Location: login.php' );
    }
    $youPass = $_POST['youPass'];
    $youPassChange = $_POST['youPassChange'];
    $youPassChangeOk = $_POST['youPassChangeOk'];
    // $youPass = sha1("web".$youPass);
    // echo "<pre>";
    // var_dump($youPass, $youPassChange, $youPassChangeOk);
    // echo "</pre>";
    if ( !is_null( $youPass ) ) {
        $sql = "SELECT youPass FROM swMember WHERE youName = '" . $youName . "'";
        $result = $connect -> query($sql);
        // var_dump($result);
        while ( $info = $result -> fetch_array(MYSQLI_ASSOC) ) {
            $byePass = $info[ 'youPass' ];
            var_dump($youPass);
            var_dump($byePass);
        }
        if ( $youPass == $byePass ){
            if ( $youPassChange == $youPassChangeOk ) {
                $newPass = $youPassChange;
                $sqlPass = "UPDATE swMember SET youPass = '" . $newPass . "' WHERE youName = '" . $youName . "'";
                $result = $connect -> query($sqlPass);
                echo "<script>alert('변경이 완료되었습니다.'); history.back(1)</script>";
            } else {
                echo "<script>alert('새 비밀번호를 다시 확인해주세요.'); history.back(1)</script>";
                exit;
            }
        } else {
            echo "<script>alert('입력하신 비밀번호가 다릅니다.'); history.back(1)</script>";
            exit;
        }
    }
?>