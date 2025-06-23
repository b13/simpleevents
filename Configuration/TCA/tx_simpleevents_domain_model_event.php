<?php

return [
    'ctrl'      => [
        'title'                    => 'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:event',
        'label'                    => 'title',
        'label_alt'                => 'eventstart,eventend',
        'label_alt_force'          => true,
        'tstamp'                   => 'updatedon',
        'crdate'                   => 'createdon',
        'languageField'            => 'sys_language_uid',
        'transOrigPointerField'    => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'default_sortby'           => 'ORDER BY eventstart DESC',
        'delete'                   => 'deleted',
        'enablecolumns'            => [
            'disabled' => 'hidden',
        ],
        'typeicon_classes' => [
            'default' => 'actions-calendar',
        ],
        'searchFields'             => 'title,description,location,audience,url',
    ],
    'columns'   => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        'label' => '',
                        'value' => 0,
                    ],
                ],
                'foreign_table' => 'tx_simpleevents_domain_model_event',
                'foreign_table_where' => 'AND tx_simpleevents_domain_model_event.sys_language_uid IN (-1,0)',
                'default' => 0,
            ],
        ],

        'l10n_diffsource'  => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'title'            => [
            'exclude' => true,
            'label'   => 'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:event.title',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'description'      => [
            'exclude' => true,
            'label'   => 'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:event.description',
            'config'  => [
                'type' => 'text',
                'cols' => 30,
                'enableRichtext' => true,
                'richtextConfiguration' => 'default',
            ],
        ],
        'location'         => [
            'exclude' => true,
            'label'   => 'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:event.location',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'audience'         => [
            'exclude' => true,
            'label'   => 'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:event.audience',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'url'              => [
            'exclude' => true,
            'label'   => 'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:event.url',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'categories' => [
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.category',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => 'Standard', 'value' => 0],
                ],
                'foreign_table' => 'sys_category',
            ],
        ],
        'eventstart'       => [
            'exclude' => true,
            'label'   => 'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:event.eventstart',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
                'required' => true
            ],
        ],
        'eventend'         => [
            'exclude' => true,
            'label'   => 'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:event.eventend',
            'config' => [
                'type' => 'datetime',
                'format' => 'date',
            ],
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => 'title,categories,--palette--;;dates,description,audience,location,--palette--;;language',
        ],
    ],
    'palettes' => [
        'dates' => [
            'showitem' => 'eventstart,eventend',
        ],
        'language' => [
            'showitem' => '
                sys_language_uid,l10n_parent
            ',
        ],
    ],
];
