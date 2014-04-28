<?php
namespace Chadicus\FileInfo;

/**
 * Comparer that compares file extensions
 */
final class ExtensionComparer implements IComparer
{
    public function compare(\SplFileInfo $a, \SplFileInfo $b)
    {
        return strcmp($a->getExtension(), $b->getExtension());
    }
}
