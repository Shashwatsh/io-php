<?php
namespace Chadicus\FileInfo\Filter;

/**
 * Implementation of FilterInterface that filters files by a given extension.
 */
final class ExtensionFilter implements FilterInterface
{
    /**
     * The extension to filter by.
     *
     * @var string
     */
    private $extension;

    /**
     * Construct a new instance of ExtensionFilter.
     *
     * @param string $extension The extension to filter by.
     */
    public function __construct($extension)
    {
        $this->extension = $extension;
    }

    /**
     * Returns true if the file should be included false otherwise.
     *
     * @param \SplFileInfo $file The file to be filtered.
     *
     * @return boolean
     */
    public function filter(\SplFileInfo $file)
    {
        return $file->getExtension() === $this->extension;
    }
}
