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
     * 共通名称
     */
    const HTML_NAME_ID = 'id';
    const HTML_NAME_LABEL = 'label';
    const HTML_NAME_VALUE = 'value';
    
    /**
     * 種別
     */
    const KIND_INCOME = '所得';
    const KIND_QUALIFICATION = '資格・検定';
    const KIND_SKILL = 'スキル';
    const KIND_RESUME = '職務経歴';
    const KIND_LASTBULLET_MEMORIA = 'ラスバレ メモリア';
    const KIND_LASTBULLET_SKILL = 'ラスバレ スキル';
    const KIND_LASTBULLET_BATTLE_RECORD = 'ラスバレ レギマ/レギリ記録';

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
    const INPUT_SHORT_SUMMARY_MAX_LENGTH = 200; // 概要(説明程度の長さ)の最大文字数
}

?>