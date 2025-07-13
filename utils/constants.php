<?php

/**
 * 定数クラス
 */
class Constants {
    /**
     * ページ共通
     */
    const PAGE_LIST = '一覧';
    const PAGE_ADD = '追加';
    const PAGE_CREATE = '登録';
    const PAGE_EDIT = '編集';
    const PAGE_UPDATE = '更新';
    const PAGE_DELETE = '削除'; 
    const PAGE_OPERATION = '操作';

    /**
     * メッセージ
     */
    const MESSAGE_ERROR = 'エラーが発生しました。';

    /**
     * 入力制限
     */
    const INPUT_INT_MAX = 2147483647; // 32-bit signed integer max value
    const INPUT_INT_MIN = -2147483648; // 32-bit signed integer min
    const INPUT_NAME_MAX_LENGTH = 100; // 名称の最大文字数
}

?>