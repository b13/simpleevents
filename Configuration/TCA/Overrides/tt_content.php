<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

ExtensionUtility::registerPlugin(
    'Simpleevents',
    'upcoming',
    'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:plugin.upcoming',
    'actions-calendar'
);

ExtensionUtility::registerPlugin(
    'Simpleevents',
    'list',
    'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:plugin.list',
    'actions-calendar'
);

$GLOBALS['TCA']['tt_content']['types']['simpleevents_upcoming']['showitem'] = '--palette--;;headers,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                    --palette--;;frames,
                    --palette--;;appearanceLinks,
                    ,pages,recursive,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                    categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended';
$GLOBALS['TCA']['tt_content']['types']['simpleevents_list']['showitem'] = $GLOBALS['TCA']['tt_content']['types']['simpleevents_upcoming']['showitem'];