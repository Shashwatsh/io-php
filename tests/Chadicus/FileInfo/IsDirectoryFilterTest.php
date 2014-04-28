<?php
namespace Chadicus\FileInfo;

/**
 * @coversDefaultClass \Chadicus\FileInfo\IsDirectoryFilter
 */
final class IsDirectoryFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify basic behavior of filter()
     *
     * @test
     * @covers ::filter
     *
     * @return void
     */
    public function filterIsDirectory()
    {
        $this->assertTrue((new IsDirectoryFilter())->filter(new \SplFIleInfo(__DIR__)));
    }

    /**
     * Verify basic behavior of filter()
     *
     * @test
     * @covers ::filter
     *
     * @return void
     */
    public function filterIsNotDirectory()
    {
        $this->assertFalse((new IsDirectoryFilter())->filter(new \SplFIleInfo(__FILE__)));
    }
}
