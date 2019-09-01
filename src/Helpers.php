<?php

if (!function_exists('js_trans')) {
    function js_trans($translations = null)
    {
        if ($translations) {
            return config()->set('js_trans', array_merge($translations, config('js_trans', [])));
        }

        $json = json_encode(config('js_trans', []));

        return "
            <script>
                window.translations = $json

                window.__ = function(term) {
                    if (window.translations.hasOwnProperty(term)) {
                        return window.translations[term];
                    }

                    return term;
                }
            </script>
        ";
    }
}
