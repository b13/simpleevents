<?php

declare(strict_types=1);

namespace B13\Simpleevents\Hooks;

/*
 * This file is part of TYPO3 CMS-based extension simpleevents by b13.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 */

use TYPO3\CMS\Core\Cache\Frontend\FrontendInterface;
use TYPO3\CMS\Core\DataHandling\DataHandler;

class DataHandlerCacheHook
{
    /**
     * @var FrontendInterface
     */
    protected $cachePages;

    public function __construct(FrontendInterface $cachePages)
    {
        $this->cachePages = $cachePages;
    }

    /**
     * @param DataHandler $dataHandler
     */
    public function processDatamap_afterDatabaseOperations($status, $table, $id, $fieldArray, DataHandler $dataHandler): void
    {
        if ($table === 'tx_simpleevents_domain_model_event') {
            $this->cachePages->flushByTag('tx_simpleevents_domain_model_event');
            $this->cachePages->flushByTag('tx_simpleevents_domain_model_event_' . $id);
        }
    }
}
