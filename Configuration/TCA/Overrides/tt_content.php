<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'B13.Simpleevents',
    'upcoming',
    'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:plugin.upcoming',
    'EXT:simpleevents/Resources/Public/Icons/Extension.svg'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'B13.Simpleevents',
     'list',
     'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:plugin.list',
     'EXT:simpleevents/Resources/Public/Icons/Extension.svg'
);
