<?php
namespace Chadicus\FileInfo;

/**
 * @coversDefaultClass \Chadicus\FileInfo\ExtensionFilter
 */
final class ExtensionFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify basic behavior of filter()
     *
     * @test
     * @covers ::__construct
     * @covers ::filter
     * @uses \Chadicus\FileInfo\ExtensionFilter::__construct
     *
     * @return void
     */
    public function filterFileExtensionMatch()
    {
        $this->assertTrue((new ExtensionFilter('php'))->filter(new \SplFIleInfo(__FILE__)));
    }

    /**
     * Verify basic behavior of filter()
     *
     * @test
     * @covers ::__construct
     * @covers ::filter
     * @uses \Chadicus\FileInfo\ExtensionFilter::__construct
     *
     * @return void
     */
    public function filterFileExtensionNotMatch()
    {
        $this->assertFalse((new ExtensionFilter('txt'))->filter(new \SplFIleInfo(__FILE__)));
    }

    /**
     * Verify basic behavior of filter()
     *
     * @test
     * @covers ::__construct
     * @covers ::filter
     * @uses \Chadicus\FileInfo\ExtensionFilter::__construct
     *
     * @return void
     */
    public function filterDirectory()
    {
        $this->assertFalse((new ExtensionFilter('php'))->filter(new \SplFIleInfo(__DIR__)));
    }
}
