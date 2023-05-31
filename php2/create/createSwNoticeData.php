<?php
    include "../connect/connect.php";

    for($i=1; $i<100; $i++){
        $regTime = time();

        $sql = "INSERT INTO swNotice(swMemberID, noticeTitle, noticeContents, noticeRegTime) VALUES('1', '게시판 타이틀${i}입니다.', '게시판 내용물${i}입니다.게시판 내용물${i}입니다.게시판 내용물입니다.게시판 내용물입니다.게시판 내용물입니다.게시판 내용물입니다.게시판 내용물입니다.', $regTime)";
       
        $connect -> query($sql);
    }
?>