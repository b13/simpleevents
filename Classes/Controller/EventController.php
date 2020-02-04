<?php
namespace CMSExperts\Simpleevents\Controller;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Main controller for rendering upcoming events
 */
class EventController extends ActionController
{

    /**
     * @var \CMSExperts\Simpleevents\Domain\Repository\EventRepository
     * @inject
     */
    protected $eventRepository;

    /**
     * Show the next upcoming events
     * amount set by TypoScript setting 'upcomingLimit'
     */
    public function upcomingAction()
    {
        $events = $this->eventRepository->findUpcoming($this->settings['upcomingLimit']);
        $this->view->assign('events', $events);
        $this->view->assign('contentObjectData', $this->configurationManager->getContentObject()->data);
    }

    /**
     * List all upcoming events
     */
    public function listAction()
    {
        $events = $this->eventRepository->findUpcoming();

        $this->view->assign('events', $events);
        $this->view->assign('contentObjectData', $this->configurationManager->getContentObject()->data);
    }
}
