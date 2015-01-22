<?php

namespace Chadicus;

interface DirectoryInterface
{
    /**
     * Returns the directory that was opened.
     *
     * @return string
     */
    public function getPath();

    /**
     * Returns the directory handle.
     *
     * @return resource
     */
    public function getHandle();

    /**
     * Close directory handle
     *
     * @return void
     */
    public function close($handle = null);

    /**
     * Read entry from directory handle.
     *
     * @return string
     */
    public function read($handle = null);

    /**
     * Rewind directory handle.
     *
     * @return void
     */
    public function rewind($handle = null);
}
