<?php

require_once(__DIR__ . '/../../utils/constants.php');

class SkillCommon {
    const KIND = 'スキル';

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

    /**
     * メッセージ
     */
    const MESSAGE_CREATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_CREATE . 'しました。';
    const MESSAGE_UPDATE_SUCCESS = self::KIND . 'を' . Constants::PAGE_UPDATE . 'しました。';
    const MESSAGE_DELETE_SUCCESS = self::KIND . 'を' . Constants::PAGE_DELETE . 'しました。';

    /**
     * リンク
     */
    const HREF_LIST = './skill_list.php';
    const HREF_ADD = './skill_add.php';
    const HREF_EDIT = './skill_edit.php';
    const HREF_CREATE = './skill_create.php';
    const HREF_UPDATE = './skill_update.php';
    const HREF_DELETE = './skill_delete.php';
}

?>