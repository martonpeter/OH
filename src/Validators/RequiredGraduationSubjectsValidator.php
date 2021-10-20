<?php

namespace Validators;

use App;

/**
 * Validator
 *
 * A S.O.L.I.D. elvek 'S' (Single Responsibility Principle)
 * szerint egy validátor osztály csak egy felelősséggel rendelkezik
 * 
 * Azt ellenőrzi, hogy minden kötelező tárgyból van érettségi eredmény
 * A kötelező tárgyak ($requirement->compulsorySubjects) már tartalmazzák
 * az alap kötelező tárgyakat + az egyetem kar szak általl meghatározott kötelező
 * tárgyakat és azok szintjét. Amennyiben nincs (megfelelő szintű) érettségi eredmény valamely
 * kötelező tárgyból akkor hibát dob a megfelelő üzenettel, amit a hívó eljárás lekezel.
 * Hiba esetén megszakad az ellenőrzési lánc.
 * 
 */
class RequiredGraduationSubjectsValidator extends BaseValidator
{

    /**
     * Megfelelő szintű kötelező tárgyak ellenőrzése az alap és az adott
     * egyetem kar szak követelményei szerint.
     * 
     * @param \App\Requirement $requirement
     * @param App\Results $results
     * @throws \Exception
     */
    public function validate(\App\Requirement $requirement, App\Results $results): void
    {

        $subjectOkNumber = 0;
        foreach ($requirement->compulsorySubjects as $subject => $level) {

            foreach ($results->getGraduationResults() as $valueArray) {

                if (
                    $valueArray['nev'] == $subject &&
                    ($valueArray['tipus'] == $level || $valueArray['tipus'] == 'emelt')
                ) {

                    $subjectOkNumber++;
                }
            }
        }


        if ($subjectOkNumber !== count($requirement->compulsorySubjects)) {

            throw new \Exception('hiba, nem lehetséges a pontszámítás a kötelező érettségi tárgyak hiánya miatt');
        } else {

            $this->callNext($requirement, $results);
        }
    }
}
