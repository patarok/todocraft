<?php
/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/GeneralConfig.php.
 *
 * @see \craft\config\GeneralConfig
 */

use craft\helpers\App;

$isDev = App::env('ENVIRONMENT') === 'dev';
$isProd = App::env('ENVIRONMENT') === 'production';

return [
    // Global settings
    '*' => [
        // Default Week Start Day (0 = Sunday, 1 = Monday...)
        'defaultWeekStartDay' => 1,

        // allow Icon-File Extensions for upload
        'extraAllowedFileExtensions' => 'ico',

        // Whether generated URLs should omit "index.php"
        'omitScriptNameInUrls' => true,

        'enableGql' => false,

        // Control panel trigger word
        'cpTrigger' => App::env('CP_TRIGGER') ?: 'admin',

        // The secure key Craft will use for hashing and encrypting data
        'securityKey' => App::env('SECURITY_KEY'),

        // Whether to save the project config out to config/project.yaml
        // (see https://docs.craftcms.com/v3/project-config.html)
        'useProjectConfigFile' => true,
        'limitAutoSlugsToAscii' => true,
        'runQueueAutomatically' => false,
        'imageDriver' => 'imagick',
        // Default Image max with
        'imageMaxWith' => '1920',
        // Default quality in Percent
        'imageQuality' => '80',
        // Default crop position
        'imageCropPosition' => 'center-center'
    ],
    // // -- VORLAEUFIG GESETZT > Eintrag in 'index.php' ist veraltet --
    // 'aliases' => [
    //     '@rootUrl' => craft\helpers\App::env('ROOT_URL'),
    // ],

    // Dev environment settings
    'dev' => [
        // Dev Mode (see https://craftcms.com/guides/what-dev-mode-does)
        'devMode' => true,
        'enableTemplateCaching' => false,
        'isSystemLive' => true,
        'testToEmailAddress' => 'p.patoschka@pc-web.at',
//        'translationDebugOutput' => true
    ],

    // Staging environment settings
    'staging' => [
        // Set this to `false` to prevent administrative changes from being made on staging
        'allowAdminChanges' => true,
        'allowUpdates'       => false,
    ],

    // Production environment settings
    'production' => [
        // Set this to `false` to prevent administrative changes from being made on production
        'allowAdminChanges' => false,
        'allowUpdates'       => false,
    ],
];
