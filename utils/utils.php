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

?>