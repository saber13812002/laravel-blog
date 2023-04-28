<?php

return [
    'key' => env('TRANSLATION_IO_TOKEN'),
    'source_locale' => 'en',
    'target_locales' => ['fr', 'fa'],
    /* Directories to scan for Gettext strings */
    'gettext_parse_paths' => ['app', 'resources']
];
