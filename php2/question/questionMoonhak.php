<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>문학 문제</title>
    <?php include "../include/head.php" ?>
</head>
<body>
    <?php include "../include/skip.php" ?>
    <!-- //skip -->
    <?php include "../include/header.php" ?>
    <!-- //header -->
    <div class="tab__menu">
        <div class="tab__inner">
            <h1>문학</h1>
            <p>하루 한 지문에서 준비한<br>
                문학 지문입니다.</p>
        </div>
    </div>
    <!-- tab -->
    <main id="main" class="center">
        <div class="board__inner container mt30">
            <div class="sub__list mb30">
                <a class="category-link" data-category="all">전체</a>
                <a class="category-link" data-category="시">시</a>
                <a class="category-link" data-category="소설">소설</a>
                <a class="category-link" data-category="고전">고전</a>
            </div>
            <div class="board__table">
                <table>
                    <colgroup>
                        <col style="width: 3%">
                        <col style="width: 5%">
                        <col>
                        <col style="width: 8%">
                    </colgroup>
                    <tbody>
                    <?php
                    $questions = [
                        ['[2014년도]', '시', '수능', '하'],
                        ['[2022년도]', '고전', '고2 10월 모의고사', '상'],
                        ['[2023년도]', '소설', '고1 3월 모의고사', '중'],
                        ['[2014년도]', '소설', '고3 3월 모의고사', '상'],
                        ['[2019년도]', '고전', '고1 9월 모의고사', '하'],
                        ['[2012년도]', '시', '수능', '하'],
                        ['[2015년도]', '시', '고3 6월 모의고사', '중'],
                        ['[2015년도]', '고전', '고2 10월 모의고사', '상'],
                        ['[2011년도]', '소설', '고3 2월 모의고사', '하'],
                        ['[2023년도]', '시', '고1 5월 모의고사', '중'],
                    ];
                    // 현재 페이지 번호
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                    // 페이지당 표시할 항목 수
                    $itemsPerPage = 10;
                    // 전체 항목 수
                    $totalItems = count($questions);
                    // 전체 페이지 수
                    $totalPages = ceil($totalItems / $itemsPerPage);
                    // 현재 페이지에 해당하는 항목의 시작 인덱스
                    $startIndex = ($currentPage - 1) * $itemsPerPage;
                    // 현재 페이지에 해당하는 항목만 추출
                    $currentPageItems = array_slice($questions, $startIndex, $itemsPerPage);
                    for ($i = 0; $i < count($currentPageItems); $i++) {
                        $id = $startIndex + $i + 1;
                        $question = $questions[$startIndex + $i];
                        $url = "questionViewMoonhak.php?id=$id"; // 문제를 표시하는 페이지의 URL 생성
                        ?>
                        <tr class="category-row <?php echo strtolower($question[1]); ?>">
                            <td><?php echo $question[0]; ?></td>
                            <td><span class="<?php echo strtolower($question[1]); ?>"><?php echo $question[1]; ?></span></td>
                            <td><a href="<?php echo $url; ?>"><?php echo $question[2]; ?></a></td>
                            <td><span class="<?php echo $question[3]; ?>"><?php echo $question[3]; ?></span></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <?php
    // 현재 페이지 번호
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    // 페이지당 표시할 항목 수
    $itemsPerPage = 10;
    // 전체 항목 수
    $totalItems = count($questions);
    // 전체 페이지 수
    $totalPages = ceil($totalItems / $itemsPerPage);
    // 현재 페이지에 해당하는 항목의 시작 인덱스
    $startIndex = ($currentPage - 1) * $itemsPerPage;
    // 현재 페이지에 해당하는 항목만 추출
    $currentPageItems = array_slice($questions, $startIndex, $itemsPerPage);
?>
            <div class="board__pages mt50 mb100">
                <ul>
                <?php if ($currentPage > 1): ?>
                    <li class="arrow"><a href="?page=1"><img src="../html/assets/img/arrow1.png" alt="처음으로"></a></li>
                    <li class="arrow"><a href="?page=<?php echo $currentPage - 1; ?>"><img src="../html/assets/img/arrow2.png" alt="이전"></a></li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <?php if ($i == $currentPage): ?>
                        <li class="active"><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php else: ?>
                        <li><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php endif; ?>
                <?php endfor; ?>
                <?php if ($currentPage < $totalPages): ?>
                    <li class="arrow"><a href="?page=<?php echo $currentPage + 1; ?>"><img src="../html/assets/img/arrow3.png" alt="다음"></a></li>
                    <li class="arrow"><a href="?page=<?php echo $totalPages; ?>"><img src="../html/assets/img/arrow4.png" alt="마지막으로"></a></li>
                <?php endif; ?>
                </ul>
            </div>
        </div>
    </main>
    <!-- //main -->
    <?php include "../include/footer.php"?>
    <!-- //footer -->
    <script>
        const categoryLinks = document.querySelectorAll(".category-link");
        const categoryRows = document.querySelectorAll(".category-row");
        categoryLinks.forEach(link => {
            link.addEventListener("click", () => {
                const category = link.getAttribute("data-category");
                categoryRows.forEach(row => {
                    if (category === "all") {
                        row.style.display = "table-row";
                    } else {
                        const categoryClass = row.classList[1];
                        if (categoryClass === category.toLowerCase()) {
                            row.style.display = "table-row";
                        } else {
                            row.style.display = "none";
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>