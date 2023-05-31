<?php
    include "../connect/connect.php";

    for($i=1; $i<7; $i++){
        $regTime = time();

        $sql = "INSERT INTO swEvent(swMemberID, eventTitle, eventContents, eventRegTime) VALUES('1', '이벤트 타이틀${i}입니다.', '이벤트 내용물${i}입니다.이벤트 내용물${i}입니다.이벤트 내용물입니다.이벤트 내용물입니다.이벤트 내용물입니다.이벤트 내용물입니다.이벤트 내용물입니다.', $regTime)";
       
        $connect -> query($sql);
    }
?>