<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="Copyright 2021 rimusophie">
    <title>所得変更</title>
    <!--<link rel="icon" href="/assets/img/favicon.ico">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/common.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!--<script src="/assets/js/common.js"></script>-->
</head>

<?php
require(__DIR__ . "/../../utils/db.php");

$result_msg = "";

try{
    $pdo = get_db();

    $sql = "
        UPDATE incomes
        SET
            receive_date = :receive_date,
            type = :type,
            total_amount_paid = :total_amount_paid,
            income_tax = :income_tax,
            resident_tax = :resident_tax,
            social_insurance_premiums = :social_insurance_premiums,
            other = :other,
            payer = :payer
        WHERE id = :id
    ";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_POST["id"], PDO::PARAM_INT);
    $stmt->bindValue(':receive_date', $_POST["receive_date"], PDO::PARAM_STR);
    $stmt->bindValue(':type', $_POST["type"], PDO::PARAM_INT);
    $stmt->bindValue(':total_amount_paid', $_POST["total_amount_paid"], PDO::PARAM_INT);
    $stmt->bindValue(':income_tax', $_POST["income_tax"], PDO::PARAM_INT);
    $stmt->bindValue(':resident_tax', $_POST["resident_tax"], PDO::PARAM_INT);
    $stmt->bindValue(':social_insurance_premiums', $_POST["social_insurance_premiums"], PDO::PARAM_INT);
    $stmt->bindValue(':other', $_POST["other"], PDO::PARAM_INT);
    $stmt->bindValue(':payer', $_POST["payer"], PDO::PARAM_STR);
    $stmt->execute();

    $result_msg = "所得を更新しました。";
} catch (PDOException $e) {
    $result_msg = "エラーが発生しました。\n" . $e->getMessage();
}

?>

<body class="common-body">
    <div class="container common-container">
<?php 
include(__DIR__ . "/../../includes/header.php");
?>
        <div class="row mt-3">
            <div class="col">所得更新</div>
        </div>

        <div class="row mt-3">
            <div class="col"><?php echo $result_msg ?></div>
        </div>

        <div class="row mt-3">
            <a href="./income_list.php" class="common-link">所得一覧</a>
        </div>
        
<?php 
include(__DIR__ . "/../../includes/footer.php");
?>
    </div>
</body>
</html>