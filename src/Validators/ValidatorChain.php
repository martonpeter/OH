<?php

namespace Validators;

use App;

/**
 * Lehetővé teszi, hogy validátorokat adjunk hozzá az ellenőrzéshez.
 * 
 * Ezzel az a célom, hogy a S.O.L.I.D elvek "O" szerinti "open-closed principle"
 * megvalósuljon, azaz az osztályok, metódusok legyenek nyitottak a kibővítésre, de
 * zártak a módosításra.
 * 
 * Ezért alkalmazom a "Chain of responsibility" tervezési mintát.
 */
class ValidatorChain
{

    /**
     * Validátorokat tartalmazó tömb
     * 
     * @var Array type 
     */
    private $validators = [];

    /**
     * Hozzáadja a Validárotr a validátorokat tartalmazó tömbhöz
     * 
     * @param ValidatorInterface $validator
     */
    public function addValidator(ValidatorInterface $validator)
    {
        $lastValidator = end($this->validators);
        if ($lastValidator != null) {
            $lastValidator->setNext($validator);
        }
        $this->validators[] = $validator;
    }

    /**
     * Visszaállítja az elejére a validátor tömb mutatót
     * és futtatja az első validátor validate metódusát
     * 
     * @param \App\Requirement $requirement
     * @param App\Results $results
     */
    public function doValidator(\App\Requirement $requirement, App\Results $results)
    {
        reset($this->validators)->validate($requirement, $results);
    }
}
