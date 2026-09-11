<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Namespace
    |--------------------------------------------------------------------------
    */
    'namespace' => 'App',

    /*
    |--------------------------------------------------------------------------
    | Application Admin URL
    |--------------------------------------------------------------------------
    */
    'admin_app_url' => env('ADMIN_APP_URL', null),
    'admin_app_path' => ltrim(env('ADMIN_APP_PATH', env('ADMIN_APP_URL', null) ? '' : 'admin'), '/'),

    /*
    |--------------------------------------------------------------------------
    | Application strict url handling
    |--------------------------------------------------------------------------
    */
    'admin_app_strict' => env('ADMIN_APP_STRICT', false),

    /*
    |--------------------------------------------------------------------------
    | Application Admin Route Name
    |--------------------------------------------------------------------------
    */
    'admin_route_name_prefix' => env('ADMIN_ROUTE_NAME_PREFIX', 'twill.'),

    /*
    |--------------------------------------------------------------------------
    | Application Admin Title Suffix
    |--------------------------------------------------------------------------
    */
    'admin_app_title_suffix' => env('ADMIN_APP_TITLE_SUFFIX', 'Twill'),

    /*
    |--------------------------------------------------------------------------
    | Admin subdomain routing support
    |--------------------------------------------------------------------------
    */
    'support_subdomain_admin_routing' => false,
    'admin_app_subdomain' => 'admin',
    'active_subdomain' => null,

    /*
    |--------------------------------------------------------------------------
    | Application Admin Route and domain pattern
    |--------------------------------------------------------------------------
    */
    'admin_route_patterns' => [
    ],

    /*
    |--------------------------------------------------------------------------
    | Prevent the routing system to duplicate prefix and module on route names
    |--------------------------------------------------------------------------
    */
    'allow_duplicates_on_route_names' => true,

    /*
    |--------------------------------------------------------------------------
    | Twill middleware group configuration
    |--------------------------------------------------------------------------
    */
    'admin_middleware_group' => 'web',

    /*
    |--------------------------------------------------------------------------
    | Twill default tables naming configuration
    |--------------------------------------------------------------------------
    */
    'blocks_table' => 'twill_blocks',
    'features_table' => 'twill_features',
    'fileables_table' => 'twill_fileables',
    'files_table' => 'twill_files',
    'mediables_table' => 'twill_mediables',
    'medias_table' => 'twill_medias',
    'password_resets_table' => 'twill_password_resets',
    'related_table' => 'twill_related',
    'settings_table' => 'twill_settings',
    'tagged_table' => 'twill_tagged',
    'tags_table' => 'twill_tags',
    'users_oauth_table' => 'twill_users_oauth',
    'users_table' => 'twill_users',
    'permissions_table' => 'permissions',
    'roles_table' => 'roles',

    /*
    |--------------------------------------------------------------------------
    | Twill migrations configuration
    |--------------------------------------------------------------------------
    */
    'migrations_use_big_integers' => true,
    'load_default_migrations' => true,

    /*
    |--------------------------------------------------------------------------
    | Twill Auth related configuration
    |--------------------------------------------------------------------------
    */
    'auth_login_redirect_path' => null,

    'templates_on_frontend_domain' => false,

    'google_maps_api_key' => env('GOOGLE_MAPS_API_KEY'),

    'custom_auth_service_provider' => false,

    /*
    |--------------------------------------------------------------------------
    | Twill FE Application configuration
    |--------------------------------------------------------------------------
    */
    'js_namespace' => 'TWILL',
    'dev_mode' => env('TWILL_DEV_MODE', false),
    'dev_mode_url' => env('TWILL_DEV_MODE_URL', 'http://localhost:8080'),
    'public_directory' => env('TWILL_ASSETS_DIR', 'assets/twill'),
    'manifest_file' => 'twill-manifest.json',
    'vendor_path' => 'vendor/area17/twill',
    'custom_components_resource_path' => 'assets/js/components',
    'vendor_components_resource_path' => 'assets/vendor/js/components',
    'build_timeout' => 300,
    'internal_icons' => [
        'content-editor.svg',
        'close_modal.svg',
        'edit_large.svg',
        'google-sign-in.svg',
    ],

    /*
    |--------------------------------------------------------------------------
    | Twill app locale
    |--------------------------------------------------------------------------
    */
    'locale' => 'en',
    'fallback_locale' => 'en',
    'available_user_locales' => [
        'en', 'ar', 'bs', 'cs', 'de', 'es', 'fr', 'it', 'nl', 'no',
        'pl', 'pt', 'ru', 'sl', 'tr', 'uk', 'zh-Hans',
    ],

    /*
    |--------------------------------------------------------------------------
    | When a singleton is not seeded, you can use this flag to automatically seed it.
    |--------------------------------------------------------------------------
    */
    'auto_seed_singletons' => true,

    /*
    |--------------------------------------------------------------------------
    | The default crops that can be used in models.
    |--------------------------------------------------------------------------
    */
    'default_crops' => [
        'cover' => [
            'default' => [
                ['name' => 'default', 'ratio' => 16 / 9],
            ],
            'mobile' => [
                ['name' => 'mobile', 'ratio' => 1],
            ],
            'flexible' => [
                ['name' => 'free', 'ratio' => 0],
                ['name' => 'landscape', 'ratio' => 16 / 9],
                ['name' => 'portrait', 'ratio' => 3 / 5],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Debug views
    |--------------------------------------------------------------------------
    */
    'debug' => env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Strict error throwing
    |--------------------------------------------------------------------------
    */
    'strict' => env('TWILL_STRICT', false),

    /*
    |--------------------------------------------------------------------------
    | Base classes for automatic generation of Modules and Capsules
    |--------------------------------------------------------------------------
    */
    'base_model' => A17\Twill\Models\Model::class,
    'base_translation_model' => A17\Twill\Models\Model::class,
    'base_slug_model' => A17\Twill\Models\Model::class,
    'base_revision_model' => A17\Twill\Models\Revision::class,
    'base_repository' => A17\Twill\Repositories\ModuleRepository::class,
    'base_controller' => A17\Twill\Http\Controllers\Admin\ModuleController::class,
    'base_nested_controller' => A17\Twill\Http\Controllers\Admin\NestedModuleController::class,
    'base_singleton_controller' => A17\Twill\Http\Controllers\Admin\SingletonModuleController::class,
    'base_request' => A17\Twill\Http\Requests\Admin\Request::class,

    /*
    |--------------------------------------------------------------------------
    | Block Editor
    |--------------------------------------------------------------------------
    */
    'block_editor' => [
    // ...existing config...
    'crops' => [
        'slide' => [
            'image' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 16 / 9, // adjust to your slider's aspect ratio
                    ],
                ],
            ],
            'video_thumbnail' => [
                'default' => [
                    [
                        'name' => 'default',
                        'ratio' => 16 / 9,
                    ],
                ],
            ],
        ],
    ],
],

];
