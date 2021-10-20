<?php

namespace Utils;

/**
 * Utilities functions
 * 
 * Ide gyüjtöm az általános célú segéd függvényeket
 */
class Utils
{

    /**
     * Az eredmény stringből levágja a végéről a % jelet
     * és visszaadja a pontot int formában.
     * 
     * @param string $resultString
     * @return int
     */
    public function getResult2Ponit(string $resultString): int
    {

        return intval(substr(trim($resultString), 0, -1));
    }
}
