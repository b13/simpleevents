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
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
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
        $events = $this->eventRepository->findUpcoming($this->settings['upcomingLimit']);
        /** @var TypoScriptFrontendController $frontendController */
        $frontendController = $this->request->getAttribute('frontend.controller');
        $this->view->assign('events', $events);
        $this->view->assign('contentObjectData', $this->configurationManager->getContentObject()->data);
        $frontendController->addCacheTags(['tx_simpleevents_domain_model_event']);
        return $this->htmlResponse();
    }

    /**
     * List all upcoming events
     */
    public function listAction(): ResponseInterface
    {
        $events = $this->eventRepository->findUpcoming();
        /** @var TypoScriptFrontendController $frontendController */
        $frontendController = $this->request->getAttribute('frontend.controller');

        $this->view->assign('events', $events);
        $this->view->assign('contentObjectData', $this->configurationManager->getContentObject()->data);
        $frontendController->addCacheTags(['tx_simpleevents_domain_model_event']);
        return $this->htmlResponse();
    }

}
