<?php

require_once(__DIR__ . '/../../utils/constants.php');

class ResumeCommon {
    const KIND = Constants::KIND_RESUME;

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
    const PAGE_ITEM_TITLE = '案件名';
    const PAGE_ITEM_SUMMARY = '概要';
    const PAGE_ITEM_START_DATE = '開始日';
    const PAGE_ITEM_END_DATE = '終了日';
    const PAGE_ITEM_SKILLS = 'スキル';

    const HTML_NAME_TITLE = 'title';
    const HTML_NAME_SUMMARY = 'summary';
    const HTML_NAME_START_DATE = 'start_date';
    const HTML_NAME_END_DATE = 'end_date';
    const HTML_NAME_SKILLS = 'skills';

    const COLS_TEXTAREA_SUMMARY = 20;
    const ROWS_TEXTAREA_SUMMARY = 5;

    /**
     * メッセージ
     */
    const MESSAGE_CREATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_CREATE . 'しました。';
    const MESSAGE_UPDATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_UPDATE . 'しました。';
    const MESSAGE_DELETE_SUCCESS = self::KIND . 'を' . Constants::PAGE_DELETE . 'しました。';

    /**
     * ファイル名
     */
    const FILE_LIST = 'resume_list.php';
    const FILE_ADD = 'resume_add.php';
    const FILE_EDIT = 'resume_edit.php';
    const FILE_CREATE = 'resume_create.php';
    const FILE_UPDATE = 'resume_update.php';
    const FILE_DELETE = 'resume_delete.php';
    
    /**
     * リンク
     */
    const HREF_LIST = Constants::PATH_CURRENT . self::FILE_LIST;
    const HREF_ADD = Constants::PATH_CURRENT . self::FILE_ADD;
    const HREF_EDIT = Constants::PATH_CURRENT . self::FILE_EDIT;
    const HREF_CREATE = Constants::PATH_CURRENT . self::FILE_CREATE;
    const HREF_UPDATE = Constants::PATH_CURRENT . self::FILE_UPDATE;
    const HREF_DELETE = Constants::PATH_CURRENT . self::FILE_DELETE;

    public static function list(): array {
        $pdo = get_db();
        $sql = '
            SELECT 
                r.id AS id,
                r.title AS title,
                r.summary AS summary,
                r.start_date AS start_date,
                r.end_date AS end_date
            FROM
                resumes AS r 
            ORDER BY 
                r.start_date DESC, 
                r.end_date DESC, 
                r.title ASC
        ';
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get(int $id): ?array {
        $pdo = get_db();
        $sql = '
            SELECT 
                r.id AS id,  
                r.title AS title,
                r.summary AS summary,
                r.start_date AS start_date,
                r.end_date AS end_date,
                rs.skill_ids AS skill_ids
            FROM 
                resumes AS r
                LEFT JOIN (
                    SELECT 
                        resume_id, 
                        GROUP_CONCAT(skill_id) AS skill_ids
                    FROM 
                        resume_skills 
                    GROUP BY 
                        resume_id
                ) AS rs ON r.id = rs.resume_id
            WHERE 
                r.id = :id
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $resume = $stmt->fetch(PDO::FETCH_ASSOC);
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
            INSERT INTO resumes (
                title,
                summary,
                start_date,
                end_date
            ) VALUES (
                :title,
                :summary,
                :start_date,
                :end_date
            )
        ';

        $pdo->beginTransaction();

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
        $stmt->bindValue(':summary', $_POST['summary'], PDO::PARAM_STR);
        $stmt->bindValue(':start_date', $_POST['start_date'], PDO::PARAM_STR);
        $stmt->bindValue(':end_date', $_POST['end_date'], PDO::PARAM_STR);
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
                resumes
            SET
                title = :title,
                summary = :summary,
                start_date = :start_date,
                end_date = :end_date
            WHERE 
                id = :id
        ';

        $pdo->beginTransaction();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $stmt->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
        $stmt->bindValue(':summary', $_POST['summary'], PDO::PARAM_STR);
        $stmt->bindValue(':start_date', $_POST['start_date'], PDO::PARAM_STR);
        $stmt->bindValue(':end_date', $_POST['end_date'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public static function delete(int $id): void {
        $pdo = get_db();

        $sql = '
            DELETE FROM 
                resumes
            WHERE 
                id = :id
        ';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_POST[Constants::HTML_NAME_ID], PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>