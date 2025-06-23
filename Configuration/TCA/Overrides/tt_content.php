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
