<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'CMSExperts.Simpleevents', 'upcoming', 'Veranstaltungen: Nächste Events (Upcoming)', 'EXT:simpleevents/ext_icon.png'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'CMSExperts.Simpleevents', 'list', 'Veranstaltungen: Alle Events (List)', 'EXT:simpleevents/ext_icon.png'
);