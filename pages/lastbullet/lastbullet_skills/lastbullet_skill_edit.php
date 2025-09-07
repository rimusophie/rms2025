<?php

require_once(__DIR__ . '/lastbullet_skill_common.php');

$page_title_text = LastbulletSkillCommon::PAGE_TITLE_EDIT;
$common_link_text = LastbulletSkillCommon::PAGE_TITLE_LIST;
$common_link_href = LastbulletSkillCommon::HREF_LIST;
?>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="Copyright 2021 rimusophie">
    <title><?= LastbulletSkillCommon::PAGE_TITLE_EDIT ?></title>
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
    $record = LastbulletSkillCommon::get($id);
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

        <form action="<?= LastbulletSkillCommon::HREF_UPDATE ?>" method="post" class="mt-3">
            <input type="hidden" id="id" name="id" value="<?= htmlspecialchars($record['l_id'], ENT_QUOTES, 'UTF-8') ?>"/>
            <div class="row mt-3">
                <div class="col">
                <table class="common-table">

                    <!-- 名称 -->
                    <tr>
                        <td>
                            <?= LastbulletSkillCommon::PAGE_ITEM_NAME ?>
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

                    <!-- スキル概要 -->
                    <tr>
                        <td>
                            <?= LastbulletSkillCommon::PAGE_ITEM_SUMMARY ?>
                        </td>
                        <td>
                            <input 
                                type="text" 
                                id="summary" 
                                class="common-textbox common-width-name" 
                                name="summary" 
                                value="<?= htmlspecialchars($record['l_summary'], ENT_QUOTES, 'UTF-8') ?>" 
                                maxlength="<?= Constants::INPUT_SHORT_SUMMARY_MAX_LENGTH ?>"
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

        <form action="<?= LastbulletSkillCommon::HREF_DELETE ?>" method="post">
            <input 
                type="hidden" 
                id="id" 
                name="id" 
                value="<?= htmlspecialchars($record['l_id'], ENT_QUOTES, 'UTF-8') ?>"
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