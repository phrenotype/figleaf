<?php

namespace Chase\FigLeaf;

class FigLeaf
{
    const TOKEN_NAME = '__chase_figleaf_token';

    private static $__token;

    private static function generate(bool $regenerate = true): string
    {
        if (self::$__token == null || $regenerate) {
            self::$__token = bin2hex(random_bytes(30));
            $_SERVER[self::TOKEN_NAME] = self::$__token;
        }
        return self::$__token;
    }

    public static function token(bool $regenerate = true): string
    {
        return self::generate($regenerate);
    }

    public static function input(bool $regenerate = true): string
    {
        $token = self::generate($regenerate);
        return '<input type="hidden" name="' . self::TOKEN_NAME . '" value="' . $token . '"/>';
    }

    public static function validate(array $global): Validator
    {
        return new Validator($_SERVER[self::TOKEN_NAME], ($global[self::TOKEN_NAME] ?? ''));
    }
}
