<?php

namespace Chadicus\IO;

class Directory extends \Directory implements DirectoryInterface
{
    public function __construct($path)
    {
        $this->path = $path;
        $this->handle = opendir($path);
    }

    /**
     * Returns the directory that was opened.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Returns the directory handle.
     *
     * @return resource
     */
    public function getHandle()
    {
        return $this->handle;
    }
}
