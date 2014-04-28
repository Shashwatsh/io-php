<?php
namespace Chadicus\FileInfo;

/**
 * Filter that always returns false
 */
final class AlwaysFalseFilter implements IFilter
{
    public function filter(\SplFileInfo $file)
    {
        return false;
    }
}
