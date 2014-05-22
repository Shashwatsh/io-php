<?php
namespace Chadicus\FileInfo;

/**
 * Filter that always returns false.
 */
final class AlwaysFalseFilter implements IFilter
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
