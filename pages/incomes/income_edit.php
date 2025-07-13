<?php

require_once(__DIR__ . '/income_common.php');
require_once(__DIR__ . '/../../utils/db.php');

$page_title_text = IncomeCommon::PAGE_TITLE_EDIT;
$common_link_text = IncomeCommon::PAGE_TITLE_LIST;
$common_link_href = IncomeCommon::HREF_LIST;

?>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="Copyright 2021 rimusophie">
    <title><?= IncomeCommon::PAGE_TITLE_EDIT ?></title>
    <!--<link rel="icon" href="/assets/img/favicon.ico">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/common.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!--<script src="/assets/js/common.js"></script>-->
</head>

<?php

$id = $_GET["id"] ?? null;

try {
    $db = get_db();
    $sql = '
        SELECT 
            id, 
            receive_date, 
            type, 
            total_amount_paid, 
            income_tax, 
            resident_tax, 
            social_insurance_premiums, 
            other, 
            payer 
        FROM 
            incomes 
        WHERE id = :id
    ';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $income = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo sprintf("%s\n%s", Constants::MESSAGE_ERROR, $e->getMessage());
    exit;
}
?>

<body class="common-body">
    <div class="container common-container">
<?php 
include(__DIR__ . "/../../includes/header.php");
include(__DIR__ . '/../../includes/page_title.php');
?>

        <form action="<?= IncomeCommon::HREF_UPDATE ?>" method="post" class="mt-3">
            <input type="hidden" id="id" name="id" value="<?= htmlspecialchars($income['id'], ENT_QUOTES, 'UTF-8') ?>"/>
            <div class="row mt-3">
                <div class="col">
                <table class="common-table">
                    <!-- 日付 -->
                    <tr>
                        <td><?= IncomeCommon::PAGE_ITEM_RECEIVE_DATE ?></td>
                        <td>
                            <input type="date" id="receive_date" class="common-textbox" name="receive_date" value="<?= htmlspecialchars($income['receive_date'], ENT_QUOTES, 'UTF-8') ?>"/>
                        </td>
                    </tr>

                    <!-- 種別 -->
                    <tr>
                        <td><?= IncomeCommon::PAGE_ITEM_TYPE ?></td>
                        <td>
                            <select id="type" class="common-combobox" name="type" value="<?= htmlspecialchars($income['type'], ENT_QUOTES, 'UTF-8') ?>">
                                <option value="<?= IncomeCommon::ITEM_TYPE_VALUE_UNKNOWN ?>" <?= $income['type'] == 0 ? 'selected' : '' ?>><?= IncomeCommon::ITEM_TYPE_LABEL_UNKNOWN ?></option>
                                <option value="<?= IncomeCommon::ITEM_TYPE_VALUE_MONTHLY_SALARY ?>" <?= $income['type'] == 1 ? 'selected' : '' ?>><?= IncomeCommon::ITEM_TYPE_LABEL_MONTHLY_SALARY ?></option>
                                <option value="<?= IncomeCommon::ITEM_TYPE_VALUE_BONUS ?>" <?= $income['type'] == 2 ? 'selected' : '' ?>><?= IncomeCommon::ITEM_TYPE_LABEL_BONUS ?></option>
                            </select>
                        </td>
                    </tr>

                    <!-- 総支給額 -->
                    <tr>
                        <td><?= IncomeCommon::PAGE_ITEM_TOTAL_AMOUNT_PAID ?></td>
                        <td><input type="number" id="total_amount_paid" class="common-textbox" name="total_amount_paid" value="<?= htmlspecialchars($income['total_amount_paid'], ENT_QUOTES, 'UTF-8') ?>" max="<?= Constants::INPUT_INT_MAX ?>" min="<?= Constants::INPUT_INT_MIN ?>"/></td>
                    </tr>

                    <!-- 所得税 -->
                    <tr>
                        <td><?= IncomeCommon::PAGE_ITEM_INCOME_TAX ?></td>
                        <td><input type="number"  id="income_tax"  class="common-textbox" name="income_tax" value="<?= htmlspecialchars($income['income_tax'], ENT_QUOTES, 'UTF-8') ?>" max="<?= Constants::INPUT_INT_MAX ?>" min="<?= Constants::INPUT_INT_MIN ?>"/></td>
                    </tr>

                    <!-- 住民税 -->
                    <tr>
                        <td><?= IncomeCommon::PAGE_ITEM_RESIDENT_TAX ?></td>
                        <td><input type="number"  id="resident_tax"  class="common-textbox" name="resident_tax" value="<?= htmlspecialchars($income['resident_tax'], ENT_QUOTES, 'UTF-8') ?>" max="<?= Constants::INPUT_INT_MAX ?>" min="<?= Constants::INPUT_INT_MIN ?>"/></td>
                    </tr>

                    <!-- 社会保険料 -->
                    <tr>
                        <td><?= IncomeCommon::PAGE_ITEM_SOCIAL_INSURANCE_PREMIUMS ?></td>
                        <td><input type="number"  id="social_insurance_premiums"  class="common-textbox" name="social_insurance_premiums" value="<?= htmlspecialchars($income['social_insurance_premiums'], ENT_QUOTES, 'UTF-8') ?>" max="<?= Constants::INPUT_INT_MAX ?>" min="<?= Constants::INPUT_INT_MIN ?>"/></td>
                    </tr>

                    <!-- その他 -->
                    <tr>
                        <td><?= IncomeCommon::PAGE_ITEM_OTHER ?></td>
                        <td><input type="number"  id="other"  class="common-textbox" name="other" value="<?= htmlspecialchars($income['other'], ENT_QUOTES, 'UTF-8') ?>" max="<?= Constants::INPUT_INT_MAX ?>" min="<?= Constants::INPUT_INT_MIN ?>"/></td>
                    </tr>

                    <!-- 支払者 -->
                    <tr>
                        <td><?= IncomeCommon::PAGE_ITEM_PAYER ?></td>
                        <td><input type="text"  id="payer"  class="common-textbox common-width-name" name="payer" value="<?= htmlspecialchars($income['payer'], ENT_QUOTES, 'UTF-8') ?>" maxlength="<?= Constants::INPUT_NAME_MAX_LENGTH ?>"/></td>
                    </tr>
                </table>
                
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-1 text-center">
                    <button type="submit" class="w-100 h-100 common-button align-middle"><?= Constants::PAGE_UPDATE ?></button>
                </div>
            </div>
        </form>

        <form action="<?= IncomeCommon::HREF_DELETE ?>" method="post">
            <input type="hidden" id="id" name="id" value="<?= htmlspecialchars($income['id'], ENT_QUOTES, 'UTF-8') ?>"/>
            <div class="row mt-5">
                <div class="col-1 text-center">
                    <button type="submit" class="w-100 h-100 common-button align-middle"><?= Constants::PAGE_DELETE ?></button>
                </div>
            </div>
        </form>
<?php 
include(__DIR__ . '/../../includes/common_link.php');
include(__DIR__ . '/../../includes/footer.php');
?>
    </div>
</body>
</html>