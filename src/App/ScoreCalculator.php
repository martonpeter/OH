<?php

namespace App;

use Utils;

/**
 * Egyszerűsített pontszámító kalkulátor
 * 
 * Mivel Bónusz pontot ér a Programtervezési minták használata
 * és a ScoreCalculator osztályt felfoghatjuk a 'Fő program'-nak,
 * ezért itt a Singleton tervezési minát alkalmazom. 
 */
class ScoreCalculator
{

    /**
     * C1 nyelvvizsgáért járó extrapont
     */
    private const C1_EXTRAPOINT = 40;

    /**
     * B2 nyelvvizsgáért járó extrapont
     */
    private const B2_EXTRAPOINT = 28;

    /**
     * Emelt szintű érettségiért járó extrapont
     */
    private const ADVENCED_LEVEL_EXTRAPOINT = 50;

    /**
     * Maximálisan szerezhető extrapont
     */
    private const MAX_EXTRAPOINT = 100;

    /**
     * Alap hiba, ha nem adunk meg bemeneti tömböt
     * (A feladat erre nem tért ki)
     */
    private const INPUT_ERROR = 'Hibás bemenő adatok!';

    /**
     * A ScoreCalculator egyetlen példányát tárolja
     * 
     * @var ScoreCalculator type 
     */
    private static $INSTANCE;

    /**
     * Követelmény példány
     * 
     * @var Requirement type 
     */
    private $requirement;

    /**
     * Results példány
     * 
     * @var Results type 
     */
    private $results;

    /**
     * ValidatorChain példány
     * 
     * @var ValidatorChain type 
     */
    private $validatorChain;

    /**
     * Utils példány
     * 
     * @var ValidatorChain type 
     */
    private $utils;

    /**
     * Alap pont
     * 
     * @var int type
     */
    private $basePontsSum = 0;

    /**
     * extra pont
     * 
     * @var int type 
     */
    private $extraPointsSum = 0;

    /**
     * maximális extra point
     * 
     * @var int type 
     */
    private $electiveSubjectsMax = 0;

    /**
     * Nyelvi extra pont tömb
     * 
     * @var array type 
     */
    private $languagePointsArray = [];

    /**
     * Emelt szinű eredményért járó pont tömb
     * 
     * @var array type 
     */
    private $advencedLevelExtraPointsArray = [];

    /**
     * Inicializálás
     */
    private function __construct()
    {

        $this->utils = new Utils\Utils();
        $this->prepareValidate();
    }

    /**
     * Visszaadja a Store objektum példányt
     * 
     * @return type Store
     */
    public static function getInstance()
    {

        if (self::$INSTANCE == null) {
            self::$INSTANCE = new self();
        }

        return self::$INSTANCE;
    }

    /**
     * 
     * @return type Requirement
     */
    public function getRequirement()
    {
        return $this->requirement;
    }

    /**
     * 
     * @return type Results
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * 
     * @return type ValidatorChain
     */
    public function getValidatorChain()
    {
        return $this->validatorChain;
    }

    /**
     * 
     * @return type Utils
     */
    public function getUtils()
    {
        return $this->utils;
    }

    /**
     * 
     * @return type int
     */
    public function getBasePontsSum()
    {
        return $this->basePontsSum;
    }

    /**
     * 
     * @return type int
     */
    public function getExtraPointsSum()
    {
        return $this->extraPointsSum;
    }

    /**
     * 
     * @return type int
     */
    public function getElectiveSubjectsMax()
    {
        return $this->electiveSubjectsMax;
    }

    /**
     * 
     * @return type array
     */
    public function getLanguagePointsArray()
    {
        return $this->languagePointsArray;
    }

    /**
     * 
     * @return type array
     */
    public function getAdvencedLevelExtraPointsArray()
    {
        return $this->advencedLevelExtraPointsArray;
    }

    /**
     * Kiszámolja a bemenő $exampleData alapján,
     * a pontokat, majd a megfelelő formában lévő üzenetet visszaad
     * 
     * @param array $exampleData
     * @return string
     */
    public function calculate(array $exampleData): string
    {

        if (empty($exampleData)) {
            return self::INPUT_ERROR;
        }

        $this->basePontsSum = 0;
        $this->extraPointsSum = 0;

        $requirementFactory = new RequirementFactory(
            $exampleData['valasztott-szak']['egyetem'],
            $exampleData['valasztott-szak']['kar'],
            $exampleData['valasztott-szak']['szak']
        );

        $this->requirement = $requirementFactory->create();
        $this->results = new Results(
            $exampleData['erettsegi-eredmenyek'],
            $exampleData['tobbletpontok']
        );

        try {

            $this->validatorChain->doValidator($this->requirement, $this->results);
        } catch (\Exception $exc) {

            return $exc->getMessage();
        }

        $this->calculateBasePontsSum();
        $this->calculateExtraPointsSum();

        $totalSumPoints = $this->basePontsSum + $this->extraPointsSum;

        return "$totalSumPoints ($this->basePontsSum alappont + $this->extraPointsSum többletpont)";
    }

    /**
     * Itt készítjük elő a validációs láncot,
     * adjuk hozzá a validátorokat.
     * 
     * @return void
     */
    private function prepareValidate(): void
    {

        $this->validatorChain = new \Validators\ValidatorChain();
        $this->validatorChain->addValidator(new \Validators\RequiredGraduationSubjectsValidator());
        $this->validatorChain->addValidator(new \Validators\Below20PercentOfTheSubjectsValidator());
    }

    /**
     * Az alappontok kiszámítása
     * 
     * @return void
     */
    private function calculateBasePontsSum(): void
    {

        foreach ($this->results->getGraduationResults() as $graduationResult) {

            $this->addCompulsorySubjectPoints($graduationResult['nev'], $graduationResult['eredmeny']);
        }

        $this->basePontsSum = ($this->basePontsSum + $this->electiveSubjectsMax) * 2;
    }

    /**
     * Az extra pontok kiszámítása
     * 
     * @return void
     */
    private function calculateExtraPointsSum(): void
    {

        foreach ($this->results->getExtraPoints() as $extraPoints) {

            if ($extraPoints['kategoria'] == 'Nyelvvizsga') {

                $this->calculateLanguageExtraPointsSum($extraPoints);
            }
        }

        foreach ($this->results->getGraduationResults() as $graduationResult) {

            if ($graduationResult['tipus'] === 'emelt') {

                $this->advencedLevelExtraPointsArray['nev'] = self::ADVENCED_LEVEL_EXTRAPOINT;
            }
        }

        $this->extraPointsSum = array_sum($this->languagePointsArray) + array_sum($this->advencedLevelExtraPointsArray);
        $this->extraPointsSum > self::MAX_EXTRAPOINT ? $this->extraPointsSum = self::MAX_EXTRAPOINT : null;
    }

    /**
     * Nyelvi extra pontok számítása
     * 
     * @param array $extraPoints
     * @return void
     */
    private function calculateLanguageExtraPointsSum(array $extraPoints): void
    {

        if (!array_key_exists($extraPoints['nyelv'], $this->languagePointsArray)) {

            $extraPoints['tipus'] === 'C1' ? $this->languagePointsArray[$extraPoints['nyelv']] = self::C1_EXTRAPOINT : $this->languagePointsArray[$extraPoints['nyelv']] = self::B2_EXTRAPOINT;
        } else {

            $extraPoints['tipus'] === 'C1' ? $this->languagePointsArray[$extraPoints['nyelv']] = self::C1_EXTRAPOINT : null;
        }
    }

    /**
     * Kötelező tárgy pontértéke
     * 
     * @param string $subject
     * @param string $result
     * @return void
     */
    private function addCompulsorySubjectPoints(string $subject, string $result): void
    {


        if (array_key_exists($subject, $this->requirement->universityCompulsorySubject)) {
            $this->basePontsSum += $this->utils->getResult2Ponit($result);
        }

        if (in_array($subject, $this->requirement->compulsoryElectiveSubjects)) {

            $this->addCompulsoryElectiveSubjectPoints($result);
        }
    }

    /**
     * Kötelezően választható tárgy pontértéke
     * 
     * @param string $result
     * @return void
     */
    private function addCompulsoryElectiveSubjectPoints(string $result): void
    {

        if ($this->utils->getResult2Ponit($result) > $this->electiveSubjectsMax) {

            $this->electiveSubjectsMax = $this->utils->getResult2Ponit($result);
        }
    }
}
