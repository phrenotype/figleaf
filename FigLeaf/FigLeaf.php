<?php

namespace FigLeaf;

/**
 * Csrf for humans - robots and unwanted humans left out.
 */
class FigLeaf
{
    const TOKEN_NAME = '__chase_figleaf_token';

    private static $__token;

    private static function generate(bool $regenerate = true): string
    {
        $tmp_token = bin2hex(random_bytes(50));
        if (isset($_SESSION)) {
            if (session_status() == PHP_SESSION_NONE) {
                session_name('figleaf_session');
                session_start();
            } else {
                session_regenerate_id();
            }
            if (self::$__token == null || $regenerate) {
                self::$__token = $tmp_token;
                $_SESSION[self::TOKEN_NAME] = self::$__token;
            }
        }
        return $tmp_token;
    }

    /**
     * Get a csrf token string.
     * 
     * @param bool $regenerate Optional. This determines whether a new value should be generated or the old one returned.
     * 
     * @return string
     */
    public static function token(bool $regenerate = true): string
    {
        return self::generate($regenerate);
    }

    /**
     * Get a csrf token in an html input field.
     * 
     * @param bool $regenerate This determines whether a new value should be generated or the old one returned.
     * 
     * @return string
     */
    public static function input(bool $regenerate = true): string
    {
        $token = self::generate($regenerate);
        return '<input type="hidden" name="' . self::TOKEN_NAME . '" value="' . $token . '"/>';
    }

    /**
     * Validate the csrf token.
     * 
     * @param array $global
     * 
     * @return Validator
     */
    public static function validate(array $global): Validator
    {
        return new Validator($_SESSION[self::TOKEN_NAME], ($global[self::TOKEN_NAME] ?? ''));
    }
}
