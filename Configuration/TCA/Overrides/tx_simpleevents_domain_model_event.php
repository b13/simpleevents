<?php

defined('TYPO3') or die();


if ((\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Information\Typo3Version::class))->getMajorVersion() < 12) {

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
        'simpleevents',
        'tx_simpleevents_domain_model_event',
        'categories'
    );

    $GLOBALS['TCA']['tx_simpleevents_domain_model_event']['columns']['categories']['config']['renderType'] = 'selectSingle';
    $GLOBALS['TCA']['tx_simpleevents_domain_model_event']['columns']['categories']['config']['size'] = '1';
    $GLOBALS['TCA']['tx_simpleevents_domain_model_event']['columns']['categories']['config']['maxitems'] = '1';
    $GLOBALS['TCA']['tx_simpleevents_domain_model_event']['columns']['categories']['config']['items'][] = ['Standard', 0];
}