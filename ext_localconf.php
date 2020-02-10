<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'B13.Simpleevents',
    'upcoming',
    [
        'Event' => 'upcoming'
    ]
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'B13.Simpleevents',
    'list',
    [
        'Event' => 'list'
    ],
    [
        'Event' => 'list'
    ]
);
