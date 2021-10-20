<?php

namespace Storage;

/**
 * Innen kaphatjuk meg az adott egyetem kar - szak követelményeit
 * 
 * Mivel a feladatban ez a rész nem volt pontosan definiálva ezért
 * ezt a modelt választottam.
 */
class Storage
{

    private $universytiesArray = [
        'ELTE IK - Programtervező informatikus' => [
            'kotelezo' => [
                'matematika' => 'közép'
            ],
            'kotelezoen_valaszthato' => [
                'biológia',
                'fizika',
                'informatika',
                'kémia'
            ]
        ],
        'PPKE BTK – Anglisztika' => [
            'kotelezo' => [
                'angol nyelv' => 'emelt'
            ],
            'kotelezoen_valaszthato' => [
                'francia',
                'német',
                'olasz',
                'orosz',
                'spanyol',
                'történelem',
            ]
        ],
    ];

    /**
     * Visszaadja Az adott Egyetem kar - szak kulcs alapján
     * az adott követelmények tömbjét
     * 
     * @param string $universityKey
     * @return array $universytiesArray
     */
    public function getUniversity(string $universityKey): array
    {

        if (!empty($this->universytiesArray[$universityKey])) {

            return $this->universytiesArray[$universityKey];
        }

        return [];
    }

    /**
     * Visszaadja a teljes egyetem kar - szak tömböt
     * 
     * @return Array type 
     */
    public function getUniversytiesArray()
    {
        return $this->universytiesArray;
    }
}
