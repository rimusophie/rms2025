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
}

?>