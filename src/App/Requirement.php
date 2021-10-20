<?php

namespace App;

/**
 * Követelmények osztály
 * 
 * Tartalmazza a kötelező tárgyakat
 * és a kötelezően választható tárgyakat
 * 
 */
class Requirement
{

    /**
     * Kötelező tárgyak tömbje
     * 
     * @var Array type 
     */
    public $compulsorySubjects;

    /**
     * Kötelezően választható tárgyak tömbje
     * 
     * @var Array type 
     */
    public $compulsoryElectiveSubjects;
}
