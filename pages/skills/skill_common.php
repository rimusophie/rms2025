<?php

require_once(__DIR__ . '/../../utils/constants.php');
require_once(__DIR__ . '/../../utils/db.php');

class SkillCommon {
    const KIND = Constants::KIND_SKILL;

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
    const PAGE_ITEM_SORT_NO = '表示順';

    const HTML_NAME_NAME = 'name';
    const HTML_NAME_SORT_NO = 'sort_no';

    /**
     * メッセージ
     */
    const MESSAGE_CREATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_CREATE . 'しました。';
    const MESSAGE_UPDATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_UPDATE . 'しました。';
    const MESSAGE_DELETE_SUCCESS = self::KIND . 'を' . Constants::PAGE_DELETE . 'しました。';

    /**
     * ファイル名
     */
    const FILE_LIST = 'skill_list.php';
    const FILE_ADD = 'skill_add.php';
    const FILE_EDIT = 'skill_edit.php';
    const FILE_CREATE = 'skill_create.php';
    const FILE_UPDATE = 'skill_update.php';
    const FILE_DELETE = 'skill_delete.php';
    
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
     * ページタイトルを取得
     * @return object
     */
    public static function getSkills() {
        $pdo = get_db();
        $sql = '
            SELECT 
                s.id AS s_id,
                s.name AS s_name,
                s.sort_no AS s_sort_no
            FROM
                skills AS s 
            ORDER BY 
                s.sort_no ASC,
                s.name ASC
        ';
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }

    public static function list(): array {
        $pdo = get_db();
        $sql = '
            SELECT 
                s.id AS id,
                s.name AS name,
                s.sort_no AS sort_no
            FROM
                skills AS s 
            ORDER BY 
                s.sort_no ASC,
                s.name ASC
        ';
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }

    public static function get(int $id): ?array {
        $pdo = get_db();
        $sql = '
            SELECT 
                s.id AS id,  
                s.name AS name,
                s.sort_no AS sort_no
            FROM 
                skills AS s
            WHERE 
                id = :id
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $skill = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create(string $receive_date,
                                    int $type,
                                    int $total_amount_paid,
                                    int $income_tax,
                                    int $resident_tax,
                                    int $social_insurance_premiums,
                                    int $other,
                                    string $payer): void {
        $pdo = get_db();

        $sql = '
            INSERT INTO skills (
                name,
                sort_no
            ) VALUES (
                :name,
                :sort_no
            )
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
        $stmt->bindValue(':sort_no', $_POST['sort_no'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function update(int $id, 
                                    string $receive_date,
                                    int $type,
                                    int $total_amount_paid,
                                    int $income_tax,
                                    int $resident_tax,
                                    int $social_insurance_premiums,
                                    int $other,
                                    string $payer): void {
        $pdo = get_db();

        $sql = '
            UPDATE 
                skills
            SET
                name = :name,
                sort_no = :sort_no
            WHERE 
                id = :id
        ';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
        $stmt->bindValue(':sort_no', $_POST['sort_no'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function delete(int $id): void {
        $pdo = get_db();

        $sql = '
            DELETE FROM 
                skills
            WHERE 
                id = :id
        ';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_POST[Constants::HTML_NAME_ID], PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>