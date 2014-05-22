<?php
namespace Chadicus\FileInfo;

/**
 * Unit tests for the \Chadicus\FileInfo\Collection class.
 *
 * @coversDefaultClass \Chadicus\FileInfo\Collection
 */
final class CollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Temporary file path for tests.
     *
     * @var string
     */
    private $tempDir;

    /**
     * Set up each test.
     *
     * @return void
     */
    protected function setUp()
    {
        $this->tempDir = sys_get_temp_dir() . '/fileInfoCollectionTests';
        if (is_dir($this->tempDir)) {
            self::delete($this->tempDir);
        }

        mkdir($this->tempDir, 0777, true);
    }

    /**
     * Verify basic behavior of Collection.
     *
     * @test
     * @covers ::__construct
     * @covers ::getIterator
     * @uses \Chadicus\FileInfo\FilterIterator
     * @uses \Chadicus\FileInfo\NullFilter
     *
     * @return void
     */
    public function basicUse()
    {
        $expected = array(
            'file.txt',
            'file.csv',
            'file.html',
        );

        touch("{$this->tempDir}/file.txt");
        touch("{$this->tempDir}/file.csv");
        touch("{$this->tempDir}/file.html");

        $collection = new Collection($this->tempDir);
        $actual = array();
        foreach ($collection as $item) {
            $actual[] = $item->getFilename();
        }

        sort($expected);
        sort($actual);

        $this->assertSame($expected, $actual);
    }

    /**
     * Verify collection with sorting.
     *
     * @test
     * @covers ::sort
     * @covers ::getIterator
     * @uses \Chadicus\FileInfo\Collection::__construct
     * @uses \Chadicus\FileInfo\FilterIterator
     * @uses \Chadicus\FileInfo\NullFilter
     *
     * @return void
     */
    public function sort()
    {
        touch("{$this->tempDir}/file.txt");
        touch("{$this->tempDir}/file.csv");
        touch("{$this->tempDir}/file.html");


        $collection = new Collection($this->tempDir);
        $actual = array();
        foreach ($collection->sort(new ExtensionComparer()) as $item) {
            $actual[] = $item->getFilename();
        }

        $this->assertSame(array('file.csv', 'file.html', 'file.txt'), $actual);
    }

    /**
     * Verify filter can be changed after construction.
     *
     * @test
     * @covers ::filter
     * @uses \Chadicus\FileInfo\Collection::__construct
     * @uses \Chadicus\FileInfo\Collection::getIterator
     * @uses \Chadicus\FileInfo\FilterIterator
     * @uses \Chadicus\FileInfo\ExtensionFilter
     *
     * @return void
     */
    public function filter()
    {
        touch("{$this->tempDir}/file.txt");
        touch("{$this->tempDir}/file.csv");
        touch("{$this->tempDir}/file.html");

        $collection = new Collection($this->tempDir, new ExtensionFilter('csv'));
        $actual = array();
        foreach ($collection as $item) {
            $actual[] = $item->getFilename();
        }

        $this->assertSame(array('file.csv'), $actual);

        $actual = array();
        foreach ($collection->filter(new ExtensionFilter('html')) as $item) {
            $actual[] = $item->getFilename();
        }

        $this->assertSame(array('file.html'), $actual);
    }

    /**
     * Helper method to delete a directory and all of its contents.
     *
     * @param string $directoryPath The directory to delete.
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
