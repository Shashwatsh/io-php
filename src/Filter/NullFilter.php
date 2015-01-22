<?php
namespace Chadicus\IO\Filter;

use SplFileInfo;

/**
 * Implemtation of FilterInterface which performs no filtering.
 */
final class NullFilter implements FilterInterface
{
    /**
     * Returns true if the file should be included false otherwise.
     *
     * @param SplFileInfo $file The file to be filtered.
     *
     * @return boolean
     */
    public function filter(SplFileInfo $file)
    {
        return true;
    }
}
