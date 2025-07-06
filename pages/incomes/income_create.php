<?php

require_once(__DIR__ . '/income_common.php');
require_once(__DIR__ . '/../../utils/db.php');

$page_title_text = IncomeCommon::PAGE_TITLE_ADD;
$common_link_text = IncomeCommon::PAGE_TITLE_LIST;
$common_link_href = IncomeCommon::HREF_LIST;
?>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="Copyright 2021 rimusophie">
    <title><?= IncomeCommon::PAGE_TITLE_ADD ?></title>
    <!--<link rel="icon" href="/assets/img/favicon.ico">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/common.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!--<script src="/assets/js/common.js"></script>-->
</head>

<?php

$result_msg_text = "";

try {
    $pdo = get_db();

    $sql = '
        INSERT INTO incomes (
            receive_date,
            type,
            total_amount_paid,
            income_tax,
            resident_tax,
            social_insurance_premiums,
            other,
            payer
        ) VALUES (
            :receive_date,
            :type,
            :total_amount_paid,
            :income_tax,
            :resident_tax,
            :social_insurance_premiums,
            :other,
            :payer
        )'
    ;
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':receive_date', $_POST["receive_date"], PDO::PARAM_STR);
    $stmt->bindValue(':type', $_POST["type"], PDO::PARAM_INT);
    $stmt->bindValue(':total_amount_paid', $_POST["total_amount_paid"], PDO::PARAM_INT);
    $stmt->bindValue(':income_tax', $_POST["income_tax"], PDO::PARAM_INT);
    $stmt->bindValue(':resident_tax', $_POST["resident_tax"], PDO::PARAM_INT);
    $stmt->bindValue(':social_insurance_premiums', $_POST["social_insurance_premiums"], PDO::PARAM_INT);
    $stmt->bindValue(':other', $_POST["other"], PDO::PARAM_INT);
    $stmt->bindValue(':payer', $_POST["payer"], PDO::PARAM_STR);
    $stmt->execute();

    $result_msg_text = IncomeCommon::MESSAGE_CREATE_SUCCESS;
} catch (PDOException $e) {
    $result_msg_text = sprintf("%s\n%s", Constants::MESSAGE_ERROR, $e->getMessage());
}

?>

<body class="common-body">
    <div class="container common-container">
<?php 
include(__DIR__ . "/../../includes/header.php");
include(__DIR__ . '/../../includes/page_title.php');
include(__DIR__ . '/../../includes/result_msg.php');
include(__DIR__ . '/../../includes/common_link.php');
include(__DIR__ . '/../../includes/footer.php');
?>
    </div>
</body>
</html>