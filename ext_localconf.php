<?php

defined('TYPO3') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Simpleevents',
    'upcoming',
    [\B13\Simpleevents\Controller\EventController::class => 'upcoming']
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Simpleevents',
    'list',
    [\B13\Simpleevents\Controller\EventController::class => 'list']
);
// should be changed, when v12 support is dropped
// \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
