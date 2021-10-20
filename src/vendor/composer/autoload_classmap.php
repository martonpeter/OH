<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'App\\BaseRequirementFactory' => $baseDir . '/App/BaseRequirementFactory.php',
    'App\\FactoryInterface' => $baseDir . '/App/FactoryInterface.php',
    'App\\Requirement' => $baseDir . '/App/Requirement.php',
    'App\\RequirementFactory' => $baseDir . '/App/RequirementFactory.php',
    'App\\Results' => $baseDir . '/App/Results.php',
    'App\\ScoreCalculator' => $baseDir . '/App/ScoreCalculator.php',
    'Storage\\Storage' => $baseDir . '/Storage/Storage.php',
    'Utils\\Utils' => $baseDir . '/Utils/Utils.php',
    'Validators\\BaseValidator' => $baseDir . '/Validators/BaseValidator.php',
    'Validators\\Below20PercentOfTheSubjectsValidator' => $baseDir . '/Validators/Below20PercentOfTheSubjectsValidator.php',
    'Validators\\RequiredGraduationSubjectsValidator' => $baseDir . '/Validators/RequiredGraduationSubjectsValidator.php',
    'Validators\\ValidatorChain' => $baseDir . '/Validators/ValidatorChain.php',
    'Validators\\ValidatorInterface' => $baseDir . '/Validators/ValidatorInterface.php',
);
