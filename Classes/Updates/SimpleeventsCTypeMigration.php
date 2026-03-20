<?php

declare(strict_types=1);

namespace B13\Simpleevents\Updates;

/*
 * This file is part of TYPO3 CMS-based extension "simpleevents" by b13.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 */

use TYPO3\CMS\Install\Attribute\UpgradeWizard;
use TYPO3\CMS\Install\Updates\AbstractListTypeToCTypeUpdate;

#[UpgradeWizard('simpleeventsCTypeMigration')]
final class SimpleeventsCTypeMigration extends AbstractListTypeToCTypeUpdate
{
    public function getTitle(): string
    {
        return 'Migrate "simpleevents" plugins to content elements.';
    }

    public function getDescription(): string
    {
        return 'The "simpleevents" plugins are now registered as content element. Update migrates existing records and backend user permissions.';
    }

    /**
     * This must return an array containing the "list_type" to "CType" mapping
     *
     * @return array<string, string>
     */
    protected function getListTypeToCTypeMapping(): array
    {
        return [
            'simpleevents_upcoming' => 'simpleevents_upcoming',
            'simpleevents_list' => 'simpleevents_list',
        ];
    }
}
