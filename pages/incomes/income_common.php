<?php

require_once(__DIR__ . '/../../utils/constants.php');
require_once(__DIR__ . '/../../utils/utils.php');

class IncomeCommon {
    const KIND = Constants::KIND_INCOME;

    /** 
     * ページタイトル
     **/ 
    const PAGE_TITLE_LIST = self::KIND . Constants::PAGE_LIST;
    const PAGE_TITLE_ADD = self::KIND . Constants::PAGE_ADD;
    const PAGE_TITLE_EDIT = self::KIND . Constants::PAGE_EDIT;
    const PAGE_TITLE_DELETE = self::KIND . Constants::PAGE_DELETE;

    /**
     * 表示名
     */
    const PAGE_ITEM_RECEIVE_DATE = '日付';
    const PAGE_ITEM_TYPE = '種別';
    const PAGE_ITEM_TOTAL_AMOUNT_PAID = '総支給額';
    const PAGE_ITEM_INCOME_TAX = '所得税';
    const PAGE_ITEM_RESIDENT_TAX = '住民税';
    const PAGE_ITEM_SOCIAL_INSURANCE_PREMIUMS = '社会保険料';
    const PAGE_ITEM_OTHER = 'その他';
    const PAGE_ITEM_DISPOSABLE_INCOME = '差引';
    const PAGE_ITEM_PAYER = '支払者';

    const HTML_NAME_RECEIVE_DATE = 'receive_date';
    const HTML_NAME_TYPE = 'type';
    const HTML_NAME_TOTAL_AMOUNT_PAID = 'total_amount_paid';
    const HTML_NAME_INCOME_TAX = 'income_tax';
    const HTML_NAME_RESIDENT_TAX = 'resident_tax';
    const HTML_NAME_SOCIAL_INSURANCE_PREMIUMS = 'social_insurance_premiums';
    const HTML_NAME_OTHER = 'other';
    const HTML_NAME_DISPOSABLE_INCOME = 'disposable_income';
    const HTML_NAME_PAYER = 'payer';

    /**
     * メッセージ
     */
    const MESSAGE_CREATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_CREATE . 'しました。';
    const MESSAGE_UPDATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_UPDATE . 'しました。';
    const MESSAGE_DELETE_SUCCESS = self::KIND . 'を' . Constants::PAGE_DELETE . 'しました。';

    /**
     * ファイル名
     */
    const FILE_LIST = 'income_list.php';
    const FILE_ADD = 'income_add.php';
    const FILE_EDIT = 'income_edit.php';
    const FILE_CREATE = 'income_create.php';
    const FILE_UPDATE = 'income_update.php';
    const FILE_DELETE = 'income_delete.php';

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
                i.id AS id,
                i.receive_date AS receive_date,
                i.type AS type,
                i.total_amount_paid AS total_amount_paid,
                i.income_tax AS income_tax,
                i.resident_tax AS resident_tax,
                i.social_insurance_premiums AS social_insurance_premiums,
                i.other AS other,
                i.total_amount_paid - i.income_tax - i.resident_tax - i.social_insurance_premiums + i.other AS disposable_income,
                i.payer AS payer
            FROM
                incomes AS i 
            ORDER BY 
                i.receive_date DESC
        ';
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function get(int $id): ?array {
        $pdo = get_db();
        $sql = '
            SELECT 
                i.id AS id, 
                i.receive_date AS receive_date, 
                i.type AS type, 
                i.total_amount_paid AS total_amount_paid, 
                i.income_tax AS income_tax, 
                i.resident_tax AS resident_tax, 
                i.social_insurance_premiums AS social_insurance_premiums, 
                i.other AS other, 
                i.payer AS payer 
            FROM 
                incomes AS i
            WHERE i.id = :id
        ';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
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
            INSERT INTO incomes 
            (
                receive_date,
                type,
                total_amount_paid,
                income_tax,
                resident_tax,
                social_insurance_premiums,
                other,
                payer
            ) VALUES (
                :receive_date,
                :type,
                :total_amount_paid,
                :income_tax,
                :resident_tax,
                :social_insurance_premiums,
                :other,
                :payer
            )'
        ;
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':receive_date', $receive_date, PDO::PARAM_STR);
        $stmt->bindValue(':type', $type, PDO::PARAM_INT);
        $stmt->bindValue(':total_amount_paid', $total_amount_paid, PDO::PARAM_INT);
        $stmt->bindValue(':income_tax', $income_tax, PDO::PARAM_INT);
        $stmt->bindValue(':resident_tax', $resident_tax, PDO::PARAM_INT);
        $stmt->bindValue(':social_insurance_premiums', $social_insurance_premiums, PDO::PARAM_INT);
        $stmt->bindValue(':other', $other, PDO::PARAM_INT);
        $stmt->bindValue(':payer', $payer, PDO::PARAM_STR);
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
                incomes
            SET
                receive_date = :receive_date,
                type = :type,
                total_amount_paid = :total_amount_paid,
                income_tax = :income_tax,
                resident_tax = :resident_tax,
                social_insurance_premiums = :social_insurance_premiums,
                other = :other,
                payer = :payer
            WHERE 
                id = :id
        ';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':receive_date', $receive_date, PDO::PARAM_STR);
        $stmt->bindValue(':type', $type, PDO::PARAM_INT);
        $stmt->bindValue(':total_amount_paid', $total_amount_paid, PDO::PARAM_INT);
        $stmt->bindValue(':income_tax', $income_tax, PDO::PARAM_INT);
        $stmt->bindValue(':resident_tax', $resident_tax, PDO::PARAM_INT);
        $stmt->bindValue(':social_insurance_premiums', $social_insurance_premiums, PDO::PARAM_INT);
        $stmt->bindValue(':other', $other, PDO::PARAM_INT);
        $stmt->bindValue(':payer', $payer, PDO::PARAM_STR);
        $stmt->execute();
    }

    public static function delete(int $id): void {
        $pdo = get_db();

        $sql = '
            DELETE FROM 
                incomes
            WHERE 
                id = :id
        ';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}

/**
 * 種別の列挙型
 */
enum IncomeType: int {
    use EnumSelectable;

    case Unknown = 0;
    case MonthlySalary = 1;
    case Bonus = 2;

    public function label(): string {
        return match($this) {
            IncomeType::Unknown => '不明',
            IncomeType::MonthlySalary => '月給',
            IncomeType::Bonus => '賞与',
        };
    }
}
?>