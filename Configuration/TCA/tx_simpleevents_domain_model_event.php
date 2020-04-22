<?php

return [
    'ctrl'      => [
        'title'                    => 'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:event',
        'label'                    => 'title',
        'label_alt'                => 'eventstart,eventend',
        'label_alt_force'          => true,
        'tstamp'                   => 'updatedon',
        'crdate'                   => 'createdon',
        'cruser_id'                => 'createdby',
        'languageField'            => 'sys_language_uid',
        'transOrigPointerField'    => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'default_sortby'           => 'ORDER BY eventstart DESC',
        'delete'                   => 'deleted',
        'enablecolumns'            => [
            'disabled' => 'hidden',
        ],
        'iconfile'                 => 'EXT:simpleevents/Resources/Public/Icons/Extension.svg',
        'searchFields'             => 'title,description,location,audience,url'
    ],
    'interface' => [
        'showRecordFieldList' => 'title,description,location,audience,eventstart,eventend,url'
    ],
    'columns'   => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ],
                ],
                'default' => 0,
            ]
        ],
        'l10n_parent' => [
            'exclude' => true,
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    [
                        '',
                        0
                    ]
                ],
                'foreign_table' => 'tx_simpleevents_domain_model_event',
                'foreign_table_where' => 'AND tx_simpleevents_domain_model_event.sys_language_uid IN (-1,0)',
                'default' => 0
            ]
        ],

        'l10n_diffsource'  => [
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'title'            => [
            'exclude' => true,
            'label'   => 'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:event.title',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'description'      => [
            'exclude' => true,
            'label'   => 'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:event.description',
            'config'  => [
                'type' => 'text',
                'cols' => 30,
                'enableRichtext' => true,
                'richtextConfiguration' => 'default'
            ]
        ],
        'location'         => [
            'exclude' => true,
            'label'   => 'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:event.location',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'audience'         => [
            'exclude' => true,
            'label'   => 'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:event.audience',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'url'              => [
            'exclude' => true,
            'label'   => 'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:event.url',
            'config'  => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ]
        ],
        'eventstart'       => [
            'exclude' => true,
            'label'   => 'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:event.eventstart',
            'config'  => [
                'type'       => 'input',
                'renderType' => 'inputDateTime',
                'size'       => 10,
                'eval'       => 'date,required'
            ]
        ],
        'eventend'         => [
            'exclude' => true,
            'label'   => 'LLL:EXT:simpleevents/Resources/Private/Language/locallang_db.xlf:event.eventend',
            'config'  => [
                'type'       => 'input',
                'renderType' => 'inputDateTime',
                'size'       => 10,
                'eval'       => 'date'
            ]
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => 'title,categories,--palette--;;dates,description,audience,location,--palette--;;language,'
        ],
    ],
    'palettes' => [
        'dates' => [
            'showitem' => 'eventstart,eventend,sys_language_uid,l10n_parent',
        ],
        'language' => [
            'showitem' => '
                sys_language_uid;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:sys_language_uid_formlabel,l10n_parent
            ',
        ],
    ]
];
