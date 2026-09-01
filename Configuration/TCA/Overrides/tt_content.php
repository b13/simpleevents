<?php

use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItemGroup(
    'tt_content',
    'CType',
    'simpleevents',
    'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:tt_content.group.simpleevents',
    'after:plugins'
);

ExtensionUtility::registerPlugin(
    'Simpleevents',
    'upcoming',
    'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:plugin.simpleevents_upcoming.title',
    'actions-calendar',
    'simpleevents',
    'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:plugin.simpleevents_upcoming.description',
);

ExtensionUtility::registerPlugin(
    'Simpleevents',
    'list',
    'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:plugin.simpleevents_list.title',
    'actions-calendar',
    'simpleevents',
    'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:plugin.simpleevents_list.description',
);

ExtensionUtility::registerPlugin(
    'Simpleevents',
    'selectedList',
    'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:plugin.simpleevents_selectedlist.title',
    'actions-calendar',
    'simpleevents',
    'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:plugin.simpleevents_selectedlist.description',
    'FILE:EXT:simpleevents/Configuration/FlexForms/SimpleEventsSelectedList.xml'
);

$GLOBALS['TCA']['tt_content']['types']['simpleevents_upcoming']['showitem'] = '
        --palette--;;headers,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:plugin,
        pages, recursive,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:appearance,
        --palette--;;frames,
        --palette--;;appearanceLinks,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
        categories,
    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
';
$GLOBALS['TCA']['tt_content']['types']['simpleevents_list']['showitem'] = $GLOBALS['TCA']['tt_content']['types']['simpleevents_upcoming']['showitem'];