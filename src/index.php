<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\ScoreCalculator;

$exampleData =
    [
        'valasztott-szak' => [
            'egyetem' => 'ELTE',
            'kar' => 'IK',
            'szak' => 'Programtervező informatikus',
        ],
        'erettsegi-eredmenyek' => [
            [
                'nev' => 'magyar nyelv és irodalom',
                'tipus' => 'közép',
                'eredmeny' => '70%',
            ],
            [
                'nev' => 'történelem',
                'tipus' => 'közép',
                'eredmeny' => '80%',
            ],
            [
                'nev' => 'matematika',
                'tipus' => 'emelt',
                'eredmeny' => '90%',
            ],
            [
                'nev' => 'angol nyelv',
                'tipus' => 'közép',
                'eredmeny' => '94%',
            ],
            [
                'nev' => 'informatika',
                'tipus' => 'közép',
                'eredmeny' => '95%',
            ],
        ],
        'tobbletpontok' => [
            [
                'kategoria' => 'Nyelvvizsga',
                'tipus' => 'B2',
                'nyelv' => 'angol',
            ],
            [
                'kategoria' => 'Nyelvvizsga',
                'tipus' => 'C1',
                'nyelv' => 'német',
            ],
        ],
    ];

$exampleData2 = [
    'valasztott-szak' => [
        'egyetem' => 'ELTE',
        'kar' => 'IK',
        'szak' => 'Programtervező informatikus',
    ],
    'erettsegi-eredmenyek' => [
        [
            'nev' => 'magyar nyelv és irodalom',
            'tipus' => 'közép',
            'eredmeny' => '70%',
        ],
        [
            'nev' => 'történelem',
            'tipus' => 'közép',
            'eredmeny' => '80%',
        ],
        [
            'nev' => 'matematika',
            'tipus' => 'emelt',
            'eredmeny' => '90%',
        ],
        [
            'nev' => 'angol nyelv',
            'tipus' => 'közép',
            'eredmeny' => '94%',
        ],
        [
            'nev' => 'informatika',
            'tipus' => 'közép',
            'eredmeny' => '95%',
        ],
        [
            'nev' => 'fizika',
            'tipus' => 'közép',
            'eredmeny' => '98%',
        ],
    ],
    'tobbletpontok' => [
        [
            'kategoria' => 'Nyelvvizsga',
            'tipus' => 'B2',
            'nyelv' => 'angol',
        ],
        [
            'kategoria' => 'Nyelvvizsga',
            'tipus' => 'C1',
            'nyelv' => 'német',
        ],
    ],
];

$exampleData3 = [
    'valasztott-szak' => [
        'egyetem' => 'ELTE',
        'kar' => 'IK',
        'szak' => 'Programtervező informatikus',
    ],
    'erettsegi-eredmenyek' => [
        [
            'nev' => 'matematika',
            'tipus' => 'emelt',
            'eredmeny' => '90%',
        ],
        [
            'nev' => 'angol nyelv',
            'tipus' => 'közép',
            'eredmeny' => '94%',
        ],
        [
            'nev' => 'informatika',
            'tipus' => 'közép',
            'eredmeny' => '95%',
        ],
    ],
    'tobbletpontok' => [
        [
            'kategoria' => 'Nyelvvizsga',
            'tipus' => 'B2',
            'nyelv' => 'angol',
        ],
        [
            'kategoria' => 'Nyelvvizsga',
            'tipus' => 'C1',
            'nyelv' => 'német',
        ],
    ],
];

$exampleData4 = [
    'valasztott-szak' => [
        'egyetem' => 'ELTE',
        'kar' => 'IK',
        'szak' => 'Programtervező informatikus',
    ],
    'erettsegi-eredmenyek' => [
        [
            'nev' => 'magyar nyelv és irodalom',
            'tipus' => 'közép',
            'eredmeny' => '15%',
        ],
        [
            'nev' => 'történelem',
            'tipus' => 'közép',
            'eredmeny' => '80%',
        ],
        [
            'nev' => 'matematika',
            'tipus' => 'emelt',
            'eredmeny' => '90%',
        ],
        [
            'nev' => 'angol nyelv',
            'tipus' => 'közép',
            'eredmeny' => '94%',
        ],
        [
            'nev' => 'informatika',
            'tipus' => 'közép',
            'eredmeny' => '95%',
        ],
    ],
    'tobbletpontok' => [
        [
            'kategoria' => 'Nyelvvizsga',
            'tipus' => 'B2',
            'nyelv' => 'angol',
        ],
        [
            'kategoria' => 'Nyelvvizsga',
            'tipus' => 'C1',
            'nyelv' => 'német',
        ],
    ],
];

/**
 * Az alkalmazás futtatása az $exampleData alapján
 */
echo ScoreCalculator::getInstance()->calculate($exampleData2);
