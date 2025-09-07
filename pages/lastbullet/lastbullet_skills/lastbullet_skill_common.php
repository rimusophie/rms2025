<?php

require_once(__DIR__ . '/../../../utils/constants.php');
require_once(__DIR__ . '/../../../utils/db.php');
require_once(__DIR__ . '/../../../utils/utils.php');

class LastbulletSkillCommon {
    const KIND = Constants::KIND_LASTBULLET_SKILL;

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
    const PAGE_ITEM_NAME = '名称';
    const PAGE_ITEM_SUMMARY = 'スキル概要';

    const HTML_NAME_NAME = 'name';
    const HTML_NAME_SUMMARY = 'summary';

    /**
     * メッセージ
     */
    const MESSAGE_CREATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_CREATE . 'しました。';
    const MESSAGE_UPDATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_UPDATE . 'しました。';
    const MESSAGE_DELETE_SUCCESS = self::KIND . 'を' . Constants::PAGE_DELETE . 'しました。';

    /**
     * ファイル名
     */
    const FILE_LIST = 'lastbullet_skill_list.php';
    const FILE_ADD = 'lastbullet_skill_add.php';
    const FILE_EDIT = 'lastbullet_skill_edit.php';
    const FILE_CREATE = 'lastbullet_skill_create.php';
    const FILE_UPDATE = 'lastbullet_skill_update.php';
    const FILE_DELETE = 'lastbullet_skill_delete.php';
    
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
                l.name AS name,
                l.summary AS summary
            FROM
                lastbullet_skills AS l 
            ORDER BY 
                l.name ASC
        ';
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }

    public static function get(int $id): ?array {
        $pdo = get_db();
        $sql = '
            SELECT 
                l.id AS id,
                l.name AS name,
                l.summary AS summary
            FROM
                lastbullet_skills AS l 
            WHERE 
                l.id = :id
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public static function create(string $name, string $summary): void {
        $pdo = get_db();

        $sql = '
            INSERT INTO lastbullet_skills (
                name,
                summary
            ) VALUES (
                :name,
                :summary
            )
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':summary', $summary, PDO::PARAM_STR);
        $stmt->execute();
    }

    public static function update(int $id, string $name, string $summary): void {
        $pdo = get_db();

        $sql = '
            UPDATE 
                lastbullet_skills
            SET 
                name = :name,
                summary = :summary
            WHERE 
                id = :id
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':summary', $summary, PDO::PARAM_STR);
        $stmt->execute();
    }

    public static function delete(int $id): void {
        $pdo = get_db();

        $sql = '
            DELETE FROM 
                lastbullet_skills
            WHERE 
                id = :id
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>