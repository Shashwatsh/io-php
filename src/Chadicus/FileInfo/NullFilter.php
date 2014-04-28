<?php
namespace Chadicus\FileInfo;

final class NullFilter implements IFilter
{
    /**
     * Returns true if the file should be included false otherwise
     *
     * @param \SplFileInfo $file The file to be filtered
     *
     * @return boolean
     */
    public function filter(\SplFileInfo $file)
    {
        return true;
    }
}
