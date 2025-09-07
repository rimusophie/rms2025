<?php

require_once(__DIR__ . '/../../utils/constants.php');

class QualificationCommon {
    const KIND = Constants::KIND_QUALIFICATION;

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
    const PAGE_ITEM_ACQUISITION_DATE = '取得日';
    const PAGE_ITEM_NAME = '名称';

    const HTML_NAME_ACQUISITION_DATE = 'receive_date';
    const HTML_NAME_NAME = 'name';

    /**
     * メッセージ
     */
    const MESSAGE_CREATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_CREATE . 'しました。';
    const MESSAGE_UPDATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_UPDATE . 'しました。';
    const MESSAGE_DELETE_SUCCESS = self::KIND . 'を' . Constants::PAGE_DELETE . 'しました。';

    /**
     * ファイル名
     */
    const FILE_LIST = 'qualification_list.php';
    const FILE_ADD = 'qualification_add.php';
    const FILE_EDIT = 'qualification_edit.php';
    const FILE_CREATE = 'qualification_create.php';
    const FILE_UPDATE = 'qualification_update.php';
    const FILE_DELETE = 'qualification_delete.php';

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
                q.id AS id,
                q.name AS name,
                q.acquisition_date AS acquisition_date
            FROM
                qualifications AS q 
            ORDER BY 
                q.acquisition_date DESC
        ';
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get(int $id): ?array {
        $pdo = get_db();
        $sql = '
            SELECT 
                q.id AS id, 
                q.acquisition_date AS acquisition_date, 
                q.name AS name
            FROM 
                qualifications AS q
            WHERE 
                id = :id
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $qualification = $stmt->fetch(PDO::FETCH_ASSOC);
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
            INSERT INTO qualifications (
                acquisition_date,
                name
            ) VALUES (
                :acquisition_date,
                :name
            )
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':acquisition_date', $_POST['acquisition_date'], PDO::PARAM_STR);
        $stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
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
                qualifications
            SET
                acquisition_date = :acquisition_date,
                name = :name
            WHERE 
                id = :id
        ';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $stmt->bindValue(':acquisition_date', $_POST['acquisition_date'], PDO::PARAM_STR);
        $stmt->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public static function delete(int $id): void {
        $pdo = get_db();

        $sql = '
            DELETE FROM 
                qualifications
            WHERE 
                id = :id
        ';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_POST[Constants::HTML_NAME_ID], PDO::PARAM_INT);
        $stmt->execute();
    }
}

?>