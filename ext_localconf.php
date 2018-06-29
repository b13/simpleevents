<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'CMSExperts.Simpleevents',
    'upcoming',
    [
        'Event' => 'upcoming'
    ]
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'CMSExperts.Simpleevents',
    'list',
    [
        'Event' => 'list'
    ],
    [
        'Event' => 'list'
    ]
);
