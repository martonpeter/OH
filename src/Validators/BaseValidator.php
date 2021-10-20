<?php

namespace Validators;

use App;

/**
 * Abstrakt osztály, közvetlenül nem, csak a belőle származtatott
 * osztályok példányosíthatóak.
 * 
 * Célja, hogy konkrét metódusokkal és tulajdonsággal egészítse ki a
 * ValidatorInterface interfészt, amit a leszármazottai használhatnak.
 * 
 */
abstract class BaseValidator implements ValidatorInterface
{

    /**
     * A következő validátor példányt tárolja
     * 
     * @var ValidatorInterface type 
     */
    protected $next;

    /**
     * Beállítja a következő validátort
     * 
     * @param ValidatorInterface $next
     * @return void
     */
    function setNext(ValidatorInterface $next): void
    {
        $this->next = $next;
    }

    /**
     * A következő (ha van) validátor validate metódusát hívja meg.
     * 
     * @param \App\Requirement $requirement
     * @param App\Results $results
     * @return void
     */
    protected function callNext(\App\Requirement $requirement, App\Results $results): void
    {
        if ($this->next != null) {
            $this->next->validate($requirement, $results);
        }
    }
}
