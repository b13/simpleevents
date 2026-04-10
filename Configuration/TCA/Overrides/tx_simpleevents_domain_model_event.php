<?php
if ((new \TYPO3\CMS\Core\Information\Typo3Version())->getMajorVersion() < 14) {
    $GLOBALS['TCA']['tx_simpleevents_domain_model_event']['ctrl']['searchFields'] = 'title,description,location,audience,url';
}