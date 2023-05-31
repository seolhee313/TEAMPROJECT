<?php
    header('Access-Control-Allow-Origin: *');   
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>

<?php
    $youPass = $_POST['idDeletePass'];
    $swMemberID = $_SESSION['swMemberID'];


    $checkSql = "SELECT * FROM swMember WHERE swMemberID = $swMemberID";
    $result = $connect->query($checkSql);
    $checkPass = $result->fetch_array(MYSQLI_ASSOC);
    
    if( $checkPass['youPass'] == $youPass){
        $deleteSql = "DELETE FROM swBoard WHERE swMemberID = $swMemberID";
        $connect->query($deleteSql);
        $deleteSql = "DELETE FROM swNotice WHERE swMemberID = $swMemberID";
        $connect->query($deleteSql);
        $deleteSql = "DELETE FROM swEvent WHERE swMemberID = $swMemberID";
        $connect->query($deleteSql);
        $deleteSql = "DELETE FROM swComment WHERE swMemberID = $swMemberID";
        $connect->query($deleteSql);
        $deleteSql = "DELETE FROM swMember WHERE swMemberID = $swMemberID";
        $connect->query($deleteSql);
    
        $jsonResult = "good";
    
        unset($_SESSION['swMemberID']);
        unset($_SESSION['youId']);
        unset($_SESSION['youNick']);
    } else {
        $jsonResult = "bad";
    }
    

    echo json_encode(array("result" => $jsonResult));
?>