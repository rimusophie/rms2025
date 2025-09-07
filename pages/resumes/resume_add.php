<?php

require_once(__DIR__ . '/resume_common.php');
require_once(__DIR__ . '/../../utils/db.php');
require_once(__DIR__ . '/../skills/skill_common.php');

$page_title_text = ResumeCommon::PAGE_TITLE_ADD;
$common_link_text = ResumeCommon::PAGE_TITLE_LIST;
$common_link_href = ResumeCommon::HREF_LIST;

// スキル一覧を取得
$skills = SkillCommon::getSkills();

?>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="Copyright 2021 rimusophie">
    <title><?= ResumeCommon::PAGE_TITLE_ADD ?></title>
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

        <form action="<?= ResumeCommon::HREF_CREATE ?>" method="post" class="mt-3">
        <div class="row mt-3">
            <div class="col">
            <table class="common-table">

                <!-- 案件名 -->
                <tr>
                    <td>
                        <?= ResumeCommon::PAGE_ITEM_TITLE ?>
                    </td>
                    <td>
                        <input 
                            type="text" 
                            id="title" 
                            class="common-textbox common-width-name" 
                            name="title" 
                            maxlength="<?= Constants::INPUT_NAME_MAX_LENGTH ?>"
                        />
                    </td>
                </tr>

                <!-- 概要 -->
                <tr>
                    <td>
                        <?= ResumeCommon::PAGE_ITEM_SUMMARY ?>
                    </td>
                    <td>
                        <textarea id="summary" class="common-textbox common-width-name" name="summary" rows="<?= ResumeCommon::ROWS_TEXTAREA_SUMMARY ?>" cols="<?= ResumeCommon::COLS_TEXTAREA_SUMMARY ?>"></textarea>
                    </td>
                </tr>

                <!-- 開始日 -->
                <tr>
                    <td>
                        <?= ResumeCommon::PAGE_ITEM_START_DATE ?>
                    </td>
                    <td>
                        <input 
                            type="date" 
                            id="start_date" 
                            class="common-textbox" 
                            name="start_date"
                        />
                    </td>
                </tr>

                <!-- 終了日 -->
                <tr>
                    <td>
                        <?= ResumeCommon::PAGE_ITEM_END_DATE ?>
                    </td>
                    <td>
                        <input 
                            type="date" 
                            id="end_date" 
                            class="common-textbox" 
                            name="end_date"
                        />
                    </td>
                </tr>

                <!-- スキル -->
                <tr>
                    <td>
                        <?= ResumeCommon::PAGE_ITEM_SKILLS ?>
                    </td>
                    <td>
                        <select id="skills" class="common-combobox common-height-combobox" name="skills[]" multiple>
<?php foreach($skills as $skill): ?>
                            <option value="<?= htmlspecialchars($skill['s_id'], ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($skill['s_name'], ENT_QUOTES, 'UTF-8') ?></option>
<?php endforeach; ?>
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
include(__DIR__ . '/../../includes/common_link.php');
include(__DIR__ . '/../../includes/footer.php');
?>
    </div>
</body>
</html>