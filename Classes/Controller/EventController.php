<?php

declare(strict_types=1);

namespace B13\Simpleevents\Controller;

/*
 * This file is part of TYPO3 CMS-based extension simpleevents by b13.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 */

use B13\Simpleevents\Domain\Repository\EventRepository;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Core\Cache\CacheDataCollector;
use TYPO3\CMS\Core\Cache\CacheTag;
use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

/**
 * Main controller for rendering upcoming events
 */
class EventController extends ActionController
{
    public function __construct(protected EventRepository $eventRepository)
    {}

    /**
     * Show the next upcoming events
     * amount set by TypoScript setting 'upcomingLimit'
     */
    public function upcomingAction(): ResponseInterface
    {
        $events = $this->eventRepository->findUpcoming((int)($this->settings['upcomingLimit'] ?? 0));
        $this->view->assign('events', $events);
        /** @var ContentObjectRenderer $contentObject */
        $contentObject = $this->request->getAttribute('currentContentObject');
        $this->view->assign('contentObjectData', $contentObject->data);
        $this->addCacheTag();
        return $this->htmlResponse();
    }

    /**
     * List all upcoming events
     */
    public function listAction(): ResponseInterface
    {
        $events = $this->eventRepository->findUpcoming();
        $this->view->assign('events', $events);
        /** @var ContentObjectRenderer $contentObject */
        $contentObject = $this->request->getAttribute('currentContentObject');
        $this->view->assign('contentObjectData', $contentObject->data);
        $this->addCacheTag();
        return $this->htmlResponse();
    }

    protected function addCacheTag(): void
    {
        if (GeneralUtility::makeInstance(Typo3Version::class)->getMajorVersion() < 13) {
            /** @var TypoScriptFrontendController $frontendController */
            $frontendController = $this->request->getAttribute('frontend.controller');
            $frontendController->addCacheTags(['tx_simpleevents_domain_model_event']);
        } else {
            /** @var CacheDataCollector $cacheDataCollector */
            $cacheDataCollector = $this->request->getAttribute('frontend.cache.collector');
            $cacheDataCollector->addCacheTags(...array_map(fn (string $tag) => new CacheTag($tag), ['tx_simpleevents_domain_model_event']));
        }
    }

}
