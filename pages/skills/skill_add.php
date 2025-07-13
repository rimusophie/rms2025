<?php

require_once(__DIR__ . '/skill_common.php');

$page_title_text = SkillCommon::PAGE_TITLE_ADD;
$common_link_text = SkillCommon::PAGE_TITLE_LIST;
$common_link_href = SkillCommon::HREF_LIST;
?>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="Copyright 2021 rimusophie">
    <title><?= SkillCommon::PAGE_TITLE_ADD ?></title>
    <!--<link rel="icon" href="/assets/img/favicon.ico">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/common.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!--<script src="/assets/js/common.js"></script>-->
</head>

<body class="common-body">
    <div class="container common-container">
<?php 
include(__DIR__ . '/../../includes/header.php');
include(__DIR__ . '/../../includes/page_title.php');
?>

        <form action="<?= SkillCommon::HREF_CREATE ?>" method="post" class="mt-3">
        <div class="row mt-3">
            <div class="col">
            <table class="common-table">

                <tr>
                    <td><?= SkillCommon::PAGE_ITEM_NAME ?></td>
                    <td><input type="text" id="name" class="common-textbox common-width-name" name="name" maxlength="<?= Constants::INPUT_NAME_MAX_LENGTH ?>"/></td>
                </tr>

                <tr>
                    <td><?= SkillCommon::PAGE_ITEM_SORT_NO ?></td>
                    <td><input type="number" id="sort_no" class="common-textbox" name="sort_no" max="<?= Constants::INPUT_INT_MAX ?>" min="<?= Constants::INPUT_INT_MIN ?>"/></td>
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
include(__DIR__ . '/../../includes/common_link.php');
include(__DIR__ . '/../../includes/footer.php');
?>
    </div>
</body>
</html>