<?php

require_once(__DIR__ . '/lastbullet_memoria_common.php');

$page_title_text = LastbulletMemoriaCommon::PAGE_TITLE_ADD;
$common_link_text = LastbulletMemoriaCommon::PAGE_TITLE_LIST;
$common_link_href = LastbulletMemoriaCommon::HREF_LIST;
?>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="Copyright 2021 rimusophie">
    <title><?= LastbulletMemoriaCommon::PAGE_TITLE_ADD ?></title>
    <!--<link rel="icon" href="/assets/img/favicon.ico">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/common.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!--<script src="/assets/js/common.js"></script>-->
</head>

<body class="common-body">
    <div class="container common-container">
<?php 
include(__DIR__ . '/../../../includes/header.php');
include(__DIR__ . '/../../../includes/page_title.php');
?>

        <form action="<?= LastbulletMemoriaCommon::HREF_CREATE ?>" method="post" class="mt-3">
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
                            maxlength="<?= Constants::INPUT_NAME_MAX_LENGTH ?>"
                        />
                    </td>
                </tr>

                <!-- 属性 -->
                <tr>
                    <td><?= LastbulletMemoriaCommon::PAGE_ITEM_ATTRIBUTE_TYPE ?></td>
                    <td>
                        <select id="attribute_type" class="common-combobox" name="attribute_type">
                            <option value="<?= LastbulletAttributeType::Unknown->value ?>"><?= LastbulletAttributeType::Unknown->label() ?></option>
                            <option value="<?= LastbulletAttributeType::Fire->value ?>"><?= LastbulletAttributeType::Fire->label() ?></option>
                            <option value="<?= LastbulletAttributeType::Water->value ?>"><?= LastbulletAttributeType::Water->label() ?></option>
                            <option value="<?= LastbulletAttributeType::Wind->value ?>"><?= LastbulletAttributeType::Wind->label() ?></option>
                            <option value="<?= LastbulletAttributeType::Light->value ?>"><?= LastbulletAttributeType::Light->label() ?></option>
                            <option value="<?= LastbulletAttributeType::Dark->value ?>"><?= LastbulletAttributeType::Dark->label() ?></option>
                        </select>
                    </td>
                </tr>

            </table>
            
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-1 text-center">
                <button type="submit" class="w-100 h-100 common-button align-middle"><?= Constants::PAGE_CREATE ?></button>
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