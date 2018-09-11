<?php

    /**
     * Function that counts number of lines
     * 
     * @param string $codeToCount
     * 
     * @return float number of lines
     */

    function countLines (string $codeToCount) : float {

    return substr_count($codeToCount, "\n");

    }
