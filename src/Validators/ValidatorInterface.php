<?php

namespace Validators;

use App;

/**
 * Validator interface követelményeket ír elő az őt implementáló
 * osztályoknak.
 * 
 * A S.O.L.I.D. elvek 'I' (Interface segregation principle)
 * A közös funkciók mentén darabolom az interfészeket, így elkerülhető
 * az implementáló eljárásokban a nem használt metódusok kényszerből történő létrehozása.
 */
interface ValidatorInterface
{

    function validate(\App\Requirement $requirement, App\Results $results);
}
