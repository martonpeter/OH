<?php

namespace App;

/**
 * Az érettségi eredmények tárolására szolgál
 */
class Results
{

    /**
     * erettsegi-eredmenyek tömb
     * 
     * @var array type 
     */
    private $graduationResults;

    /**
     * tobbletpontok tömb
     * 
     * @var array type 
     */
    private $extraPoints;

    /**
     * inicializálás
     * 
     * @param array $graduationResults
     * @param array $extraPoints
     */
    public function __construct(array $graduationResults, array $extraPoints)
    {

        $this->graduationResults = $graduationResults;
        $this->extraPoints = $extraPoints;
    }

    /**
     * Visszaadja a graduationResults
     * @return array
     */
    public function getGraduationResults(): array
    {
        return $this->graduationResults;
    }

    /**
     * Visszaadja a extraPoints
     * @return array
     */
    public function getExtraPoints(): array
    {
        return $this->extraPoints;
    }
}
