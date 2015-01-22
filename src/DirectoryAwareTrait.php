<?php

namespace Chadicus;

trait DirectoryAwareTrait
{
    /**
     * The directory instance.
     *
     * @var DirectoryInterface
     */
    private $directory;

    /**
     * Returns the Directory instance.
     *
     * @return DirectoryInterface
     */
    public function getDirectory()
    {
        return $this->directory;
    }

    /**
     * Sets the Directory instance.
     *
     * @param DirectoryInterface $directory
     *
     * @return DirectoryAwareInterface
     */
    public function setDirectory(DirectoryInterface $directory)
    {
        $this->directory = $directory;
        return $this;
    }
}
