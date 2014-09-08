<?php
namespace Chadicus\FileInfo\Comparer;

/**
 * Comparer that compares file extensions.
 */
final class ExtensionComparer implements ComparerInterface
{
    /**
     * Compares two \SplInfoObjects objects and returns a value indicating whether one is less than, equal to, or greater than the other.
     *
     * @param \SplFileInfo $a An object to compare to $b.
     * @param \SplFileInfo $b An object to compare to $a.
     *
     * @return integer Less than 0 if $a preceeds $b in sort order
     *                 0 if $a occurs in the same position in the sort order as $b
     *                 Greater than 0 if $a follows $b in the sort order
     */
    public function compare(\SplFileInfo $a, \SplFileInfo $b)
    {
        return strcmp($a->getExtension(), $b->getExtension());
    }
}
