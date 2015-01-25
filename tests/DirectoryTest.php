<?php
namespace ChadicusTest\IO;

use Chadicus\IO\Directory;

/**
 * Unit tests for the \Chadicus\IO\Directory class.
 *
 * @coversDefaultClass \Chadicus\IO\Directory
 */
final class DirectoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify basic behavior of __construct().
     *
     * @test
     * @covers ::__construct
     * @uses \Chadicus\IO\Directory::getPath
     * @uses \Chadicus\IO\Directory::getHandle
     */
    public function construct()
    {
        $directory = new Directory(__DIR__);
        $this->assertSame($directory->path, $directory->getPath());
        $this->assertSame($directory->handle, $directory->getHandle());
    }

    /**
     * Verify basic behavior of getPath().
     *
     * @test
     * @covers ::getPath
     * @uses \Chadicus\IO\Directory::__construct
     */
    public function getPath()
    {
        $directory = new Directory(__DIR__);
        $this->assertSame($directory->path, $directory->getPath());
    }

    /**
     * Verify basic behavior of getHandle().
     *
     * @test
     * @covers ::getHandle
     * @uses \Chadicus\IO\Directory::__construct
     */
    public function getHandle()
    {
        $directory = new Directory(__DIR__);
        $this->assertSame($directory->handle, $directory->getHandle());
    }

    /**
     * Verify \Directory behavior.
     *
     * @test
     * @uses \Chadicus\IO\Directory::__construct
     */
    public function asDirectory()
    {
        $expected = glob(__DIR__ . '/*.php');
        sort($expected);
        $actual = [];
        $directory = new Directory(__DIR__);
        for ($entry = $directory->read(); $entry !== false; $entry = $directory->read()) {
            if (pathinfo($entry, PATHINFO_EXTENSION) !== 'php') {
                continue;
            }

            $actual[] = "{$directory->path}/{$entry}";
        }

        sort($actual);

        $this->assertSame($expected, $actual);
    }
}
