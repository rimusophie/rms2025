<?php

require_once(__DIR__ . '/../../utils/constants.php');

class IncomeCommon {
    const KIND = '所得';

    const PAGE_TITLE_LIST = self::KIND . Constants::PAGE_LIST;
    const PAGE_TITLE_ADD = self::KIND . Constants::PAGE_ADD;
    const PAGE_TITLE_EDIT = self::KIND . Constants::PAGE_EDIT;
    const PAGE_TITLE_DELETE = self::KIND . Constants::PAGE_DELETE;

    const PAGE_ITEM_RECEIVE_DATE = '日付';
    const PAGE_ITEM_TYPE = '種別';
    const PAGE_ITEM_TOTAL_AMOUNT_PAID = '総支給額';
    const PAGE_ITEM_INCOME_TAX = '所得税';
    const PAGE_ITEM_RESIDENT_TAX = '住民税';
    const PAGE_ITEM_SOCIAL_INSURANCE_PREMIUMS = '社会保険料';
    const PAGE_ITEM_OTHER = 'その他';
    const PAGE_ITEM_DISPOSABLE_INCOME = '差引';
    const PAGE_ITEM_PAYER = '支払者';

    const MESSAGE_CREATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_CREATE . 'しました。';
    const MESSAGE_UPDATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_UPDATE . 'しました。';
    const MESSAGE_DELETE_SUCCESS = self::KIND . 'を' . Constants::PAGE_DELETE . 'しました。';

    const HREF_LIST = './income_list.php';
    const HREF_ADD = './income_add.php';
    const HREF_EDIT = './income_edit.php';
    const HREF_CREATE = './income_create.php';
    const HREF_UPDATE = './income_update.php';
    const HREF_DELETE = './income_delete.php';
}

?>