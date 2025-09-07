<?php

require_once(__DIR__ . '/lastbullet_battle_record_common.php');
require_once(__DIR__ . '/../lastbullet_memories/lastbullet_memoria_common.php');

$page_title_text = LastbulletBattleRecordCommon::PAGE_TITLE_LIST;
$common_link_text = LastbulletBattleRecordCommon::PAGE_TITLE_ADD;
$common_link_href = LastbulletBattleRecordCommon::HREF_ADD;

$records = [];
$themes = [];
$results = [];

try {
    $records = LastbulletBattleRecordCommon::list();
    $themes = LastbulletBattleRecordCommon::list_themes();
    $results = LastbulletBattleRecordCommon::list_results();

    $map_themes = array_column($themes, Constants::HTML_NAME_LABEL, Constants::HTML_NAME_VALUE);
    $map_results = array_column($results, Constants::HTML_NAME_LABEL, Constants::HTML_NAME_VALUE);


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
    <title><?= LastbulletBattleRecordCommon::PAGE_TITLE_LIST ?></title>
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
                    <!-- 対戦日 -->
                    <th>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_BATTLE_DATE ?>
                    </th>

                    <!-- 結果 -->
                    <th>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_RESULT ?>
                    </th>

                    <!-- テーマ -->
                    <th>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_THEME_TYPE ?>
                    </th>

                    <!-- レアスキルリリィ -->
                    <th>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_RARE_SKILL_LILY ?>
                    </th>
                    <!-- レアスキル -->
                    <th>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_RARE_SKILL ?>
                    </th>
                    <!-- 自レギオン名 -->
                    <th>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_FRIEND_LEGION_NAME ?>
                    </th>
                    <!-- リリィ名 -->
                    <th>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_LILY_NAME ?>
                    </th>
                    <!-- 戦闘力 -->
                    <th>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_BATTLE_POWER ?>
                    </th>
                    <!-- HP -->
                    <th>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_HP ?>
                    </th>

                    <!-- 相手レギオン名 -->
                    <th>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_ENEMY_LEGION_NAME ?>   
                    </th>
                    <!-- リリィ名 -->
                    <th>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_LILY_NAME ?>
                    </th>
                    <!-- 戦闘力 -->
                    <th>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_BATTLE_POWER ?>
                    </th>
                    <!-- HP -->
                    <th>
                        <?= LastbulletBattleRecordCommon::PAGE_ITEM_HP ?>
                    </th>


                    <!-- 操作 -->
                    <th>
                        <?= Constants::PAGE_OPERATION ?>
                    </th>

                </tr>
<?php foreach($records as $record): ?>
<?php

$friend_lilys = array_fill(0, LastbulletBattleRecordCommon::COUNT_LEGION_MEMBERS, null);
$enemy_lilys = array_fill(0, LastbulletBattleRecordCommon::COUNT_LEGION_MEMBERS, null);

for ($i = 0; $i < count($friend_lilys); $i++) {
    $friend_lilys[$i] = new LastbulletLily($record[LastbulletBattleRecordCommon::HTML_NAME_FRIEND_INFOS[$i]]);
}
for ($i = 0; $i < count($enemy_lilys); $i++) {
    $enemy_lilys[$i] = new LastbulletLily($record[LastbulletBattleRecordCommon::HTML_NAME_ENEMY_INFOS[$i]]);
}

?>
                <tr>
                    <!-- 対戦日 -->
                    <td rowspan="10">
                        <?= htmlspecialchars($record[LastbulletBattleRecordCommon::HTML_NAME_BATTLE_DATE], ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <!-- 結果 -->
                    <td rowspan="10">
                        <?= htmlspecialchars($map_results[$record[LastbulletBattleRecordCommon::HTML_NAME_RESULT]], ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <!-- テーマ -->
                    <td rowspan="10">
                        <?= htmlspecialchars($map_themes[$record[LastbulletBattleRecordCommon::HTML_NAME_THEME_TYPE]], ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <!-- レアスキルリリィ1 -->
                    <td rowspan="5">
                        <?= htmlspecialchars($record[LastbulletBattleRecordCommon::HTML_NAME_RARE_SKILL_LILY_1], ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- レアスキル1 -->
                    <td rowspan="5">
                        <?= htmlspecialchars($record[LastbulletBattleRecordCommon::HTML_NAME_RARE_SKILL_1], ENT_QUOTES, 'UTF-8') ?>
                    </td>
                        
                    <!-- 自レギオン名 -->
                    <td rowspan="9">
                        <?= htmlspecialchars($record[LastbulletBattleRecordCommon::HTML_NAME_FRIEND_LEGION_NAME], ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <!-- (味方)メンバー情報1 -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[0]->name, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- 戦闘力 -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[0]->battle_power, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- HP -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[0]->hp, ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    
                    <!-- 相手レギオン名 -->
                    <td rowspan="9">
                        <?= htmlspecialchars($record[LastbulletBattleRecordCommon::HTML_NAME_ENEMY_LEGION_NAME], ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <!-- (敵)メンバー情報1 -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[0]->name, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- 戦闘力 -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[0]->battle_power, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- HP -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[0]->hp, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    

                    <!-- 操作 -->
                    <td rowspan="10">
                        <a href="<?= LastbulletBattleRecordCommon::HREF_EDIT ?>?id=<?= urlencode($record[Constants::HTML_NAME_ID]) ?>" class="common-link"><?= Constants::PAGE_EDIT ?></a>
                    </td>

                </tr>
                    
                    <!-- (味方)メンバー情報2 -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[1]->name, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- 戦闘力 -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[1]->battle_power, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- HP -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[1]->hp, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- (敵)メンバー情報2 -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[1]->name, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- 戦闘力 -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[1]->battle_power, ENT_QUOTES, 'UTF-8') ?>    
                    </td>
                    <!-- HP -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[1]->hp, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                </tr>
                <tr>
                    <!-- (味方)メンバー情報3 -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[2]->name, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- 戦闘力 -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[2]->battle_power, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- HP -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[2]->hp, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- (敵)メンバー情報3 -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[2]->name, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- 戦闘力 -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[2]->battle_power, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- HP -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[2]->hp, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                </tr>
                <tr>
                    <!-- (味方)メンバー情報4 -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[3]->name, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- 戦闘力 -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[3]->battle_power, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- HP -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[3]->hp, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- (敵)メンバー情報4 -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[3]->name, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- 戦闘力 -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[3]->battle_power, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- HP -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[3]->hp, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                </tr>
                <tr>
                    <!-- (味方)メンバー情報5 -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[4]->name, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- 戦闘力 -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[4]->battle_power, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- HP -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[4]->hp, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- (敵)メンバー情報5 -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[4]->name, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- 戦闘力 -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[4]->battle_power, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- HP -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[4]->hp, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                </tr>
                <tr>
                    <!-- レアスキルリリィ2 -->
                    <td rowspan="5">
                        <?= htmlspecialchars($record[LastbulletBattleRecordCommon::HTML_NAME_RARE_SKILL_LILY_2], ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- レアスキル2 -->
                    <td rowspan="5">
                        <?= htmlspecialchars($record[LastbulletBattleRecordCommon::HTML_NAME_RARE_SKILL_2], ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- (味方)メンバー情報6 -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[5]->name, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- 戦闘力 -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[5]->battle_power, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- HP -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[5]->hp, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- (敵)メンバー情報6 -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[5]->name, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- 戦闘力 -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[5]->battle_power, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- HP -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[5]->hp, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                </tr>
                <tr>
                    <!-- (味方)メンバー情報7 -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[6]->name, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- 戦闘力 -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[6]->battle_power, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- HP -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[6]->hp, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- (敵)メンバー情報7 -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[6]->name, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- 戦闘力 -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[6]->battle_power, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- HP -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[6]->hp, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                </tr>
                <tr>
                    <!-- (味方)メンバー情報8 -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[7]->name, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- 戦闘力 -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[7]->battle_power, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- HP -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[7]->hp, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- (敵)メンバー情報8 -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[7]->name, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- 戦闘力 -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[7]->battle_power, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- HP -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[7]->hp, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                </tr>
                <tr>
                    <!-- (味方)メンバー情報9 -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[8]->name, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- 戦闘力 -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[8]->battle_power, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- HP -->
                    <td>
                        <?= htmlspecialchars($friend_lilys[8]->hp, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- (敵)メンバー情報9 -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[8]->name, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- 戦闘力 -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[8]->battle_power, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                    <!-- HP -->
                    <td>
                        <?= htmlspecialchars($enemy_lilys[8]->hp, ENT_QUOTES, 'UTF-8') ?>
                    </td>
                </tr>
                <tr>
                    <!-- 備考 -->
                    <td colspan="8">
                        <?= htmlspecialchars($record[LastbulletBattleRecordCommon::HTML_NAME_REMARKS], ENT_QUOTES, 'UTF-8') ?>
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