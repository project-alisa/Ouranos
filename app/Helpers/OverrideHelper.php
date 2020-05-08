<?php
if(!function_exists('__')){
    /**
     * 翻訳関数(空文字列時のフォールバック付)
     *
     * @param  string|null  $key
     * @param  array  $replace
     * @param  string|null  $locale
     * @return string|array|null
     * @see \Illuminate\Translation\Translator
     */
    function __($key = null, $replace = [], $locale = null)
    {
        if (is_null($key)) {
            return $key;
        }

        $get = trans($key, $replace, $locale);

        return $get ?: trans($key, $replace, config('app.fallback_locale'));
    }
}
