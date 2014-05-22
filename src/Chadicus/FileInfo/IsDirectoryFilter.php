<?php
namespace Chadicus\FileInfo;

/**
 * Implementation of IFilter which filters for directories.
 */
final class IsDirectoryFilter implements IFilter
{
    /**
     * Returns true if the file should be included false otherwise.
     *
     * @param \SplFileInfo $file The file to be filtered.
     *
     * @return boolean
     */
    public function filter(\SplFileInfo $file)
    {
        return $file->isDir();
    }
}
