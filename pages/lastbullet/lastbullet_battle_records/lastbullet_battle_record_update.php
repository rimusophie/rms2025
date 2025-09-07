<?php

require_once(__DIR__ . '/lastbullet_battle_record_common.php');
require_once(__DIR__ . '/../../../utils/utils.php');

$page_title_text = LastbulletBattleRecordCommon::PAGE_TITLE_EDIT;
$common_link_text = LastbulletBattleRecordCommon::PAGE_TITLE_LIST;
$common_link_href = LastbulletBattleRecordCommon::HREF_LIST;

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

$result_msg_text = '';

$friend_infos = array_fill(0, LastbulletBattleRecordCommon::COUNT_LEGION_MEMBERS, '');
$enemy_infos = array_fill(0, LastbulletBattleRecordCommon::COUNT_LEGION_MEMBERS, '');
for ($i = 0; $i < count($friend_infos); $i++) {
    $friend_infos[$i] = !isRmsEmptyOrNull($_POST[LastbulletBattleRecordCommon::HTML_NAME_FRIEND_INFO_NAMES[$i]]) ? 
                                                sprintf("%s,%s,%s", 
                                                $_POST[LastbulletBattleRecordCommon::HTML_NAME_FRIEND_INFO_NAMES[$i]], 
                                                $_POST[LastbulletBattleRecordCommon::HTML_NAME_FRIEND_INFO_BATTLE_POWERS[$i]], 
                                                $_POST[LastbulletBattleRecordCommon::HTML_NAME_FRIEND_INFO_HPS[$i]]) : '';
}
for ($i = 0; $i < count($enemy_infos); $i++) {
    $enemy_infos[$i] = !isRmsEmptyOrNull($_POST[LastbulletBattleRecordCommon::HTML_NAME_ENEMY_INFO_NAMES[$i]]) ? 
                                                sprintf("%s,%s,%s", 
                                                $_POST[LastbulletBattleRecordCommon::HTML_NAME_ENEMY_INFO_NAMES[$i]], 
                                                $_POST[LastbulletBattleRecordCommon::HTML_NAME_ENEMY_INFO_BATTLE_POWERS[$i]], 
                                                $_POST[LastbulletBattleRecordCommon::HTML_NAME_ENEMY_INFO_HPS[$i]]) : '';
}

try{
    LastbulletBattleRecordCommon::update($_POST[Constants::HTML_NAME_ID],
                                                $_POST[LastbulletBattleRecordCommon::HTML_NAME_BATTLE_DATE],
                                                $_POST[LastbulletBattleRecordCommon::HTML_NAME_RESULT],
                                                $_POST[LastbulletBattleRecordCommon::HTML_NAME_THEME_TYPE],
                                                $_POST[LastbulletBattleRecordCommon::HTML_NAME_RARE_SKILL_LILY_1],
                                                $_POST[LastbulletBattleRecordCommon::HTML_NAME_RARE_SKILL_1],
                                                $_POST[LastbulletBattleRecordCommon::HTML_NAME_RARE_SKILL_LILY_2],
                                                $_POST[LastbulletBattleRecordCommon::HTML_NAME_RARE_SKILL_2],
                                                $_POST[LastbulletBattleRecordCommon::HTML_NAME_REMARKS],
                                                $_POST[LastbulletBattleRecordCommon::HTML_NAME_FRIEND_LEGION_NAME],
                                                $friend_infos[0],
                                                $friend_infos[1],
                                                $friend_infos[2],
                                                $friend_infos[3],
                                                $friend_infos[4],
                                                $friend_infos[5],
                                                $friend_infos[6],
                                                $friend_infos[7],
                                                $friend_infos[8],
                                                $_POST[LastbulletBattleRecordCommon::HTML_NAME_ENEMY_LEGION_NAME],
                                                $enemy_infos[0],
                                                $enemy_infos[1],
                                                $enemy_infos[2],
                                                $enemy_infos[3],
                                                $enemy_infos[4],
                                                $enemy_infos[5],
                                                $enemy_infos[6],
                                                $enemy_infos[7],
                                                $enemy_infos[8]);

    $result_msg_text = LastbulletBattleRecordCommon::MESSAGE_UPDATE_SUCCESS;
} catch (PDOException $e) {
    $result_msg_text = sprintf("%s\n%s", Constants::MESSAGE_ERROR, $e->getMessage());
}

?>

<body class="common-body">
    <div class="container common-container">
<?php 
include(__DIR__ . "/../../../includes/header.php");
include(__DIR__ . '/../../../includes/page_title.php');
include(__DIR__ . '/../../../includes/result_msg.php');
include(__DIR__ . '/../../../includes/common_link.php');
include(__DIR__ . '/../../../includes/footer.php');
?>
    </div>
</body>
</html>