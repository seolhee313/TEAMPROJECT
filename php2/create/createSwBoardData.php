<?php
    include "../connect/connect.php";

    for($i=1; $i<30; $i++){
        $regTime = time();

        $sql = "INSERT INTO swBoard(swMemberID, boardTitle, boardCategory, boardContents, boardView, boardRegTime, boardAuthor) VALUES(1, '게시판 타이틀${i}입니다.', '자유', '게시판 내용물${i}입니다.게시판 내용물${i}입니다.게시판 내용물입니다.게시판 내용물입니다.게시판 내용물입니다.게시판 내용물입니다.게시판 내용물입니다.', '1', '$regTime', '여다쭐')";
       
        $connect -> query($sql);
    }
?>