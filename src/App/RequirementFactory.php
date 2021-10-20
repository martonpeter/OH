<?php

namespace App;

/**
 * Factory tervezési minta
 * 
 * A célja, hogy 'legyártson és' visszaadjon egy Requirement objektumot
 */
class RequirementFactory extends BaseRequirementFactory
{

    /**
     * Requirement objektum
     * 
     * @var Requirement type 
     */
    private $Requirement;

    /**
     * Létrehoz és visszaad egy Requirement objektumot
     * 
     * @return Requirement
     */
    public function create(): Requirement
    {

        $this->Requirement = new Requirement();

        $this->createRequirementSubjects();
        $this->createRequirementElectiveSubjects();
        $this->createUniversityCompulsorySubject();

        return $this->Requirement;
    }

    /**
     * Létrehozza a Requirement->compulsorySubjects-et
     * 
     * ebben tároljuk a megfelelő szintű adott egyetem kar szak szerinti
     * követelményekből és az alap követelményekből álló tantárgyak tömbjét
     *
     * ['tantárgy' => 'szint'] 
     * pl.: ['matematika' => 'közép', 
     *       'történelem' => 'közép', 
     *       'magyar nyelv és irodalom' => 'közép', 
     *       'angol nyelv' => 'emelt']
     * 
     * @return void
     */
    private function createRequirementSubjects(): void
    {

        foreach ($this->baseCompulsorySubjects as $baseSubject) {

            $this->Requirement->compulsorySubjects[$baseSubject] = 'közép';
        }

        foreach ($this->universityCompulsorySubject as $subject => $level) {

            $this->Requirement->compulsorySubjects[$subject] = $level;
        }
    }

    /**
     * Létrehozza a Requirement->compulsoryElectiveSubjects-et
     * 
     * ebben tároljuk az adott egyetem kar szak szerinti kötelezően választható
     * tárgyakat
     * 
     * @return void
     */
    private function createRequirementElectiveSubjects(): void
    {

        $this->Requirement->compulsoryElectiveSubjects = $this->universityCompulsoryElectiveSubject;
    }

    /**
     * Itt csak az adott egyetem szak kar szerinti kötelező tárgyak tömbjét tároljuk
     * pl.: ['matematika' => 'közép']
     */
    private function createUniversityCompulsorySubject()
    {

        $this->Requirement->universityCompulsorySubject = $this->universityCompulsorySubject;
    }
}
