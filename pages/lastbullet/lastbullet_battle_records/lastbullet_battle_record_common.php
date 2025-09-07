<?php

require_once(__DIR__ . '/../../../utils/constants.php');
require_once(__DIR__ . '/../../../utils/db.php');
require_once(__DIR__ . '/../../../utils/utils.php');

class LastbulletBattleRecordCommon {
    const KIND = Constants::KIND_LASTBULLET_BATTLE_RECORD;

    /**
     * ページタイトル
     */
    const PAGE_TITLE_LIST = self::KIND . Constants::PAGE_LIST;
    const PAGE_TITLE_ADD = self::KIND . Constants::PAGE_ADD;
    const PAGE_TITLE_EDIT = self::KIND . Constants::PAGE_EDIT;
    const PAGE_TITLE_DELETE = self::KIND . Constants::PAGE_DELETE;

    /**
     * 表示名
     */
    const PAGE_ITEM_BATTLE_DATE = '対戦日';
    const PAGE_ITEM_RESULT = '結果';
    const PAGE_ITEM_THEME_TYPE = 'テーマ';
    const PAGE_ITEM_RARE_SKILL_LILY = 'レアスキルリリィ';
    const PAGE_ITEM_RARE_SKILL = 'レアスキル';
    const PAGE_ITEM_RARE_SKILL_LILY_1 = 'レアスキルリリィ1';
    const PAGE_ITEM_RARE_SKILL_1 = 'レアスキル1';
    const PAGE_ITEM_RARE_SKILL_LILY_2 = 'レアスキルリリィ2';
    const PAGE_ITEM_RARE_SKILL_2 = 'レアスキル2';
    const PAGE_ITEM_REMARKS = '備考';
    const PAGE_ITEM_FRIEND_LEGION_NAME = '自レギオン名';
    const PAGE_ITEM_FRIEND_INFO_1 = 'メンバー情報1';
    const PAGE_ITEM_FRIEND_INFO_2 = 'メンバー情報2';
    const PAGE_ITEM_FRIEND_INFO_3 = 'メンバー情報3';
    const PAGE_ITEM_FRIEND_INFO_4 = 'メンバー情報4';
    const PAGE_ITEM_FRIEND_INFO_5 = 'メンバー情報5';
    const PAGE_ITEM_FRIEND_INFO_6 = 'メンバー情報6';
    const PAGE_ITEM_FRIEND_INFO_7 = 'メンバー情報7';
    const PAGE_ITEM_FRIEND_INFO_8 = 'メンバー情報8';
    const PAGE_ITEM_FRIEND_INFO_9 = 'メンバー情報9';
    const PAGE_ITEM_ENEMY_LEGION_NAME = '相手レギオン名';
    const PAGE_ITEM_ENEMY_INFO_1 = 'メンバー情報1';
    const PAGE_ITEM_ENEMY_INFO_2 = 'メンバー情報2';
    const PAGE_ITEM_ENEMY_INFO_3 = 'メンバー情報3';
    const PAGE_ITEM_ENEMY_INFO_4 = 'メンバー情報4';
    const PAGE_ITEM_ENEMY_INFO_5 = 'メンバー情報5';
    const PAGE_ITEM_ENEMY_INFO_6 = 'メンバー情報6';
    const PAGE_ITEM_ENEMY_INFO_7 = 'メンバー情報7';
    const PAGE_ITEM_ENEMY_INFO_8 = 'メンバー情報8';
    const PAGE_ITEM_ENEMY_INFO_9 = 'メンバー情報9';
    const PAGE_ITEM_LILY_NAME = 'リリィ名';
    const PAGE_ITEM_BATTLE_POWER = '戦闘力';
    const PAGE_ITEM_HP = 'HP';

    const ROWS_TEXTAREA_REMARKS = 5;
    const COLS_TEXTAREA_REMARKS = 20;
    const COUNT_LEGION_MEMBERS = 9;

    /**
     * HTML項目名称
     */
    const HTML_NAME_BATTLE_DATE = 'battle_date';
    const HTML_NAME_RESULT = 'result';
    const HTML_NAME_THEME_TYPE = 'theme_type';
    const HTML_NAME_RARE_SKILL_LILY_1 = 'rare_skill_lily_1';
    const HTML_NAME_RARE_SKILL_1 = 'rare_skill_1';
    const HTML_NAME_RARE_SKILL_LILY_2 = 'rare_skill_lily_2';
    const HTML_NAME_RARE_SKILL_2 = 'rare_skill_2';
    const HTML_NAME_REMARKS = 'remarks';
    const HTML_NAME_FRIEND_LEGION_NAME = 'friend_legion_name';
    const HTML_NAME_ENEMY_LEGION_NAME = 'enemy_legion_name';

    const HTML_NAME_FRIEND_INFO_1 = 'friend_info_1';
    const HTML_NAME_FRIEND_INFO_2 = 'friend_info_2';
    const HTML_NAME_FRIEND_INFO_3 = 'friend_info_3';
    const HTML_NAME_FRIEND_INFO_4 = 'friend_info_4';
    const HTML_NAME_FRIEND_INFO_5 = 'friend_info_5';
    const HTML_NAME_FRIEND_INFO_6 = 'friend_info_6';
    const HTML_NAME_FRIEND_INFO_7 = 'friend_info_7';
    const HTML_NAME_FRIEND_INFO_8 = 'friend_info_8';
    const HTML_NAME_FRIEND_INFO_9 = 'friend_info_9';

    const HTML_NAME_ENEMY_INFO_1 = 'enemy_info_1';
    const HTML_NAME_ENEMY_INFO_2 = 'enemy_info_2';
    const HTML_NAME_ENEMY_INFO_3 = 'enemy_info_3';
    const HTML_NAME_ENEMY_INFO_4 = 'enemy_info_4';
    const HTML_NAME_ENEMY_INFO_5 = 'enemy_info_5';
    const HTML_NAME_ENEMY_INFO_6 = 'enemy_info_6';
    const HTML_NAME_ENEMY_INFO_7 = 'enemy_info_7';
    const HTML_NAME_ENEMY_INFO_8 = 'enemy_info_8';
    const HTML_NAME_ENEMY_INFO_9 = 'enemy_info_9';

    const HTML_NAME_FRIEND_INFO_1_NAME = 'friend_info_1_name';
    const HTML_NAME_FRIEND_INFO_2_NAME = 'friend_info_2_name';
    const HTML_NAME_FRIEND_INFO_3_NAME = 'friend_info_3_name';
    const HTML_NAME_FRIEND_INFO_4_NAME = 'friend_info_4_name';
    const HTML_NAME_FRIEND_INFO_5_NAME = 'friend_info_5_name';
    const HTML_NAME_FRIEND_INFO_6_NAME = 'friend_info_6_name';
    const HTML_NAME_FRIEND_INFO_7_NAME = 'friend_info_7_name';
    const HTML_NAME_FRIEND_INFO_8_NAME = 'friend_info_8_name';
    const HTML_NAME_FRIEND_INFO_9_NAME = 'friend_info_9_name';

    const HTML_NAME_ENEMY_INFO_1_NAME = 'enemy_info_1_name';
    const HTML_NAME_ENEMY_INFO_2_NAME = 'enemy_info_2_name';
    const HTML_NAME_ENEMY_INFO_3_NAME = 'enemy_info_3_name';
    const HTML_NAME_ENEMY_INFO_4_NAME = 'enemy_info_4_name';
    const HTML_NAME_ENEMY_INFO_5_NAME = 'enemy_info_5_name';
    const HTML_NAME_ENEMY_INFO_6_NAME = 'enemy_info_6_name';
    const HTML_NAME_ENEMY_INFO_7_NAME = 'enemy_info_7_name';
    const HTML_NAME_ENEMY_INFO_8_NAME = 'enemy_info_8_name';
    const HTML_NAME_ENEMY_INFO_9_NAME = 'enemy_info_9_name';

    const HTML_NAME_FRIEND_INFO_1_BATTLE_POWER = 'friend_info_1_battle_power';
    const HTML_NAME_FRIEND_INFO_2_BATTLE_POWER = 'friend_info_2_battle_power';
    const HTML_NAME_FRIEND_INFO_3_BATTLE_POWER = 'friend_info_3_battle_power';
    const HTML_NAME_FRIEND_INFO_4_BATTLE_POWER = 'friend_info_4_battle_power';
    const HTML_NAME_FRIEND_INFO_5_BATTLE_POWER = 'friend_info_5_battle_power';
    const HTML_NAME_FRIEND_INFO_6_BATTLE_POWER = 'friend_info_6_battle_power';
    const HTML_NAME_FRIEND_INFO_7_BATTLE_POWER = 'friend_info_7_battle_power';
    const HTML_NAME_FRIEND_INFO_8_BATTLE_POWER = 'friend_info_8_battle_power';
    const HTML_NAME_FRIEND_INFO_9_BATTLE_POWER = 'friend_info_9_battle_power';

    const HTML_NAME_ENEMY_INFO_1_BATTLE_POWER = 'enemy_info_1_battle_power';
    const HTML_NAME_ENEMY_INFO_2_BATTLE_POWER = 'enemy_info_2_battle_power';
    const HTML_NAME_ENEMY_INFO_3_BATTLE_POWER = 'enemy_info_3_battle_power';
    const HTML_NAME_ENEMY_INFO_4_BATTLE_POWER = 'enemy_info_4_battle_power';
    const HTML_NAME_ENEMY_INFO_5_BATTLE_POWER = 'enemy_info_5_battle_power';
    const HTML_NAME_ENEMY_INFO_6_BATTLE_POWER = 'enemy_info_6_battle_power';
    const HTML_NAME_ENEMY_INFO_7_BATTLE_POWER = 'enemy_info_7_battle_power';
    const HTML_NAME_ENEMY_INFO_8_BATTLE_POWER = 'enemy_info_8_battle_power';
    const HTML_NAME_ENEMY_INFO_9_BATTLE_POWER = 'enemy_info_9_battle_power';

    const HTML_NAME_FRIEND_INFO_1_HP = 'friend_info_1_hp';
    const HTML_NAME_FRIEND_INFO_2_HP = 'friend_info_2_hp';
    const HTML_NAME_FRIEND_INFO_3_HP = 'friend_info_3_hp';
    const HTML_NAME_FRIEND_INFO_4_HP = 'friend_info_4_hp';
    const HTML_NAME_FRIEND_INFO_5_HP = 'friend_info_5_hp';
    const HTML_NAME_FRIEND_INFO_6_HP = 'friend_info_6_hp';
    const HTML_NAME_FRIEND_INFO_7_HP = 'friend_info_7_hp';
    const HTML_NAME_FRIEND_INFO_8_HP = 'friend_info_8_hp';
    const HTML_NAME_FRIEND_INFO_9_HP = 'friend_info_9_hp';

    const HTML_NAME_ENEMY_INFO_1_HP = 'enemy_info_1_hp';
    const HTML_NAME_ENEMY_INFO_2_HP = 'enemy_info_2_hp';
    const HTML_NAME_ENEMY_INFO_3_HP = 'enemy_info_3_hp';
    const HTML_NAME_ENEMY_INFO_4_HP = 'enemy_info_4_hp';
    const HTML_NAME_ENEMY_INFO_5_HP = 'enemy_info_5_hp';
    const HTML_NAME_ENEMY_INFO_6_HP = 'enemy_info_6_hp';
    const HTML_NAME_ENEMY_INFO_7_HP = 'enemy_info_7_hp';
    const HTML_NAME_ENEMY_INFO_8_HP = 'enemy_info_8_hp';
    const HTML_NAME_ENEMY_INFO_9_HP = 'enemy_info_9_hp';

    const HTML_NAME_FRIEND_INFOS = [
        self::HTML_NAME_FRIEND_INFO_1,
        self::HTML_NAME_FRIEND_INFO_2,
        self::HTML_NAME_FRIEND_INFO_3,
        self::HTML_NAME_FRIEND_INFO_4,
        self::HTML_NAME_FRIEND_INFO_5,
        self::HTML_NAME_FRIEND_INFO_6,
        self::HTML_NAME_FRIEND_INFO_7,
        self::HTML_NAME_FRIEND_INFO_8,
        self::HTML_NAME_FRIEND_INFO_9
    ];
    const HTML_NAME_ENEMY_INFOS = [
        self::HTML_NAME_ENEMY_INFO_1,
        self::HTML_NAME_ENEMY_INFO_2,
        self::HTML_NAME_ENEMY_INFO_3,
        self::HTML_NAME_ENEMY_INFO_4,
        self::HTML_NAME_ENEMY_INFO_5,
        self::HTML_NAME_ENEMY_INFO_6,
        self::HTML_NAME_ENEMY_INFO_7,
        self::HTML_NAME_ENEMY_INFO_8,
        self::HTML_NAME_ENEMY_INFO_9
    ];
    const HTML_NAME_FRIEND_INFO_NAMES = [
        self::HTML_NAME_FRIEND_INFO_1_NAME,
        self::HTML_NAME_FRIEND_INFO_2_NAME,
        self::HTML_NAME_FRIEND_INFO_3_NAME,
        self::HTML_NAME_FRIEND_INFO_4_NAME,
        self::HTML_NAME_FRIEND_INFO_5_NAME,
        self::HTML_NAME_FRIEND_INFO_6_NAME,
        self::HTML_NAME_FRIEND_INFO_7_NAME,
        self::HTML_NAME_FRIEND_INFO_8_NAME,
        self::HTML_NAME_FRIEND_INFO_9_NAME
    ];
    const HTML_NAME_FRIEND_INFO_BATTLE_POWERS = [
        self::HTML_NAME_FRIEND_INFO_1_BATTLE_POWER,
        self::HTML_NAME_FRIEND_INFO_2_BATTLE_POWER,
        self::HTML_NAME_FRIEND_INFO_3_BATTLE_POWER,
        self::HTML_NAME_FRIEND_INFO_4_BATTLE_POWER,
        self::HTML_NAME_FRIEND_INFO_5_BATTLE_POWER,
        self::HTML_NAME_FRIEND_INFO_6_BATTLE_POWER,
        self::HTML_NAME_FRIEND_INFO_7_BATTLE_POWER,
        self::HTML_NAME_FRIEND_INFO_8_BATTLE_POWER,
        self::HTML_NAME_FRIEND_INFO_9_BATTLE_POWER
    ];
    const HTML_NAME_FRIEND_INFO_HPS = [
        self::HTML_NAME_FRIEND_INFO_1_HP,
        self::HTML_NAME_FRIEND_INFO_2_HP,
        self::HTML_NAME_FRIEND_INFO_3_HP,
        self::HTML_NAME_FRIEND_INFO_4_HP,
        self::HTML_NAME_FRIEND_INFO_5_HP,
        self::HTML_NAME_FRIEND_INFO_6_HP,
        self::HTML_NAME_FRIEND_INFO_7_HP,
        self::HTML_NAME_FRIEND_INFO_8_HP,
        self::HTML_NAME_FRIEND_INFO_9_HP
    ];
    const HTML_NAME_ENEMY_INFO_NAMES = [
        self::HTML_NAME_ENEMY_INFO_1_NAME,
        self::HTML_NAME_ENEMY_INFO_2_NAME,
        self::HTML_NAME_ENEMY_INFO_3_NAME,
        self::HTML_NAME_ENEMY_INFO_4_NAME,
        self::HTML_NAME_ENEMY_INFO_5_NAME,
        self::HTML_NAME_ENEMY_INFO_6_NAME,
        self::HTML_NAME_ENEMY_INFO_7_NAME,
        self::HTML_NAME_ENEMY_INFO_8_NAME,
        self::HTML_NAME_ENEMY_INFO_9_NAME
    ];
    const HTML_NAME_ENEMY_INFO_BATTLE_POWERS = [
        self::HTML_NAME_ENEMY_INFO_1_BATTLE_POWER,
        self::HTML_NAME_ENEMY_INFO_2_BATTLE_POWER,
        self::HTML_NAME_ENEMY_INFO_3_BATTLE_POWER,
        self::HTML_NAME_ENEMY_INFO_4_BATTLE_POWER,
        self::HTML_NAME_ENEMY_INFO_5_BATTLE_POWER,
        self::HTML_NAME_ENEMY_INFO_6_BATTLE_POWER,
        self::HTML_NAME_ENEMY_INFO_7_BATTLE_POWER,
        self::HTML_NAME_ENEMY_INFO_8_BATTLE_POWER,
        self::HTML_NAME_ENEMY_INFO_9_BATTLE_POWER
    ];
    const HTML_NAME_ENEMY_INFO_HPS = [
        self::HTML_NAME_ENEMY_INFO_1_HP,
        self::HTML_NAME_ENEMY_INFO_2_HP,
        self::HTML_NAME_ENEMY_INFO_3_HP,
        self::HTML_NAME_ENEMY_INFO_4_HP,
        self::HTML_NAME_ENEMY_INFO_5_HP,
        self::HTML_NAME_ENEMY_INFO_6_HP,
        self::HTML_NAME_ENEMY_INFO_7_HP,
        self::HTML_NAME_ENEMY_INFO_8_HP,
        self::HTML_NAME_ENEMY_INFO_9_HP
    ];

    /**
     * メッセージ
     */
    const MESSAGE_CREATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_CREATE . 'しました。';
    const MESSAGE_UPDATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_UPDATE . 'しました。';
    const MESSAGE_DELETE_SUCCESS = self::KIND . 'を' . Constants::PAGE_DELETE . 'しました。';

    /**
     * ファイル名
     */
    const FILE_LIST = 'lastbullet_battle_record_list.php';
    const FILE_ADD = 'lastbullet_battle_record_add.php';
    const FILE_EDIT = 'lastbullet_battle_record_edit.php';
    const FILE_CREATE = 'lastbullet_battle_record_create.php';
    const FILE_UPDATE = 'lastbullet_battle_record_update.php';
    const FILE_DELETE = 'lastbullet_battle_record_delete.php';
    
    /**
     * リンク
     */
    const HREF_LIST = Constants::PATH_CURRENT . self::FILE_LIST;
    const HREF_ADD = Constants::PATH_CURRENT . self::FILE_ADD;
    const HREF_EDIT = Constants::PATH_CURRENT . self::FILE_EDIT;
    const HREF_CREATE = Constants::PATH_CURRENT . self::FILE_CREATE;
    const HREF_UPDATE = Constants::PATH_CURRENT . self::FILE_UPDATE;
    const HREF_DELETE = Constants::PATH_CURRENT . self::FILE_DELETE;

    /**
     * レコード一覧を取得
     * @return object
     */
    public static function list(): array {
        $pdo = get_db();
        $sql = '
            SELECT 
                l.id AS id,
                l.battle_date AS battle_date,
                l.result AS result,
                l.theme_type AS theme_type,
                l.rare_skill_lily_1 AS rare_skill_lily_1,
                l.rare_skill_1 AS rare_skill_1,
                l.rare_skill_lily_2 AS rare_skill_lily_2,
                l.rare_skill_2 AS rare_skill_2,
                l.remarks AS remarks,
                l.friend_legion_name AS friend_legion_name,
                l.friend_info_1 AS friend_info_1,
                l.friend_info_2 AS friend_info_2,
                l.friend_info_3 AS friend_info_3,
                l.friend_info_4 AS friend_info_4,
                l.friend_info_5 AS friend_info_5,
                l.friend_info_6 AS friend_info_6,
                l.friend_info_7 AS friend_info_7,
                l.friend_info_8 AS friend_info_8,
                l.friend_info_9 AS friend_info_9,
                l.enemy_legion_name AS enemy_legion_name,
                l.enemy_info_1 AS enemy_info_1,
                l.enemy_info_2 AS enemy_info_2,
                l.enemy_info_3 AS enemy_info_3,
                l.enemy_info_4 AS enemy_info_4,
                l.enemy_info_5 AS enemy_info_5,
                l.enemy_info_6 AS enemy_info_6,
                l.enemy_info_7 AS enemy_info_7,
                l.enemy_info_8 AS enemy_info_8,
                l.enemy_info_9 AS enemy_info_9
            FROM
                lastbullet_battle_records AS l 
            ORDER BY 
                l.battle_date DESC
        ';
        $stmt = $pdo->query($sql); 
               
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get(int $id): ?array {
        $pdo = get_db();
        $sql = '
            SELECT 
                l.id AS id,
                l.battle_date AS battle_date,
                l.result AS result,
                l.theme_type AS theme_type,
                l.rare_skill_lily_1 AS rare_skill_lily_1,
                l.rare_skill_1 AS rare_skill_1,
                l.rare_skill_lily_2 AS rare_skill_lily_2,
                l.rare_skill_2 AS rare_skill_2,
                l.remarks AS remarks,
                l.friend_legion_name AS friend_legion_name,
                l.friend_info_1 AS friend_info_1,
                l.friend_info_2 AS friend_info_2,
                l.friend_info_3 AS friend_info_3,
                l.friend_info_4 AS friend_info_4,
                l.friend_info_5 AS friend_info_5,
                l.friend_info_6 AS friend_info_6,
                l.friend_info_7 AS friend_info_7,
                l.friend_info_8 AS friend_info_8,
                l.friend_info_9 AS friend_info_9,
                l.enemy_legion_name AS enemy_legion_name,
                l.enemy_info_1 AS enemy_info_1,
                l.enemy_info_2 AS enemy_info_2,
                l.enemy_info_3 AS enemy_info_3,
                l.enemy_info_4 AS enemy_info_4,
                l.enemy_info_5 AS enemy_info_5,
                l.enemy_info_6 AS enemy_info_6,
                l.enemy_info_7 AS enemy_info_7,
                l.enemy_info_8 AS enemy_info_8,
                l.enemy_info_9 AS enemy_info_9
            FROM
                lastbullet_battle_records AS l 
            WHERE 
                l.id = :id
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public static function create(string $battle_date, 
                                    int $result,
                                    int $theme_type,
                                    string $rare_skill_lily_1,
                                    string $rare_skill_1,
                                    string $rare_skill_lily_2,
                                    string $rare_skill_2,
                                    string $remarks,
                                    string $friend_legion_name,
                                    string $friend_info_1,
                                    string $friend_info_2,
                                    string $friend_info_3,
                                    string $friend_info_4,
                                    string $friend_info_5,
                                    string $friend_info_6,
                                    string $friend_info_7,
                                    string $friend_info_8,
                                    string $friend_info_9,
                                    string $enemy_legion_name,
                                    string $enemy_info_1,
                                    string $enemy_info_2,
                                    string $enemy_info_3,
                                    string $enemy_info_4,
                                    string $enemy_info_5,
                                    string $enemy_info_6,
                                    string $enemy_info_7,
                                    string $enemy_info_8,
                                    string $enemy_info_9): void {
        $pdo = get_db();

        $sql = '
            INSERT INTO lastbullet_battle_records (
                battle_date,
                result,
                theme_type,
                rare_skill_lily_1,
                rare_skill_1,
                rare_skill_lily_2,
                rare_skill_2,
                remarks,
                friend_legion_name,
                friend_info_1,
                friend_info_2,
                friend_info_3,
                friend_info_4,
                friend_info_5,
                friend_info_6,
                friend_info_7,
                friend_info_8,
                friend_info_9,
                enemy_legion_name,
                enemy_info_1,
                enemy_info_2,
                enemy_info_3,
                enemy_info_4,
                enemy_info_5,
                enemy_info_6,
                enemy_info_7,
                enemy_info_8,
                enemy_info_9
            ) VALUES (
                :battle_date,
                :result,
                :theme_type,
                :rare_skill_lily_1,
                :rare_skill_1,
                :rare_skill_lily_2,
                :rare_skill_2,
                :remarks,
                :friend_legion_name,
                :friend_info_1,
                :friend_info_2,
                :friend_info_3,
                :friend_info_4,
                :friend_info_5,
                :friend_info_6,
                :friend_info_7,
                :friend_info_8,
                :friend_info_9,
                :enemy_legion_name,
                :enemy_info_1,
                :enemy_info_2,
                :enemy_info_3,
                :enemy_info_4,
                :enemy_info_5,
                :enemy_info_6,
                :enemy_info_7,
                :enemy_info_8,
                :enemy_info_9
            )
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':battle_date', $battle_date, PDO::PARAM_STR);
        $stmt->bindValue(':result', $result, PDO::PARAM_INT);
        $stmt->bindValue(':theme_type', $theme_type, PDO::PARAM_INT);
        $stmt->bindValue(':rare_skill_lily_1', $rare_skill_lily_1, PDO::PARAM_STR);
        $stmt->bindValue(':rare_skill_1', $rare_skill_1, PDO::PARAM_STR);
        $stmt->bindValue(':rare_skill_lily_2', $rare_skill_lily_2, PDO::PARAM_STR);
        $stmt->bindValue(':rare_skill_2', $rare_skill_2, PDO::PARAM_STR);
        $stmt->bindValue(':remarks', $remarks, PDO::PARAM_STR);
        $stmt->bindValue(':friend_legion_name', $friend_legion_name, PDO::PARAM_STR);
        $stmt->bindValue(':friend_info_1', $friend_info_1, PDO::PARAM_STR);
        $stmt->bindValue(':friend_info_2', $friend_info_2, PDO::PARAM_STR);
        $stmt->bindValue(':friend_info_3', $friend_info_3, PDO::PARAM_STR);
        $stmt->bindValue(':friend_info_4', $friend_info_4, PDO::PARAM_STR);
        $stmt->bindValue(':friend_info_5', $friend_info_5, PDO::PARAM_STR);
        $stmt->bindValue(':friend_info_6', $friend_info_6, PDO::PARAM_STR);
        $stmt->bindValue(':friend_info_7', $friend_info_7, PDO::PARAM_STR);
        $stmt->bindValue(':friend_info_8', $friend_info_8, PDO::PARAM_STR);
        $stmt->bindValue(':friend_info_9', $friend_info_9, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_legion_name', $enemy_legion_name, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_info_1', $enemy_info_1, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_info_2', $enemy_info_2, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_info_3', $enemy_info_3, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_info_4', $enemy_info_4, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_info_5', $enemy_info_5, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_info_6', $enemy_info_6, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_info_7', $enemy_info_7, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_info_8', $enemy_info_8, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_info_9', $enemy_info_9, PDO::PARAM_STR);
        $stmt->execute();
    }

    public static function update(int $id, 
                                    string $battle_date, 
                                    int $result,
                                    int $theme_type,
                                    string $rare_skill_lily_1,
                                    string $rare_skill_1,
                                    string $rare_skill_lily_2,
                                    string $rare_skill_2,
                                    string $remarks,
                                    string $friend_legion_name,
                                    string $friend_info_1,
                                    string $friend_info_2,
                                    string $friend_info_3,
                                    string $friend_info_4,
                                    string $friend_info_5,
                                    string $friend_info_6,
                                    string $friend_info_7,
                                    string $friend_info_8,
                                    string $friend_info_9,
                                    string $enemy_legion_name,
                                    string $enemy_info_1,
                                    string $enemy_info_2,
                                    string $enemy_info_3,
                                    string $enemy_info_4,
                                    string $enemy_info_5,
                                    string $enemy_info_6,
                                    string $enemy_info_7,
                                    string $enemy_info_8,
                                    string $enemy_info_9): void {
        $pdo = get_db();

        $sql = '
            UPDATE 
                lastbullet_battle_records
            SET 
                battle_date = :battle_date,
                result = :result,
                theme_type = :theme_type,
                rare_skill_lily_1 = :rare_skill_lily_1,
                rare_skill_1 = :rare_skill_1,
                rare_skill_lily_2 = :rare_skill_lily_2,
                rare_skill_2 = :rare_skill_2,
                remarks = :remarks,
                friend_legion_name = :friend_legion_name,
                friend_info_1 = :friend_info_1,
                friend_info_2 = :friend_info_2,
                friend_info_3 = :friend_info_3,
                friend_info_4 = :friend_info_4,
                friend_info_5 = :friend_info_5,
                friend_info_6 = :friend_info_6,
                friend_info_7 = :friend_info_7,
                friend_info_8 = :friend_info_8,
                friend_info_9 = :friend_info_9,
                enemy_legion_name = :enemy_legion_name,
                enemy_info_1 = :enemy_info_1,
                enemy_info_2 = :enemy_info_2,
                enemy_info_3 = :enemy_info_3,
                enemy_info_4 = :enemy_info_4,
                enemy_info_5 = :enemy_info_5,
                enemy_info_6 = :enemy_info_6,
                enemy_info_7 = :enemy_info_7,
                enemy_info_8 = :enemy_info_8,
                enemy_info_9 = :enemy_info_9
            WHERE 
                id = :id
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':battle_date', $battle_date, PDO::PARAM_STR);
        $stmt->bindValue(':result', $result, PDO::PARAM_INT);
        $stmt->bindValue(':theme_type', $theme_type, PDO::PARAM_INT);
        $stmt->bindValue(':rare_skill_lily_1', $rare_skill_lily_1, PDO::PARAM_STR);
        $stmt->bindValue(':rare_skill_1', $rare_skill_1, PDO::PARAM_STR);
        $stmt->bindValue(':rare_skill_lily_2', $rare_skill_lily_2, PDO::PARAM_STR);
        $stmt->bindValue(':rare_skill_2', $rare_skill_2, PDO::PARAM_STR);
        $stmt->bindValue(':remarks', $remarks, PDO::PARAM_STR);
        $stmt->bindValue(':friend_legion_name', $friend_legion_name, PDO::PARAM_STR);
        $stmt->bindValue(':friend_info_1', $friend_info_1, PDO::PARAM_STR);
        $stmt->bindValue(':friend_info_2', $friend_info_2, PDO::PARAM_STR);
        $stmt->bindValue(':friend_info_3', $friend_info_3, PDO::PARAM_STR);
        $stmt->bindValue(':friend_info_4', $friend_info_4, PDO::PARAM_STR);
        $stmt->bindValue(':friend_info_5', $friend_info_5, PDO::PARAM_STR);
        $stmt->bindValue(':friend_info_6', $friend_info_6, PDO::PARAM_STR);
        $stmt->bindValue(':friend_info_7', $friend_info_7, PDO::PARAM_STR);
        $stmt->bindValue(':friend_info_8', $friend_info_8, PDO::PARAM_STR);
        $stmt->bindValue(':friend_info_9', $friend_info_9, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_legion_name', $enemy_legion_name, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_info_1', $enemy_info_1, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_info_2', $enemy_info_2, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_info_3', $enemy_info_3, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_info_4', $enemy_info_4, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_info_5', $enemy_info_5, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_info_6', $enemy_info_6, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_info_7', $enemy_info_7, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_info_8', $enemy_info_8, PDO::PARAM_STR);
        $stmt->bindValue(':enemy_info_9', $enemy_info_9, PDO::PARAM_STR);
        $stmt->execute();
    }

    public static function delete(int $id): void {
        $pdo = get_db();

        $sql = '
            DELETE FROM 
                lastbullet_battle_records
            WHERE 
                id = :id
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * テーマの一覧を取得
     * @return array
     */
    public static function list_themes(): array {
        // setting_no = 3 はテーマの設定を指す
        $pdo = get_db();
        $sql = '
            SELECT 
                l.label AS label,
                l.value AS value
            FROM
                lastbullet_settings AS l 
            WHERE 
                l.setting_no = 3
            ORDER BY 
                l.setting_sort_no ASC
        ';
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }

    /**
     * 結果の一覧を取得
     * @return array
     */
    public static function list_results(): array {
        // setting_no = 2 は結果の設定を指す
        $pdo = get_db();
        $sql = '
            SELECT 
                l.label AS label,
                l.value AS value
            FROM
                lastbullet_settings AS l 
            WHERE 
                l.setting_no = 2
            ORDER BY 
                l.setting_sort_no ASC
        ';
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }
}

/**
 * リリィデータクラス
 */
class LastbulletLily {
    public string $name;
    public string $battle_power;
    public string $hp;

    public function __construct(string $lily_info) {
        $this->name = '';
        $this->battle_power = '';
        $this->hp = '';
        if($lily_info != '') {
            list($this->name, $this->battle_power, $this->hp) = explode(',', $lily_info);
        }
    }
}

?>