<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    $searchKeyword = $_GET ['searchKeyword'];
    $searchOption = $_GET ['searchOption'];

    $searchKeyword = $connect -> real_escape_string(trim($searchKeyword));
    $searchOption = $connect -> real_escape_string(trim($searchOption));
    
    $sql = "SELECT b.swBoardID, b.boardTitle, b.boardContents, m.youNick, b.boardRegTime, b.boardView FROM swBoard b JOIN swMember m ON(b.swMemberID = m.swMemberID)";

    switch($searchOption){
        case "title":
            $sql .= "WHERE b.boardTitle LIKE '%{$searchKeyword}%' ORDER BY swBoardID DESC ";
            break;
        case "content":
            $sql .= "WHERE b.boardContents LIKE '%{$searchKeyword}%' ORDER BY swBoardID DESC ";
            break;
        case "name":
            $sql .= "WHERE m.youNick LIKE '%{$searchKeyword}%' ORDER BY swBoardID DESC ";
            break;
    }
    $result = $connect -> query($sql);

    $totalCount = $result -> num_rows;
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
    <main id="main" class="center">
        <div class="tab-menu">
            <ul class="container">
                <li class="active"><a href="../board/board.php">자유게시판</a></li>
                <li><a href="../board/boardExplain.php">나만의 해설</a></li>
                <li><a href="../board/boardTip.php">일상 꿀팁</a></li>
                <li><a href="../board/boardStudy.php">인강/문제집</a></li>
            </ul>
        </div>
        <div class="board__inner container mt80">
            <div class="board__table">
                <table>
                    <colgroup>
                        <col style="width: 5%">
                        <col>
                        <col style="width: 10%">
                        <col style="width: 15%">
                        <col style="width: 7%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th>등록자</th>
                            <th>등록일</th>
                            <th>조회수</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
    $viewNumber = 10;
    $viewLimit = ($viewNumber * $page) - $viewNumber;

    $sql .= "LIMIT {$viewLimit}, {$viewNumber}";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;

        if($count > 0){
            for($i=0; $i<$count; $i++){
                $info = $result -> fetch_array(MYSQLI_ASSOC);

                echo "<tr>";
                echo "<td>".$info['swBoardID']."</td>";
                echo "<td><a href='boardView.php?swBoardID={$info['swBoardID']}'>".$info['boardTitle']."</a></td>";
                echo "<td>".$info['youNick']."</td>";
                echo "<td>".date('Y-m-d', $info['boardRegTime'])."</td>";
                echo "<td>".$info['boardView']."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>게시글이 없습니다.</td></tr>";
        }
    }
?>
                    </tbody>
                </table>
                <div class="btn mt20">
                    <a href="../board/board.php" class="btnStyle4">목록보기</a>
                </div>
            </div>
            <div class="board__pages">
                <ul>
<?php
    // 총 페이지 갯수
    $boardTotalCount = ceil($totalCount/$viewNumber);

    // 1 2 3 4 5 6 7 8 9 10
    $pageView = 4;
    $startPage = $page - $pageView;
    $endPage = $page + $pageView;

    // 처음 페이지 초기화
    if($startPage < 1) $startPage = 1;

    // 마지막 페이지 초기화
    if($endPage >= $boardTotalCount) $endPage = $boardTotalCount;

    // 처음으로/이전
    if($page != 1 && $page <= $boardTotalCount){
        $prevPage = $page - 1;
        echo "<li><a href='boardSearch.php?page=1&searchKeyword={$searchKeyword}&searchOption={$searchOption}'><img src='../html/assets/img/arrow1.png' alt='처음으로'></a></li>";
        echo "<li><a href='boardSearch.php?page={$prevPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'><img src='../html/assets/img/arrow2.png' alt='이전'></a></li>";
    }

    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($page <= $boardTotalCount){
            if($i == $page) $active = 'active';
            echo "<li class='{$active}'><a href='boardSearch.php?page={$i}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'>{$i}</a></li>";
        }
    }
    // 마지막으로/다음
    if($page < $boardTotalCount){
        $nextPage = $page + 1;
        echo "<li><a href='boardSearch.php?page={$nextPage}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'><img src='../html/assets/img/arrow3.png' alt='다음'></a></li>";
        echo "<li><a href='boardSearch.php?page={$boardTotalCount}&searchKeyword={$searchKeyword}&searchOption={$searchOption}'><img src='../html/assets/img/arrow4.png' alt='마지막으로'></a></li>";
    }
?>
                </ul>
            </div>
            <div class="board__search">
                <div class="right">
                </div>
            </div>
        </div>
    </main>
    <!-- //main -->
    <?php include "../include/footer.php"?>
    <!-- //footer -->
</body>
</html>