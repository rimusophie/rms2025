<?php

require_once(__DIR__ . '/income_common.php');
require_once(__DIR__ . '/../../utils/db.php');

$page_title_text = IncomeCommon::PAGE_TITLE_LIST;
$common_link_text = IncomeCommon::PAGE_TITLE_ADD;
$common_link_href = IncomeCommon::HREF_ADD;

$id_to_type = [
    0 => "不明",
    1 => "月給",
    2 => "賞与",
];

$pdo = get_db();
$sql = '
    SELECT 
        i.id AS i_id,
        i.receive_date AS i_receive_date,
        i.type AS i_type,
        i.total_amount_paid AS i_total_amount_paid,
        i.income_tax AS i_income_tax,
        i.resident_tax AS i_resident_tax,
        i.social_insurance_premiums AS i_social_insurance_premiums,
        i.other AS i_other,
        i.total_amount_paid - i.income_tax - i.resident_tax - i.social_insurance_premiums + i.other AS i_disposable_income,
        i.payer AS i_payer
    FROM
        incomes AS i 
    ORDER BY 
        i.receive_date DESC
';
$stmt = $pdo->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="Copyright 2021 rimusophie">
    <title><?= IncomeCommon::PAGE_TITLE_LIST ?></title>
    <!--<link rel="icon" href="/assets/img/favicon.ico">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/common.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!--<script src="/assets/js/common.js"></script>-->
</head>

<body class="common-body">
    <div class="container common-container">
<?php 
include(__DIR__ . "/../../includes/header.php");
include(__DIR__ . '/../../includes/page_title.php');
include(__DIR__ . '/../../includes/common_link.php');
?>

        <div class="row mt-3">
            <div class="col">
            <table class="common-table">
                <tr>
                    <!-- 日付 -->
                    <th>
                        <?= IncomeCommon::PAGE_ITEM_RECEIVE_DATE ?>
                    </th>

                    <!-- 種別 -->
                    <th>
                        <?= IncomeCommon::PAGE_ITEM_TYPE ?>
                    </th>

                    <!-- 総支給額 -->
                    <th>
                        <?= IncomeCommon::PAGE_ITEM_TOTAL_AMOUNT_PAID ?>
                    </th>

                    <!-- 所得税 -->
                    <th>
                        <?= IncomeCommon::PAGE_ITEM_INCOME_TAX ?>
                    </th>

                    <!-- 住民税 -->
                    <th>
                        <?= IncomeCommon::PAGE_ITEM_RESIDENT_TAX ?>
                    </th>

                    <!-- 社会保険料 -->
                    <th>
                        <?= IncomeCommon::PAGE_ITEM_SOCIAL_INSURANCE_PREMIUMS ?>
                    </th>

                    <!-- その他 -->
                    <th>
                        <?= IncomeCommon::PAGE_ITEM_OTHER ?>
                    </th>

                    <!-- 可処分所得 -->
                    <th>
                        <?= IncomeCommon::PAGE_ITEM_DISPOSABLE_INCOME ?>
                    </th>

                    <!-- 支払者 -->
                    <th>
                        <?= IncomeCommon::PAGE_ITEM_PAYER ?>
                    </th>

                    <!-- 操作 -->
                    <th>
                        <?= Constants::PAGE_OPERATION ?>
                    </th>
                </tr>
<?php foreach($result as $row): ?>
                <tr>
                    <!-- 日付 -->
                    <td>
                        <?= htmlspecialchars($row['i_receive_date'], ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <!-- 種別 -->
                    <td>
                        <?= htmlspecialchars($id_to_type[$row['i_type']], ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <!-- 総支給額 -->
                    <td class="text-end">
                        <?= htmlspecialchars(number_format($row['i_total_amount_paid']), ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <!-- 所得税 -->
                    <td class="text-end">
                        <?= htmlspecialchars(number_format($row['i_income_tax']), ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <!-- 住民税 -->
                    <td class="text-end">
                        <?= htmlspecialchars(number_format($row['i_resident_tax']), ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <!-- 社会保険料 -->
                    <td class="text-end">
                        <?= htmlspecialchars(number_format($row['i_social_insurance_premiums']), ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <!-- その他 -->
                    <td class="text-end">
                        <?= htmlspecialchars(number_format($row['i_other']), ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <!-- 可処分所得 -->
                    <td class="text-end">
                        <?= htmlspecialchars(number_format($row['i_disposable_income']), ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <!-- 支払者 -->
                    <td>
                        <?= htmlspecialchars($row['i_payer'], ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <!-- 編集 -->
                    <td>
                        <a href="<?= IncomeCommon::HREF_EDIT ?>?id=<?= urlencode($row['i_id']) ?>" class="common-link"><?= Constants::PAGE_EDIT ?></a>
                    </td>
                </tr>
<?php endforeach; ?>

            </table>
            </div>
        </div>
<?php 
include(__DIR__ . '/../../includes/footer.php');
?>
    </div>
</body>
</html>