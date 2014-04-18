<?php
namespace Chadicus\IO;

/**
 * @coversDefaultClass \Chadicus\IO\Directory
 */
final class DirectoryTest extends \PHPUnit_Framework_TestCase
{
    private $tempDir;

    protected function setUp()
    {
        $this->tempDir = sys_get_temp_dir() . '/directoryTests';
        if (is_dir($this->tempDir)) {
            self::delete($this->tempDir);
        }

        mkdir($this->tempDir, 0777, true);

        touch("{$this->tempDir}/file.txt");
        touch("{$this->tempDir}/file.csv");
        touch("{$this->tempDir}/file.html");
    }

    /**
     * Verify basic behavior of __construct()
     *
     * @test
     * @covers ::__construct
     *
     * @return void
     */
    public function construct()
    {
        $directory = new Directory($this->tempDir);
        $this->assertSame($this->tempDir, $directory->path);
    }

    /**
     * Verify basic behavior of getIterator()
     *
     * @test
     * @covers ::getIterator
     * @uses \Chadicus\IO\Directory::__construct
     *
     * @return void
     */
    public function getIterator()
    {
        $directory = new Directory($this->tempDir);
        $iterator = $directory->getIterator();
        $this->assertInstanceOf('RecursiveDirectoryIterator', $iterator);
        $expected = ['file.txt', 'file.html', 'file.csv'];
        $actual = [];
        foreach ($iterator as $item) {
            if ($item->isFile()) {
                $actual[] = $item->getFilename();
            }
        }

        sort($expected);
        sort($actual);
        $this->assertSame($expected, $actual);
    }

    /**
     * Verifies basic behavoir of listFiles()
     *
     * @test
     * @covers ::listFiles
     * @uses \Chadicus\IO\Directory::__construct
     *
     * @return void
     */
    public function listFiles()
    {
        $directory = new Directory($this->tempDir);
        $expected = ['file.txt', 'file.html', 'file.csv'];
        $actual = $directory->listFiles();
        sort($expected);
        sort($actual);
        $this->assertSame($expected, $actual);
    }

    /**
     * Verifies basic behavoir of listFiles() with includedExtensions.
     *
     * @test
     * @covers ::listFiles
     * @uses \Chadicus\IO\Directory::__construct
     *
     * @return void
     */
    public function listFilesWithIncludedExtensions()
    {
        $directory = new Directory($this->tempDir);
        $expected = ['file.txt', 'file.csv'];
        $actual = $directory->listFiles(['txt', 'csv']);
        sort($expected);
        sort($actual);
        $this->assertSame($expected, $actual);
    }

    /**
     * Verifies basic behavoir of listFiles() with excludedExtensions.
     *
     * @test
     * @covers ::listFiles
     * @uses \Chadicus\IO\Directory::__construct
     *
     * @return void
     */
    public function listFilesWithExcludedExtensions()
    {
        $directory = new Directory($this->tempDir);
        $expected = ['file.txt', 'file.html'];
        $actual = $directory->listFiles([], ['csv']);
        sort($expected);
        sort($actual);
        $this->assertSame($expected, $actual);
    }

    /**
     * Verifies basic behavoir of listFiles() with limit.
     *
     * @test
     * @covers ::listFiles
     * @uses \Chadicus\IO\Directory::__construct
     *
     * @return void
     */
    public function listFilesWithLimit()
    {
        $directory = new Directory($this->tempDir);
        $actual = $directory->listFiles([], [], 2);
        $this->assertSame(2, count($actual));
    }

    /**
     * Helper method to delete a directory and all of its contents
     *
     * @param string $directoryPath The directory to delete
     *
     * @return void
     */
    private static function delete($directoryPath)
    {
        foreach (scandir($directoryPath) as $path) {
            if ($path === '.' || $path === '..') {
                continue;
            }

            $fullPath = "{$directoryPath}/{$path}";

            if (is_dir($fullPath)) {
                self::delete($fullPath);
                rmdir($fullPath);
                continue;
            }

            unlink($fullPath);
        }

        rmdir($directoryPath);
    }
}
