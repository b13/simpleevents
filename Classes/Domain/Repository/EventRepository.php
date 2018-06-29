<?php
namespace CMSExperts\Simpleevents\Domain\Repository;

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

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Class EventRepository to fetch events
 */
class EventRepository extends Repository
{

    /**
     * Fetches the next items
     * @param int $limit
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findUpcoming($limit = 0)
    {
        $query = $this->createQuery();
        $limit = (int)$limit;
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