<?php

/**
 * Enumの選択肢を返すためのトレイト
 */
trait EnumSelectable {
    /**
     * Enumの値を選択肢として返す
     *
     * @return array
     */
    public static function toSelectOptions(): array {
        $options = [];
        foreach (self::cases() as $case) {
            $options[$case->value] = $case->label();
        }
        return $options;
    }
}

/**
 * 入力値が空またはnullかどうかをチェックする関数
 *
 * @param mixed $value チェックする値
 * @return bool 空またはnullならtrue、そうでなければfalse
 */
function isRmsEmptyOrNull($value): bool {
    if(!empty($value)) {
        return false;
    }
    // 0は空ではないとみなす
    if($value === 0 || $value === '0') {
        return false;
    }
    return true;
}

?>