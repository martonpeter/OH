<?php

namespace App;

use Storage;

/**
 * Implementáljuk a FactoryInterface interfészt ebben az absztrakt osztályban
 * és kiegészítjük saját tulajdonságokkal, valamint inicializálunk
 */
abstract class BaseRequirementFactory implements FactoryInterface
{

    /**
     * Az alap kötelező érettségi tárgyak tömbje
     * 
     * @var Array type 
     */
    protected $baseCompulsorySubjects = [
        "magyar nyelv és irodalom",
        "történelem",
        "matematika"
    ];

    /**
     * Az egyetem kar szak szerinti kötelező tárgyak és szintjük
     * kulsc-érték szerint. pl.: ['matematika' => 'közép']
     * 
     * @var Array type 
     */
    protected $universityCompulsorySubject;

    /**
     * Az egyetem kar szak szerinti kötelezően választható tárgyak
     * (ezek közül egyet kell választani)
     * pl.: ['biológia','fizika','informatika','kémia']
     * 
     * @var Array type 
     */
    protected $universityCompulsoryElectiveSubject;

    /**
     * Az a tároló, ahonnan az egyetem kar szak szerinti
     * követelményeket kapjuk (a feladat ezt nem részletezi)
     * 
     * @var Storage type 
     */
    protected $storage;

    /**
     * Inicializálás
     * 
     * @param $university type string
     * @param $faculty type string
     * @param $department type string
     */
    function __construct($university, $faculty, $department)
    {
        $this->storage = new \Storage\Storage();
        $this->universityCompulsorySubject = $this->storage->getUniversity($university . ' ' . $faculty . ' - ' . $department)['kotelezo'];
        $this->universityCompulsoryElectiveSubject = $this->storage->getUniversity($university . ' ' . $faculty . ' - ' . $department)['kotelezoen_valaszthato'];
    }
}
