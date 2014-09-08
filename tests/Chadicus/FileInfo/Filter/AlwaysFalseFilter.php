<?php
namespace Chadicus\FileInfo\Filter;

/**
 * Filter that always returns false.
 */
final class AlwaysFalseFilter implements FilterInterface
{
    /**
     * Will always return false.
     *
     * @param \SplFileInfo $file The file to be filtered.
     *
     * @return boolean
     */
    public function filter(\SplFileInfo $file)
    {
        return false;
    }
}
