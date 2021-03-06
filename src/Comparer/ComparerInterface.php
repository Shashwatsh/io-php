<?php
namespace Chadicus\IO\Comparer;

use SplFileInfo;

/**
 * Interface for a comparer object.
 */
interface ComparerInterface
{
    /**
     * Compares two \SplInfoObjects objects and returns a value indicating whether one is less than, equal to, or
     * greater than the other.
     *
     * @param SplFileInfo $thisFile An object to compare to $thatFile.
     * @param SplFileInfo $thatFile An object to compare to $thisFile.
     *
     * @return integer Less than 0 if $thisFile preceeds $thatFile in sort order
     *                 0 if $thisFile occurs in the same position in the sort order as $thatFile
     *                 Greater than 0 if $thisFile follows $thatFile in the sort order
     */
    public function compare(SplFileInfo $thisFile, SplFileInfo $thatFile);
}
