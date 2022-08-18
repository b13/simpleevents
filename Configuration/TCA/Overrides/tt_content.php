<?php
defined('TYPO3') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Simpleevents',
    'upcoming',
    'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:plugin.upcoming',
    'EXT:simpleevents/Resources/Public/Icons/Extension.svg'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Simpleevents',
     'list',
     'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:plugin.list',
     'EXT:simpleevents/Resources/Public/Icons/Extension.svg'
);
