<?php
namespace ChadicusTest\IO\Filter;

use Chadicus\IO\Filter\ExtensionFilter;

/**
 * Unit tests for the \Chadicus\IO\Filter\ExtensionFilter class.
 *
 * @coversDefaultClass \Chadicus\IO\Filter\ExtensionFilter
 */
final class ExtensionFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify basic behavior of filter().
     *
     * @test
     * @covers ::__construct
     * @covers ::filter
     * @uses \Chadicus\IO\Filter\ExtensionFilter::__construct
     *
     * @return void
     */
    public function filterFileExtensionMatch()
    {
        $filter = new ExtensionFilter('php');
        $this->assertTrue($filter->filter(new \SplFIleInfo(__FILE__)));
    }

    /**
     * Verify basic behavior of filter().
     *
     * @test
     * @covers ::__construct
     * @covers ::filter
     * @uses \Chadicus\IO\Filter\ExtensionFilter::__construct
     *
     * @return void
     */
    public function filterFileExtensionNotMatch()
    {
        $filter = new ExtensionFilter('txt');
        $this->assertFalse($filter->filter(new \SplFIleInfo(__FILE__)));
    }

    /**
     * Verify basic behavior of filter().
     *
     * @test
     * @covers ::__construct
     * @covers ::filter
     * @uses \Chadicus\IO\Filter\ExtensionFilter::__construct
     *
     * @return void
     */
    public function filterDirectory()
    {
        $filter = new ExtensionFilter('php');
        $this->assertFalse($filter->filter(new \SplFIleInfo(__DIR__)));
    }
}
