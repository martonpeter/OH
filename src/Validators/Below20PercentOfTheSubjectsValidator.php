<?php

namespace Validators;

use App;
use Utils;

/**
 * Validator
 * 
 * A S.O.L.I.D. elvek 'S' (Single Responsibility Principle)
 * szerint egy validátor osztály csak egy felelősséggel rendelkezik
 * 
 * Azt ellenőrzi, hogy az érettségi eredményekből
 * van olyan tárgy, ahol az eredmény < 20%
 * Amennyiben ilyen van hibát dob a megfelelő hibaüzenettel (amit a hívója lekezel)
 * és nem folytatódik az ellenőrzési lánc.
 * 
 * Ha ez nem áll fenn, akkor a következő ellenőrzést hívja meg.
 * 
 */
class Below20PercentOfTheSubjectsValidator extends BaseValidator
{

    /**
     * A segéd függvényeket tartalmazó osztály
     * 
     * @var Utils type 
     */
    private $utils;

    /**
     * inicializáláskor példányosít és eltárol  egy Utils példányt
     */
    public function __construct()
    {

        $this->utils = new Utils\Utils();
    }

    /**
     * Validálja az érettségi eredményeket, hogy mindegyik tárgyból
     * legalább 20%-ot elértünk.
     * 
     * @param \App\Requirement $requirement
     * @param App\Results $results
     * @throws \Exception
     */
    public function validate(\App\Requirement $requirement, App\Results $results)
    {

        foreach ($results->getGraduationResults() as $valueArray) {

            if ($this->utils->getResult2Ponit($valueArray['eredmeny']) < 20) {

                $subject = $valueArray['nev'];
                throw new \Exception("hiba, nem lehetséges a pontszámítás a $subject tárgyból elért 20% alatti eredmény miatt");
            }
        }

        $this->callNext($requirement, $results);
    }
}
