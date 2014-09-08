<?php
namespace Chadicus\FileInfo\Comparer;

/**
 * Interface for a comparer object.
 */
interface ComparerInterface
{
    /**
     * Compares two \SplInfoObjects objects and returns a value indicating whether one is less than, equal to, or greater than the other.
     *
     * @param \SplFileInfo $x An object to compare to $y.
     * @param \SplFileInfo $y An object to compare to $x.
     *
     * @return integer Less than 0 if $x preceeds $y in sort order
     *                 0 if $x occurs in the same position in the sort order as $y
     *                 Greater than 0 if $x follows $y in the sort order
     */
    public function compare(\SplFileInfo $x, \SplFileInfo $y);
}
