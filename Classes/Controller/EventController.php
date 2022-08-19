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
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

/**
 * Main controller for rendering upcoming events
 */
class EventController extends ActionController
{
    /**
     * @var EventRepository
     */
    protected $eventRepository;

    /**
     * @param EventRepository $eventRepository
     */
    public function injectEventRepository(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Show the next upcoming events
     * amount set by TypoScript setting 'upcomingLimit'
     */
    public function upcomingAction()
    {
        $events = $this->eventRepository->findUpcoming($this->settings['upcomingLimit']);
        $this->view->assign('events', $events);
        $this->view->assign('contentObjectData', $this->configurationManager->getContentObject()->data);
        $this->getFrontendController()->addCacheTags(['tx_simpleevents_domain_model_event']);
    }

    /**
     * List all upcoming events
     */
    public function listAction()
    {
        $events = $this->eventRepository->findUpcoming();

        $this->view->assign('events', $events);
        $this->view->assign('contentObjectData', $this->configurationManager->getContentObject()->data);
        $this->getFrontendController()->addCacheTags(['tx_simpleevents_domain_model_event']);
    }

    protected function getFrontendController(): TypoScriptFrontendController
    {
        return $GLOBALS['TSFE'];
    }
}
