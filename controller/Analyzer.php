<?php

/**
 * Contains static methods for textual analyzation.
 */
class Analyzer
{
    /**
     * Counts number of lines.
     *
     * @param string $textToCount - The text that should be analyzed.
     * @return int The number of lines of the provided text.
     */
    public static function countLines(string $textToCount): int
    {
        return substr_count($textToCount, "\n");
    }

    /**
     * Returns a copy of the string with row numbers prepended.
     *
     * @param string $textWithoutRowNumbers - The text to prepend with row numbers.
     * @return string A copy of the string with row numbers prepended.
     */
    public static function prependRowNumbers(string $textWithoutRowNumbers): string
    {
        $prependedString = '';
        $rows = explode("\n", $textWithoutRowNumbers);
        
        foreach ($rows as $key => $row) {
            $prependedString .= "$key.\t $row\n";
        }

        return $prependedString;
    }
}
