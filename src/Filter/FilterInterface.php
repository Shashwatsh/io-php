<?php
namespace Chadicus\IO\Filter;

use SplFileInfo;

/**
 * Iterface for a filter object.
 */
interface FilterInterface
{
    /**
     * Returns true if the file should be included false otherwise.
     *
     * @param SplFileInfo $file The file to be filtered.
     *
     * @return boolean
     */
    public function filter(SplFileInfo $file);
}
