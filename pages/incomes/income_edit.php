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

$record = [];

try {
    $id = filter_input(INPUT_GET, Constants::HTML_NAME_ID, FILTER_VALIDATE_INT);
    $record = IncomeCommon::get($id);
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
            <input 
                type="hidden" 
                id="<?= Constants::HTML_NAME_ID ?>" 
                name="<?= Constants::HTML_NAME_ID ?>" 
                value="<?= htmlspecialchars($record[Constants::HTML_NAME_ID], ENT_QUOTES, 'UTF-8') ?>"
            />
            <div class="row mt-3">
                <div class="col">
                <table class="common-table">
                    <!-- 日付 -->
                    <tr>
                        <td>
                            <?= IncomeCommon::PAGE_ITEM_RECEIVE_DATE ?>
                        </td>
                        <td>
                            <input 
                                type="date" 
                                id="<?= IncomeCommon::HTML_NAME_RECEIVE_DATE ?>" 
                                class="common-textbox" 
                                name="<?= IncomeCommon::HTML_NAME_RECEIVE_DATE ?>" 
                                value="<?= htmlspecialchars($record[IncomeCommon::HTML_NAME_RECEIVE_DATE], ENT_QUOTES, 'UTF-8') ?>"
                            />
                        </td>
                    </tr>

                    <!-- 種別 -->
                    <tr>
                        <td>
                            <?= IncomeCommon::PAGE_ITEM_TYPE ?>
                        </td>
                        <td>
                            <select id=<?= IncomeCommon::HTML_NAME_TYPE ?>" class="common-combobox" name="<?= IncomeCommon::HTML_NAME_TYPE ?>" value="<?= htmlspecialchars($record[IncomeCommon::HTML_NAME_TYPE], ENT_QUOTES, 'UTF-8') ?>">
                                <option value="<?= IncomeType::Unknown->value ?>" <?= $record['type'] == 0 ? 'selected' : '' ?>><?= IncomeType::Unknown->label() ?></option>
                                <option value="<?= IncomeType::MonthlySalary->value ?>" <?= $record['type'] == 1 ? 'selected' : '' ?>><?= IncomeType::MonthlySalary->label() ?></option>
                                <option value="<?= IncomeType::Bonus->value ?>" <?= $record['type'] == 2 ? 'selected' : '' ?>><?= IncomeType::Bonus->label() ?></option>
                            </select>
                        </td>
                    </tr>

                    <!-- 総支給額 -->
                    <tr>
                        <td>
                            <?= IncomeCommon::PAGE_ITEM_TOTAL_AMOUNT_PAID ?>
                        </td>
                        <td>
                            <input 
                                type="number" 
                                id="<?= IncomeCommon::HTML_NAME_TOTAL_AMOUNT_PAID ?>" 
                                class="common-textbox" 
                                name="<?= IncomeCommon::HTML_NAME_TOTAL_AMOUNT_PAID ?>" 
                                value="<?= htmlspecialchars($record[IncomeCommon::HTML_NAME_TOTAL_AMOUNT_PAID], ENT_QUOTES, 'UTF-8') ?>" 
                                max="<?= Constants::INPUT_INT_MAX ?>" min="<?= Constants::INPUT_INT_MIN ?>"
                            />
                        </td>
                    </tr>

                    <!-- 所得税 -->
                    <tr>
                        <td>
                            <?= IncomeCommon::PAGE_ITEM_INCOME_TAX ?>
                        </td>
                        <td>
                            <input 
                                type="number" 
                                id="<?= IncomeCommon::HTML_NAME_INCOME_TAX ?>" 
                                class="common-textbox" 
                                name="<?= IncomeCommon::HTML_NAME_INCOME_TAX ?>" 
                                value="<?= htmlspecialchars($record[IncomeCommon::HTML_NAME_INCOME_TAX], ENT_QUOTES, 'UTF-8') ?>" 
                                max="<?= Constants::INPUT_INT_MAX ?>" 
                                min="<?= Constants::INPUT_INT_MIN ?>"
                            />
                        </td>
                    </tr>

                    <!-- 住民税 -->
                    <tr>
                        <td>
                            <?= IncomeCommon::PAGE_ITEM_RESIDENT_TAX ?>
                        </td>
                        <td>
                            <input 
                                type="number" 
                                id="<?= IncomeCommon::HTML_NAME_RESIDENT_TAX ?>" 
                                class="common-textbox" 
                                name="<?= IncomeCommon::HTML_NAME_RESIDENT_TAX ?>" 
                                value="<?= htmlspecialchars($record[IncomeCommon::HTML_NAME_RESIDENT_TAX], ENT_QUOTES, 'UTF-8') ?>" 
                                max="<?= Constants::INPUT_INT_MAX ?>" 
                                min="<?= Constants::INPUT_INT_MIN ?>"
                            />
                        </td>
                    </tr>

                    <!-- 社会保険料 -->
                    <tr>
                        <td>
                            <?= IncomeCommon::PAGE_ITEM_SOCIAL_INSURANCE_PREMIUMS ?>
                        </td>
                        <td>
                            <input 
                                type="number" 
                                id="<?= IncomeCommon::HTML_NAME_SOCIAL_INSURANCE_PREMIUMS ?>" 
                                class="common-textbox" 
                                name="<?= IncomeCommon::HTML_NAME_SOCIAL_INSURANCE_PREMIUMS ?>" 
                                value="<?= htmlspecialchars($record[IncomeCommon::HTML_NAME_SOCIAL_INSURANCE_PREMIUMS], ENT_QUOTES, 'UTF-8') ?>" 
                                max="<?= Constants::INPUT_INT_MAX ?>" 
                                min="<?= Constants::INPUT_INT_MIN ?>"/>
                        </td>
                    </tr>

                    <!-- その他 -->
                    <tr>
                        <td>
                            <?= IncomeCommon::PAGE_ITEM_OTHER ?>
                        </td>
                        <td>
                            <input 
                                type="number" 
                                id="<?= IncomeCommon::HTML_NAME_OTHER ?>" 
                                class="common-textbox" 
                                name="<?= IncomeCommon::HTML_NAME_OTHER ?>" 
                                value="<?= htmlspecialchars($record[IncomeCommon::HTML_NAME_OTHER], ENT_QUOTES, 'UTF-8') ?>" 
                                max="<?= Constants::INPUT_INT_MAX ?>" 
                                min="<?= Constants::INPUT_INT_MIN ?>"
                            />
                        </td>
                    </tr>

                    <!-- 支払者 -->
                    <tr>
                        <td>
                            <?= IncomeCommon::PAGE_ITEM_PAYER ?>
                        </td>
                        <td>
                            <input 
                                type="text" 
                                id="<?= IncomeCommon::HTML_NAME_PAYER ?>" 
                                class="common-textbox common-width-name" 
                                name="<?= IncomeCommon::HTML_NAME_PAYER ?>" 
                                value="<?= htmlspecialchars($record[IncomeCommon::HTML_NAME_PAYER], ENT_QUOTES, 'UTF-8') ?>" 
                                maxlength="<?= Constants::INPUT_NAME_MAX_LENGTH ?>"
                            />
                        </td>
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
            <input 
                type="hidden" 
                id="<?= Constants::HTML_NAME_ID ?>" 
                name="<?= Constants::HTML_NAME_ID ?>" 
                value="<?= htmlspecialchars($record[Constants::HTML_NAME_ID], ENT_QUOTES, 'UTF-8') ?>"
            />
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