<?php

declare(strict_types=1);

namespace B13\Simpleevents\Domain\Model;

/*
 * This file is part of TYPO3 CMS-based extension simpleevents by b13.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 */

use TYPO3\CMS\Extbase\Domain\Model\Category;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class Event, representing a single event
 */
class Event extends AbstractEntity
{
    /**
     * the event date
     * @var \DateTime
     */
    protected $eventstart;

    /**
     * the event date end
     * @var \DateTime
     */
    protected $eventend;

    /**
     * the title of the event
     * @var string
     */
    protected $title;

    /**
     * the longer description of the event
     * @var string
     */
    protected $description;

    /**
     * the audience of the event
     * @var string
     */
    protected $audience;

    /**
     * the url of the event
     * @var string
     */
    protected $url;

    /**
     * the link title of the url
     */
    protected string $linkTitle = '';

    /**
     * the location of the event
     * @var string
     */
    protected $location;

    /**
     * a single category, stored as a uid in the "categories" column
     */
    protected ?Category $categories = null;

    public function getCategories(): ?Category
    {
        return $this->categories;
    }

    /**
     * @return \DateTime
     */
    public function getEventstart()
    {
        return $this->eventstart;
    }

    /**
     * @param \DateTime $eventstart
     */
    public function setEventstart($eventstart): void
    {
        $this->eventstart = $eventstart;
    }

    /**
     * @return \DateTime
     */
    public function getEventend()
    {
        return $this->eventend;
    }

    /**
     * @param \DateTime $eventend
     */
    public function setEventend($eventend): void
    {
        $this->eventend = $eventend;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getAudience()
    {
        return $this->audience;
    }

    /**
     * @param string $audience
     */
    public function setAudience($audience): void
    {
        $this->audience = $audience;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url): void
    {
        $this->url = $url;
    }

    public function getLinkTitle(): string
    {
        return $this->linkTitle;
    }

    public function setLinkTitle(string $linkTitle): void
    {
        $this->linkTitle = $linkTitle;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param string $location
     */
    public function setLocation($location): void
    {
        $this->location = $location;
    }
}
