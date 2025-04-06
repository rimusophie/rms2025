<?php

require(__DIR__ . "/../utils/db.php");

$pdo = get_db();
$sql = "
    SELECT 
        i.receive_date AS i_receive_date,
        i.type AS i_type,
        i.total_amount_paid AS i_total_amount_paid,
        i.income_tax AS i_income_tax,
        i.resident_tax AS i_resident_tax,
        i.social_insurance_premiums AS i_social_insurance_premiums,
        i.payer AS i_payer
    FROM
        incomes AS i 
";
/*
$sql = "
    SELECT 
        p.show_title AS p_show_title, 
        p.remark AS p_remark, 
        GROUP_CONCAT(s.name ORDER BY s.id SEPARATOR ',') AS s_name
    FROM portfolios AS p 
        LEFT JOIN portfolio_skills AS ps 
            ON p.id = ps.portfolio_id 
        LEFT JOIN skills AS s 
            ON ps.skill_id = s.id
    GROUP BY
	    p.id,
        p.show_title,
        p.remark
    ORDER BY
        p.id
";
*/
$result = $pdo->query($sql);

?>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="Copyright 2021 rimusophie">
    <title>所得一覧</title>
    <!--<link rel="icon" href="/assets/img/favicon.ico">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/common.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!--<script src="/assets/js/common.js"></script>-->
</head>

<body class="common-body">
    <div class="container common-container">
<?php 
include(__DIR__ . "/../includes/header.php");
?>
        <div class="row mt-3">
            <div class="col">所得一覧</div>
        </div>

        <div class="row mt-3">
            <div class="col">
            <table class="common-table">
                <tr>
                    <th>日付</th>
                    <th>種別</th>
                    <th>総支給額</th>
                    <th>所得税</th>
                    <th>住民税</th>
                    <th>社会保険料</th>
                    <th>差引</th>
                    <th>支払者</th>
                </tr>
<?php
                foreach($result as $row) {
                    echo "<tr>";
                    echo "<td>";
                    echo htmlspecialchars($row["i_receive_date"], ENT_QUOTES, "UTF-8");
                    echo "</td>";
                    echo "<td>";
                    echo htmlspecialchars($row["i_type"], ENT_QUOTES, "UTF-8");
                    echo "</td>";
                    echo "<td>";
                    echo htmlspecialchars($row["i_total_amount_paid"], ENT_QUOTES, "UTF-8");
                    echo "</td>";
                    echo "<td>";
                    echo htmlspecialchars($row["i_income_tax"], ENT_QUOTES, "UTF-8");
                    echo "</td>";
                    echo "<td>";
                    echo htmlspecialchars($row["i_resident_tax"], ENT_QUOTES, "UTF-8");
                    echo "</td>";
                    echo "<td>";
                    echo htmlspecialchars($row["i_social_insurance_premiums"], ENT_QUOTES, "UTF-8");
                    echo "</td>";
                    echo "<td>";
                    echo "0";
                    echo "</td>";
                    echo "<td>";
                    echo htmlspecialchars($row["i_payer"], ENT_QUOTES, "UTF-8");
                    echo "</td>";
                    echo"</tr>";
                }
?>
            </table>
            </div>
        </div>
<?php 
include(__DIR__ . "/../includes/footer.php");
?>
    </div>
</body>
</html>