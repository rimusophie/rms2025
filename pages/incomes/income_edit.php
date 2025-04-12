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

$id = $_GET["id"] ?? null;

try {
    $db = get_db();
    $sql = "SELECT * FROM incomes WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $income = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "エラーが発生しました。\n" . $e->getMessage();
    exit;
}
?>

<body class="common-body">
    <div class="container common-container">
<?php 
include(__DIR__ . "/../../includes/header.php");
?>
        <div class="row mt-3">
            <div class="col">所得変更</div>
        </div>

        <form action="./income_update.php" method="post" class="mt-3">
            <input type="hidden" id="id" name="id" value="<?= htmlspecialchars($income['id'], ENT_QUOTES, 'UTF-8') ?>"/>
        <div class="row mt-3">
            <div class="col">
            <table class="common-table">
                <tr>
                    <td>日付</td>
                    <td>
                        <input type="date" id="receive_date" class="common-textbox" name="receive_date" value="<?= htmlspecialchars($income['receive_date'], ENT_QUOTES, 'UTF-8') ?>"/>
                    </td>
                </tr>

                <tr>
                    <td>種別</td>
                    <td>
                        <select id="type" class="common-combobox" name="type" value="<?= htmlspecialchars($income['type'], ENT_QUOTES, 'UTF-8') ?>">
                            <option value="0" <?= $income['type'] == 0 ? 'selected' : '' ?>>不明</option>
                            <option value="1" <?= $income['type'] == 1 ? 'selected' : '' ?>>月給</option>
                            <option value="2" <?= $income['type'] == 2 ? 'selected' : '' ?>>賞与</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>総支給額</td>
                    <td><input type="number" id="total_amount_paid" class="common-textbox" name="total_amount_paid" value="<?= htmlspecialchars($income['total_amount_paid'], ENT_QUOTES, 'UTF-8') ?>"/></td>
                </tr>

                <tr>
                    <td>所得税</td>
                    <td><input type="number"  id="income_tax"  class="common-textbox" name="income_tax" value="<?= htmlspecialchars($income['income_tax'], ENT_QUOTES, 'UTF-8') ?>"/></td>
                </tr>

                <tr>
                    <td>住民税</td>
                    <td><input type="number"  id="resident_tax"  class="common-textbox" name="resident_tax" value="<?= htmlspecialchars($income['resident_tax'], ENT_QUOTES, 'UTF-8') ?>"/></td>
                </tr>

                <tr>
                    <td>社会保険料</td>
                    <td><input type="number"  id="social_insurance_premiums"  class="common-textbox" name="social_insurance_premiums" value="<?= htmlspecialchars($income['social_insurance_premiums'], ENT_QUOTES, 'UTF-8') ?>"/></td>
                </tr>

                <tr>
                    <td>支払者</td>
                    <td><input type="text"  id="payer"  class="common-textbox" name="payer" value="<?= htmlspecialchars($income['payer'], ENT_QUOTES, 'UTF-8') ?>"/></td>
                </tr>
            </table>
            
            </div>
        </div>
        <div class="row mt-3">
            <div class="col text-center ps-0 pe-0">
                <button type="submit" class="w-100 h-100 common-header-link align-middle">更新</button>
            </div>
            </div>
        </form>

        <form action="./income_delete.php" method="post" class="mt-3">
            <input type="hidden" id="id" name="id" value="<?= htmlspecialchars($income['id'], ENT_QUOTES, 'UTF-8') ?>"/>
        <div class="row mt-3">
            <div class="col text-center ps-0 pe-0">
                <button type="submit" class="w-100 h-100 common-header-link align-middle">削除</button>
            </div>
        </div>
        </form>
<?php 
include(__DIR__ . "/../../includes/footer.php");
?>
    </div>
</body>
</html>