<?php

require_once(__DIR__ . '/lastbullet_battle_record_common.php');
require_once(__DIR__ . '/../lastbullet_memories/lastbullet_memoria_common.php');

$page_title_text = LastbulletBattleRecordCommon::PAGE_TITLE_ADD;
$common_link_text = LastbulletBattleRecordCommon::PAGE_TITLE_LIST;
$common_link_href = LastbulletBattleRecordCommon::HREF_LIST;

$themes = LastbulletBattleRecordCommon::list_themes();
$results = LastbulletBattleRecordCommon::list_results();

?>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="Copyright 2021 rimusophie">
    <title><?= LastbulletBattleRecordCommon::PAGE_TITLE_ADD ?></title>
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

        <form action="<?= LastbulletBattleRecordCommon::HREF_CREATE ?>" method="post" class="mt-3">
        <div class="row mt-3">
            <div class="col">
            <table class="common-table">

                <!-- 対戦日 -->
                <tr>
                    <td>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_BATTLE_DATE ?>
                    </td>
                    <td>
                        <input 
                            type="date" 
                            id="<?= LastbulletBattleRecordCommon::HTML_NAME_BATTLE_DATE ?>" 
                            class="common-textbox common-width-name" 
                            name="<?= LastbulletBattleRecordCommon::HTML_NAME_BATTLE_DATE ?>" 
                        />
                    </td>
                </tr>

                <!-- 結果 -->
                <tr>
                    <td>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_RESULT ?>
                    </td>
                    <td>
                        <select id="<?= LastbulletBattleRecordCommon::HTML_NAME_RESULT ?>" class="common-combobox" name="<?= LastbulletBattleRecordCommon::HTML_NAME_RESULT ?>">
<?php foreach($results as $result): ?>
                            <option value="<?= $result[Constants::HTML_NAME_VALUE] ?>"><?= $result[Constants::HTML_NAME_LABEL] ?></option>
<?php endforeach; ?>
                        </select>
                    </td>
                </tr>

                <!-- テーマ -->
                <tr>
                    <td>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_THEME_TYPE ?>
                    </td>
                    <td>
                        <select id="<?= LastbulletBattleRecordCommon::HTML_NAME_THEME_TYPE ?>" class="common-combobox" name="<?= LastbulletBattleRecordCommon::HTML_NAME_THEME_TYPE ?>">
<?php foreach($themes as $theme): ?>
                            <option value="<?= $theme[Constants::HTML_NAME_VALUE] ?>"><?= $theme[Constants::HTML_NAME_LABEL] ?></option>
<?php endforeach; ?>
                        </select>
                    </td>
                </tr>

<?php for ($i = 1; $i <= 2; $i++): ?>
                <!-- レアスキルリリィ -->
                <tr>
                    <td>
                        <?= constant("LastbulletBattleRecordCommon::PAGE_ITEM_RARE_SKILL_LILY_{$i}") ?>
                    </td>
                    <td>
                        <input 
                            type="text" 
                            id="<?= constant("LastbulletBattleRecordCommon::HTML_NAME_RARE_SKILL_LILY_{$i}") ?>" 
                            class="common-textbox common-width-name" 
                            name="<?= constant("LastbulletBattleRecordCommon::HTML_NAME_RARE_SKILL_LILY_{$i}") ?>" 
                            maxlength="<?= Constants::INPUT_NAME_MAX_LENGTH ?>"
                        />
                    </td>
                </tr>

                <!-- レアスキル -->
                <tr>
                    <td>
                        <?= constant("LastbulletBattleRecordCommon::PAGE_ITEM_RARE_SKILL_{$i}") ?>
                    </td>
                    <td>
                        <input 
                            type="text" 
                            id="<?= constant("LastbulletBattleRecordCommon::HTML_NAME_RARE_SKILL_{$i}") ?>" 
                            class="common-textbox common-width-name" 
                            name="<?= constant("LastbulletBattleRecordCommon::HTML_NAME_RARE_SKILL_{$i}") ?>" 
                            maxlength="<?= Constants::INPUT_NAME_MAX_LENGTH ?>"
                        />
                    </td>
                </tr>
<?php endfor; ?>

                <!-- 備考 -->
                <tr>
                    <td>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_REMARKS ?>
                    </td>
                    <td>
                        <textarea id="<?= LastbulletBattleRecordCommon::HTML_NAME_REMARKS ?>" class="common-textbox common-width-name" name="<?= LastbulletBattleRecordCommon::HTML_NAME_REMARKS ?>" rows="<?= LastbulletBattleRecordCommon::ROWS_TEXTAREA_REMARKS ?>" cols="<?= LastbulletBattleRecordCommon::COLS_TEXTAREA_REMARKS ?>"></textarea>
                    </td>
                </tr>

                <!-- 自レギオン名 -->
                <tr>
                    <td>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_FRIEND_LEGION_NAME ?>
                    </td>
                    <td>
                        <input 
                            type="text" 
                            id="<?= LastbulletBattleRecordCommon::HTML_NAME_FRIEND_LEGION_NAME ?>" 
                            class="common-textbox common-width-name" 
                            name="<?= LastbulletBattleRecordCommon::HTML_NAME_FRIEND_LEGION_NAME ?>" 
                            maxlength="<?= Constants::INPUT_NAME_MAX_LENGTH ?>"
                        />
                    </td>
                </tr>

                <!-- 味方メンバー情報 -->
<?php for ($i = 1; $i <= 9; $i++): ?>
                <tr>
                    <td>
                        <?= constant("LastbulletBattleRecordCommon::PAGE_ITEM_FRIEND_INFO_{$i}") ?>
                    </td>

                    <!-- 名前 -->
                    <td>
                        <input 
                            type="text" 
                            id="<?= constant("LastbulletBattleRecordCommon::HTML_NAME_FRIEND_INFO_{$i}_NAME") ?>" 
                            class="common-textbox common-width-name" 
                            name="<?= constant("LastbulletBattleRecordCommon::HTML_NAME_FRIEND_INFO_{$i}_NAME") ?>" 
                            maxlength="<?= Constants::INPUT_NAME_MAX_LENGTH ?>"
                        />
                    </td>

                    <!-- 戦力 -->
                    <td>
                        <input 
                            type="number" 
                            id="<?= constant("LastbulletBattleRecordCommon::HTML_NAME_FRIEND_INFO_{$i}_BATTLE_POWER") ?>" 
                            class="common-textbox common-width-name" 
                            name="<?= constant("LastbulletBattleRecordCommon::HTML_NAME_FRIEND_INFO_{$i}_BATTLE_POWER") ?>" 
                            max="<?= Constants::INPUT_INT_MAX ?>" 
                            min="<?= Constants::INPUT_INT_MIN ?>"
                        />
                    </td>

                    <!-- HP -->
                    <td>
                        <input 
                            type="number" 
                            id="<?= constant("LastbulletBattleRecordCommon::HTML_NAME_FRIEND_INFO_{$i}_HP") ?>" 
                            class="common-textbox common-width-name" 
                            name="<?= constant("LastbulletBattleRecordCommon::HTML_NAME_FRIEND_INFO_{$i}_HP") ?>" 
                            max="<?= Constants::INPUT_INT_MAX ?>" 
                            min="<?= Constants::INPUT_INT_MIN ?>"
                        />
                    </td>
                </tr>
<?php endfor; ?>

                <!-- 相手レギオン名 -->
                <tr>
                    <td>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_ENEMY_LEGION_NAME ?>
                    </td>
                    <td>
                        <input 
                            type="text" 
                            id="<?= LastbulletBattleRecordCommon::HTML_NAME_ENEMY_LEGION_NAME ?>" 
                            class="common-textbox common-width-name" 
                            name="<?= LastbulletBattleRecordCommon::HTML_NAME_ENEMY_LEGION_NAME ?>" 
                            maxlength="<?= Constants::INPUT_NAME_MAX_LENGTH ?>"
                        />
                    </td>
                </tr>

                <!-- 相手メンバー情報 -->
<?php for ($i = 1; $i <= 9; $i++): ?>
                <tr>
                    <td>
                        <?= constant("LastbulletBattleRecordCommon::PAGE_ITEM_ENEMY_INFO_$i") ?>
                    </td>

                    <!-- 名前 -->
                    <td>
                        <input 
                            type="text" 
                            id="<?= constant("LastbulletBattleRecordCommon::HTML_NAME_ENEMY_INFO_{$i}_NAME") ?>" 
                            class="common-textbox common-width-name" 
                            name="<?= constant("LastbulletBattleRecordCommon::HTML_NAME_ENEMY_INFO_{$i}_NAME") ?>" 
                            maxlength="<?= Constants::INPUT_NAME_MAX_LENGTH ?>"
                        />
                    </td>

                    <!-- 戦力 -->
                    <td>
                        <input 
                            type="number" 
                            id="<?= constant("LastbulletBattleRecordCommon::HTML_NAME_ENEMY_INFO_{$i}_BATTLE_POWER") ?>" 
                            class="common-textbox common-width-name" 
                            name="<?= constant("LastbulletBattleRecordCommon::HTML_NAME_ENEMY_INFO_{$i}_BATTLE_POWER") ?>" 
                            max="<?= Constants::INPUT_INT_MAX ?>" 
                            min="<?= Constants::INPUT_INT_MIN ?>"
                        />
                    </td>

                    <!-- HP -->
                    <td>
                        <input 
                            type="number" 
                            id="<?= constant("LastbulletBattleRecordCommon::HTML_NAME_ENEMY_INFO_{$i}_HP") ?>" 
                            class="common-textbox common-width-name" 
                            name="<?= constant("LastbulletBattleRecordCommon::HTML_NAME_ENEMY_INFO_{$i}_HP") ?>" 
                            max="<?= Constants::INPUT_INT_MAX ?>" 
                            min="<?= Constants::INPUT_INT_MIN ?>"
                        />
                    </td>
                </tr>
<?php endfor; ?>

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