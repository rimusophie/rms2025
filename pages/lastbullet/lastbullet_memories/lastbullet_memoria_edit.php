<?php

require_once(__DIR__ . '/lastbullet_memoria_common.php');

$page_title_text = LastbulletMemoriaCommon::PAGE_TITLE_EDIT;
$common_link_text = LastbulletMemoriaCommon::PAGE_TITLE_LIST;
$common_link_href = LastbulletMemoriaCommon::HREF_LIST;
?>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="Copyright 2021 rimusophie">
    <title><?= LastbulletMemoriaCommon::PAGE_TITLE_EDIT ?></title>
    <!--<link rel="icon" href="/assets/img/favicon.ico">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/common.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!--<script src="/assets/js/common.js"></script>-->
</head>

<?php

$record = [];

try {
    $id = filter_input(INPUT_GET, Constants::HTML_NAME_ID, FILTER_VALIDATE_INT);
    $record = LastbulletMemoriaCommon::get($id);
} catch (PDOException $e) {
    echo sprintf("%s\n%s", Constants::MESSAGE_ERROR, $e->getMessage());
    exit;
}
?>

<body class="common-body">
    <div class="container common-container">
<?php 
include(__DIR__ . "/../../../includes/header.php");
include(__DIR__ . '/../../../includes/page_title.php');
?>

        <form action="<?= LastbulletMemoriaCommon::HREF_UPDATE ?>" method="post" class="mt-3">
            <input 
                type="hidden" 
                id="<?= Constants::HTML_NAME_ID ?>" 
                name="<?= Constants::HTML_NAME_ID ?>" 
                value="<?= htmlspecialchars($record[Constants::HTML_NAME_ID], ENT_QUOTES, 'UTF-8') ?>"
            />
            <div class="row mt-3">
                <div class="col">
                <table class="common-table">

                    <!-- 名称 -->
                    <tr>
                        <td>
                            <?= LastbulletMemoriaCommon::PAGE_ITEM_NAME ?>
                        </td>
                        <td>
                            <input 
                                type="text" 
                                id="name" 
                                class="common-textbox common-width-name" 
                                name="name" 
                                value="<?= htmlspecialchars($record['l_name'], ENT_QUOTES, 'UTF-8') ?>" 
                                maxlength="<?= Constants::INPUT_NAME_MAX_LENGTH ?>"
                            />
                        </td>
                    </tr>

                    <!-- 属性 -->
                    <tr>
                        <td>
                            <?= LastbulletMemoriaCommon::PAGE_ITEM_ATTRIBUTE_TYPE ?>
                        </td>
                        <td>
                            <select id="attribute_type" class="common-combobox" name="attribute_type" value="<?= htmlspecialchars($record['l_attribute_type'], ENT_QUOTES, 'UTF-8') ?>">
                                <option value="<?= LastbulletAttributeType::Unknown->value ?>" <?= $record['l_attribute_type'] == 0 ? 'selected' : '' ?>><?= LastbulletAttributeType::Unknown->label() ?></option>
                                <option value="<?= LastbulletAttributeType::Fire->value ?>" <?= $record['l_attribute_type'] == 1 ? 'selected' : '' ?>><?= LastbulletAttributeType::Fire->label() ?></option>
                                <option value="<?= LastbulletAttributeType::Water->value ?>" <?= $record['l_attribute_type'] == 2 ? 'selected' : '' ?>><?= LastbulletAttributeType::Water->label() ?></option>
                                <option value="<?= LastbulletAttributeType::Wind->value ?>" <?= $record['l_attribute_type'] == 3 ? 'selected' : '' ?>><?= LastbulletAttributeType::Wind->label() ?></option>
                                <option value="<?= LastbulletAttributeType::Light->value ?>" <?= $record['l_attribute_type'] == 4 ? 'selected' : '' ?>><?= LastbulletAttributeType::Light->label() ?></option>
                                <option value="<?= LastbulletAttributeType::Dark->value ?>" <?= $record['l_attribute_type'] == 5 ? 'selected' : '' ?>><?= LastbulletAttributeType::Dark->label() ?></option>
                            </select>
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

        <form action="<?= LastbulletMemoriaCommon::HREF_DELETE ?>" method="post">
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
include(__DIR__ . '/../../../includes/common_link.php');
include(__DIR__ . '/../../../includes/footer.php');
?>
    </div>
</body>
</html>