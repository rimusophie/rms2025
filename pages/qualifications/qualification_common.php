<?php

require_once(__DIR__ . '/../../utils/constants.php');

class QualificationCommon {
    const KIND = '資格・検定';

    const PAGE_TITLE_LIST = self::KIND . Constants::PAGE_LIST;
    const PAGE_TITLE_ADD = self::KIND . Constants::PAGE_ADD;
    const PAGE_TITLE_EDIT = self::KIND . Constants::PAGE_EDIT;
    const PAGE_TITLE_DELETE = self::KIND . Constants::PAGE_DELETE;

    const PAGE_ITEM_ACQUISITION_DATE = '取得日';
    const PAGE_ITEM_NAME = '名称';

    const MESSAGE_CREATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_CREATE . 'しました。';
    const MESSAGE_UPDATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_UPDATE . 'しました。';
    const MESSAGE_DELETE_SUCCESS = self::KIND . 'を' . Constants::PAGE_DELETE . 'しました。';

    const HREF_LIST = './qualification_list.php';
    const HREF_ADD = './qualification_add.php';
    const HREF_EDIT = './qualification_edit.php';
    const HREF_CREATE = './qualification_create.php';
    const HREF_UPDATE = './qualification_update.php';
    const HREF_DELETE = './qualification_delete.php';
}

?>