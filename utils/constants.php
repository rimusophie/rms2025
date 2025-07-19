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
     * パス
     */
    const PATH_CURRENT = './';
    
    /**
     * 種別
     */
    const KIND_INCOME = '所得';
    const KIND_QUALIFICATION = '資格・検定';
    const KIND_SKILL = 'スキル';

    /**
     * メッセージ
     */
    const MESSAGE_ERROR = 'エラーが発生しました。';

    /**
     * 入力制限
     */
    const INPUT_INT_MAX = 2147483647;       // 32ビット符号つきint最大値
    const INPUT_INT_MIN = -2147483648;      // 32ビット符号つきint最小値
    const INPUT_NAME_MAX_LENGTH = 100;  // 名称の最大文字数
}

?>