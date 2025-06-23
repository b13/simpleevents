<?php

declare(strict_types=1);

namespace B13\Simpleevents\Domain\Repository;

/*
 * This file is part of TYPO3 CMS-based extension simpleevents by b13.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 */

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class EventRepository to fetch events
 * @extends Repository<\B13\Simpleevents\Domain\Model\Event>
 */
class EventRepository extends Repository
{
    /**
     * Fetches the next items
     */
    public function findUpcoming(int $limit = 0): QueryResultInterface
    {
        $query = $this->createQuery();
        if ($limit > 0) {
            $query->setLimit($limit);
        }
        $start = new \DateTime();
        $start->sub(new \DateInterval('P1D'));
        $end = new \DateTime();
        $end->sub(new \DateInterval('P1D'));
        $query->matching(
            $query->logicalOr(
                $query->logicalAnd(
                    $query->greaterThanOrEqual('eventstart', $start),
                    $query->equals('eventend', 0)
                ),
                $query->greaterThanOrEqual('eventend', $end)
            )
        );
        $query->setOrderings(
            ['eventstart' => QueryInterface::ORDER_ASCENDING]
        );
        return $query->execute();
    }
}
