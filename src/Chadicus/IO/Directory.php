<?php
namespace Chadicus\IO;

/**
 * Adds funcitionality to the \Directory class.
 */
class Directory extends \Directory implements \IteratorAggregate
{
    /**
     * Construct a new instance of Directory.
     *
     * @param string $path Directory to open.
     */
    final public function __construct($path)
    {
        $this->path = $path;
        $this->handle = opendir($path);
    }

    /**
     * Returns the directory iterator for this Directory instance.
     *
     * @return \RecursiveDirectoryIterator
     */
    final public function getIterator()
    {
        return new \RecursiveDirectoryIterator($this->path);
    }

    /**
     * Returns an array containing all files that exist in this Directory.
     *
     * @param array   $includedExtensions List of file extensions to include.
     * @param array   $excludedExtensions List of file extensions to exclude.
     * @param integer $limit              The maximum limit of files to return.
     *
     * @return array
     */
    final public function listFiles(
        array $includedExtensions = array(),
        array $excludedExtensions = array(),
        $limit = PHP_INT_MAX
    ) {
        $this->rewind();
        $files = array();
        $count = 0;
        for ($file = $this->read(); $file !== false && $count < $limit; $file = $this->read()) {
            if (filetype("{$this->path}/{$file}") !== 'file') {
                continue;
            }

            $extension = pathinfo($file, PATHINFO_EXTENSION);
            if (in_array($extension, $excludedExtensions)) {
                continue;
            }

            if (!empty($includedExtensions) && !in_array($extension, $includedExtensions)) {
                continue;
            }

            $files[] = $file;
            ++$count;
        }

        return $files;
    }
}
