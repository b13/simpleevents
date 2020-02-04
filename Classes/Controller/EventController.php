<?php
namespace B13\Simpleevents\Controller;

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

use B13\Simpleevents\Domain\Repository\EventRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

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
     */
    public function upcomingAction()
    {
        $events = $this->eventRepository->findUpcoming($this->settings['upcomingLimit']);
        $this->view->assign('events', $events);
        $this->view->assign('contentObjectData', $this->configurationManager->getContentObject()->data);
    }

    /**
     * List all upcoming events
     *
     * @param string $startdate
     * @param int $monthFilter
     */
    public function listAction($startdate = null, $monthFilter = null)
    {
        $events = $this->eventRepository->findUpcoming();
        $monthlyEvents = [];
        foreach ($events as $event) {
            $eventStart = $event->getEventstart()->format('Ym');
            if ($monthFilter) {
                if ((int)$event->getEventstart()->format('n') === (int)$monthFilter) {
                    $monthlyEvents[$eventStart][] = $event;
                }
            } else {
                $monthlyEvents[$eventStart][] = $event;
            }
        }

        ksort($monthlyEvents);
        $allMonthlyEvents = $monthlyEvents;
        foreach ($monthlyEvents as $eventStart => $v) {
            if ($startdate !== null && $eventStart < $startdate) {
                unset($monthlyEvents[$k]);
            }
        }
        $this->view->assign('events', $events);
        $this->view->assign('allMonthlyEvents', $allMonthlyEvents);
        $this->view->assign('monthlyEvents', $monthlyEvents);
        $this->view->assign('monthFilter', $monthFilter);
        $this->view->assign('contentObjectData', $this->configurationManager->getContentObject()->data);
    }
}
