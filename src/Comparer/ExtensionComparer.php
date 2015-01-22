<?php
namespace Chadicus\Comparer;

use SplFileInfo;

/**
 * Comparer that compares file extensions.
 */
final class ExtensionComparer implements ComparerInterface
{
    /**
     * Compares two SplInfoObjects objects and returns a value indicating whether one is less than, equal to, or
     * greater than the other.
     *
     * @param SplFileInfo $thisFile An object to compare to $thatFile.
     * @param SplFileInfo $thatFile An object to compare to $thisFile.
     *
     * @return integer Less than 0 if $thisFile preceeds $thatFile in sort order
     *                 0 if $thisFile occurs in the same position in the sort order as $thatFile
     *                 Greater than 0 if $thisFile follows $thatFile in the sort order
     */
    public function compare(SplFileInfo $thisFile, SplFileInfo $thatFile)
    {
        return strcmp($thisFile->getExtension(), $thatFile->getExtension());
    }
}
