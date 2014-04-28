<?php
namespace Chadicus\FileInfo;

final class ExtensionFilter implements IFilter
{
    private $extension;

    public function __construct($extension)
    {
        $this->extension = $extension;
    }

    /**
     * Returns true if the file should be included false otherwise
     *
     * @param \SplFileInfo $file The file to be filtered
     *
     * @return boolean
     */
    public function filter(\SplFileInfo $file)
    {
        return $file->getExtension() === $this->extension;
    }
}
