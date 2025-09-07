<?php

require_once(__DIR__ . '/lastbullet_memoria_common.php');

$page_title_text = LastbulletMemoriaCommon::PAGE_TITLE_LIST;
$common_link_text = LastbulletMemoriaCommon::PAGE_TITLE_ADD;
$common_link_href = LastbulletMemoriaCommon::HREF_ADD;

$id_to_type = LastbulletAttributeType::toSelectOptions();

$records = [];

try {
    $records = IncomeCommon::list();
} catch (Exception $e) {
    echo sprintf("%s\n%s", Constants::MESSAGE_ERROR, $e->getMessage());
    exit;
}

?>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="Copyright 2021 rimusophie">
    <title><?= LastbulletMemoriaCommon::PAGE_TITLE_LIST ?></title>
    <!--<link rel="icon" href="/assets/img/favicon.ico">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/common.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!--<script src="/assets/js/common.js"></script>-->
</head>

<body class="common-body">
    <div class="container common-container">
<?php 
include(__DIR__ . "/../../../includes/header.php");
include(__DIR__ . '/../../../includes/page_title.php');
include(__DIR__ . '/../../../includes/common_link.php');
?>

        <div class="row mt-3">
            <div class="col">
            <table class="common-table">
                <tr>
                    <!-- 名称 -->
                    <th>
                        <?= LastbulletMemoriaCommon::PAGE_ITEM_NAME ?>
                    </th>

                    <!-- 属性 -->
                    <th>
                        <?= LastbulletMemoriaCommon::PAGE_ITEM_ATTRIBUTE_TYPE ?>
                    </th>

                    <!-- 操作 -->
                    <th>
                        <?= Constants::PAGE_OPERATION ?>
                    </th>

                </tr>
<?php foreach($result as $row): ?>
                <tr>
                    <!-- 名称 -->
                    <td>
                        <?= htmlspecialchars($row['l_name'], ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <!-- 属性 -->
                    <td>
                        <?= htmlspecialchars($id_to_type[$row['l_attribute_type']], ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <!-- 操作 -->
                    <td>
                        <a href="<?= LastbulletMemoriaCommon::HREF_EDIT ?>?id=<?= urlencode($row[Constants::HTML_NAME_ID]) ?>" class="common-link"><?= Constants::PAGE_EDIT ?></a>
                    </td>

                </tr>
<?php endforeach; ?>

            </table>
            </div>
        </div>
<?php 
include(__DIR__ . '/../../../includes/footer.php');
?>
    </div>
</body>
</html>