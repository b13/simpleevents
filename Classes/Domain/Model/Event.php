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

use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
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
     * the location of the event
     * @var string
     */
    protected $location;

    /**
     * Categories
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\Category
     */
    protected $categories;

    /**
     * Returns the categories
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\Category
     */
    public function getCategories()
    {
        $context = GeneralUtility::makeInstance(Context::class);
        $languageId = $context->getPropertyFromAspect('language', 'id');
        
        if ($languageId > 0) {
            $uid = $this->uid;

            $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
                ->getQueryBuilderForTable('sys_category');

            $categories = $queryBuilder->select('sys_category.*')
                ->from('sys_category')
                ->join(
                    'sys_category',
                    'sys_category_record_mm',
                    'sys_category_record_mm',
                    $queryBuilder->expr()->eq(
                        'sys_category_record_mm.uid_local',
                        $queryBuilder->quoteIdentifier('sys_category.uid')
                    )
                )
                ->where(
                    $queryBuilder->expr()->eq(
                        'sys_category_record_mm.uid_foreign',
                        $queryBuilder->createNamedParameter($uid, \PDO::PARAM_INT)
                    ),
                    $queryBuilder->expr()->eq(
                        'sys_category_record_mm.tablenames',
                        $queryBuilder->createNamedParameter('tx_simpleevents_domain_model_event', \PDO::PARAM_STR)
                    ),
                    $queryBuilder->expr()->eq(
                        'sys_category_record_mm.fieldname',
                        $queryBuilder->createNamedParameter('categories', \PDO::PARAM_STR)
                    )
                )->execute()->fetchAll();
            return reset($categories);
        } else {
            return $this->categories;
        }
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
    public function setEventstart($eventstart)
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
    public function setEventend($eventend)
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
    public function setTitle($title)
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
    public function setDescription($description)
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
    public function setAudience($audience)
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
    public function setUrl($url)
    {
        $this->url = $url;
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
    public function setLocation($location)
    {
        $this->location = $location;
    }
}
