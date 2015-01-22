<?php

namespace Chadicus;

interface DirectoryAwareInterface
{
    /**
     * Returns the Directory instance.
     *
     * @return Directory
     */
    public function getDirectory();

    /**
     * Sets the Directory instance.
     *
     * @param Directory $directory
     *
     * @return DirectoryAwareInterface
     */
    public function setDirectory(DirectoryInterface $directory);
}
