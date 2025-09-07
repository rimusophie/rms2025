<?php

require_once(__DIR__ . '/lastbullet_battle_record_common.php');
require_once(__DIR__ . '/../lastbullet_memories/lastbullet_memoria_common.php');

$page_title_text = LastbulletBattleRecordCommon::PAGE_TITLE_EDIT;
$common_link_text = LastbulletBattleRecordCommon::PAGE_TITLE_LIST;
$common_link_href = LastbulletBattleRecordCommon::HREF_LIST;

$themes = LastbulletBattleRecordCommon::list_themes();
$results = LastbulletBattleRecordCommon::list_results();

$record = null;
$friend_lilys = [];
$enemy_lilys = [];

?>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="copyright" content="Copyright 2021 rimusophie">
    <title><?= LastbulletBattleRecordCommon::PAGE_TITLE_EDIT ?></title>
    <!--<link rel="icon" href="/assets/img/favicon.ico">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../assets/css/common.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!--<script src="/assets/js/common.js"></script>-->
</head>

<?php

$record = [];
$friend_lilys = [];
$enemy_lilys = [];

try {
    $id = filter_input(INPUT_GET, Constants::HTML_NAME_ID, FILTER_VALIDATE_INT);
    $record = LastbulletBattleRecordCommon::get($id);

    $friend_lilys = array_fill(0, LastbulletBattleRecordCommon::COUNT_LEGION_MEMBERS, null);
    $enemy_lilys = array_fill(0, LastbulletBattleRecordCommon::COUNT_LEGION_MEMBERS, null);

    for ($i = 0; $i < count($friend_lilys); $i++) {
        $friend_lilys[$i] = new LastbulletLily($record[LastbulletBattleRecordCommon::HTML_NAME_FRIEND_INFOS[$i]]);
    }
    for ($i = 0; $i < count($enemy_lilys); $i++) {
        $enemy_lilys[$i] = new LastbulletLily($record[LastbulletBattleRecordCommon::HTML_NAME_ENEMY_INFOS[$i]]);
    }

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

        <form action="<?= LastbulletBattleRecordCommon::HREF_UPDATE ?>" method="post" class="mt-3">
            <input 
                type="hidden" 
                id="<?= Constants::HTML_NAME_ID ?>" 
                name="<?= Constants::HTML_NAME_ID ?>" 
                value="<?= htmlspecialchars($record[Constants::HTML_NAME_ID], ENT_QUOTES, 'UTF-8') ?>"
            />
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
                                value="<?= htmlspecialchars($record[LastbulletBattleRecordCommon::HTML_NAME_BATTLE_DATE], ENT_QUOTES, 'UTF-8') ?>" 
                            />
                        </td>
                    </tr>

                    <!-- 結果 -->
                    <tr>
                        <td>
                            <?= LastbulletBattleRecordCommon::PAGE_ITEM_RESULT ?>
                        </td>
                        <td>
                            <select id="<?= LastbulletBattleRecordCommon::HTML_NAME_RESULT ?>" class="common-combobox" name="<?= LastbulletBattleRecordCommon::HTML_NAME_RESULT ?>" value="<?= htmlspecialchars($record[LastbulletBattleRecordCommon::HTML_NAME_RESULT], ENT_QUOTES, 'UTF-8') ?>">
<?php foreach($results as $result): ?>
                            <option value="<?= $result[Constants::HTML_NAME_VALUE] ?>" <?= $record[LastbulletBattleRecordCommon::HTML_NAME_RESULT] == $result[Constants::HTML_NAME_VALUE] ? 'selected' : '' ?>><?= $result[Constants::HTML_NAME_LABEL] ?></option>
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
                            <select id="<?= LastbulletBattleRecordCommon::HTML_NAME_THEME_TYPE ?>" class="common-combobox" name="<?= LastbulletBattleRecordCommon::HTML_NAME_THEME_TYPE ?>" value="<?= htmlspecialchars($record[LastbulletBattleRecordCommon::HTML_NAME_THEME_TYPE], ENT_QUOTES, 'UTF-8') ?>">
<?php foreach($themes as $theme): ?>
                            <option value="<?= $theme[Constants::HTML_NAME_VALUE] ?>" <?= $record[LastbulletBattleRecordCommon::HTML_NAME_THEME_TYPE] == $theme[Constants::HTML_NAME_VALUE] ? 'selected' : '' ?>><?= $theme[Constants::HTML_NAME_LABEL] ?></option>
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
                                value="<?= htmlspecialchars($record[constant("LastbulletBattleRecordCommon::HTML_NAME_RARE_SKILL_LILY_{$i}")], ENT_QUOTES, 'UTF-8') ?>" 
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
                                value="<?= htmlspecialchars($record[constant("LastbulletBattleRecordCommon::HTML_NAME_RARE_SKILL_{$i}")], ENT_QUOTES, 'UTF-8') ?>" 
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
                            <textarea id="<?= LastbulletBattleRecordCommon::HTML_NAME_REMARKS ?>" class="common-textbox common-width-name" name="<?= LastbulletBattleRecordCommon::HTML_NAME_REMARKS ?>" rows="<?= LastbulletBattleRecordCommon::ROWS_TEXTAREA_REMARKS ?>" cols="<?= LastbulletBattleRecordCommon::COLS_TEXTAREA_REMARKS ?>"><?= htmlspecialchars($record[LastbulletBattleRecordCommon::HTML_NAME_REMARKS], ENT_QUOTES, 'UTF-8') ?></textarea>
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
                                value="<?= htmlspecialchars($record[LastbulletBattleRecordCommon::HTML_NAME_FRIEND_LEGION_NAME], ENT_QUOTES, 'UTF-8') ?>" 
                                maxlength="<?= Constants::INPUT_NAME_MAX_LENGTH ?>"
                            />
                        </td>
                    </tr>

                <!-- 味方メンバー情報 -->
<?php for ($i = 1; $i <= 9; $i++): ?>
                    <tr>
                        <td>
                            <?= constant("LastbulletBattleRecordCommon::PAGE_ITEM_FRIEND_INFO_$i") ?>
                        </td>
                        <!-- 名前 -->
                        <td>
                            <input 
                                type="text" 
                                id="<?= constant("LastbulletBattleRecordCommon::HTML_NAME_FRIEND_INFO_{$i}_NAME") ?>" 
                                class="common-textbox common-width-name" 
                                name="<?= constant("LastbulletBattleRecordCommon::HTML_NAME_FRIEND_INFO_{$i}_NAME") ?>" 
                                value="<?= isset($friend_lilys[$i - 1]) ? htmlspecialchars($friend_lilys[$i - 1]->name, ENT_QUOTES, 'UTF-8') : '' ?>" 
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
                                value="<?= isset($friend_lilys[$i - 1]) ? htmlspecialchars($friend_lilys[$i - 1]->battle_power, ENT_QUOTES, 'UTF-8') : '' ?>" 
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
                                value="<?= isset($friend_lilys[$i - 1]) ? htmlspecialchars($friend_lilys[$i - 1]->hp, ENT_QUOTES, 'UTF-8') : '' ?>" 
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
                                value="<?= htmlspecialchars($record[LastbulletBattleRecordCommon::HTML_NAME_ENEMY_LEGION_NAME], ENT_QUOTES, 'UTF-8') ?>" 
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
                                value="<?= isset($enemy_lilys[$i - 1]) ? htmlspecialchars($enemy_lilys[$i - 1]->name, ENT_QUOTES, 'UTF-8') : '' ?>" 
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
                                value="<?= isset($enemy_lilys[$i - 1]) ? htmlspecialchars($enemy_lilys[$i - 1]->battle_power, ENT_QUOTES, 'UTF-8') : '' ?>" 
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
                                value="<?= isset($enemy_lilys[$i - 1]) ? htmlspecialchars($enemy_lilys[$i - 1]->hp, ENT_QUOTES, 'UTF-8') : '' ?>" 
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
                    <button type="submit" class="w-100 h-100 common-button align-middle"><?= Constants::PAGE_UPDATE ?></button>
                </div>
            </div>
        </form>

        <form action="<?= LastbulletBattleRecordCommon::HREF_DELETE ?>" method="post">
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