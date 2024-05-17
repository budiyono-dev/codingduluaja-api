<?php


return [
    'enable_api_debug_response' => (bool) env('ENABLE_API_DEBUG_RESPONSE', false),
    'init_su_url' => (string) env('INIT_SU_URL', 'VzNPBNLaNdRGyrrhsKtnLOctOTamPaEu'),
    'seeder_user_api_qty' => (int) env('SEEDER_USER_API_QTY', 5),
    'page_size' => (int) env('PAGINATION_PAGE_SIZE', 5),
    'app_version' => (string) env('APP_VERSION', '1.0.0'),
    'default_password' => (string) env('DEFAULT_PASSWORD', 'Admin#2024')
];
