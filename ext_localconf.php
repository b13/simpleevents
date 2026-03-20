<?php

defined('TYPO3') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Simpleevents',
    'upcoming',
    [\B13\Simpleevents\Controller\EventController::class => 'upcoming'],
    [],
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Simpleevents',
    'list',
    [\B13\Simpleevents\Controller\EventController::class => 'list'],
    [],
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
