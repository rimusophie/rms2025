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