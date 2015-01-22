<?php
namespace ChadicusTest\IO\Filter;

use Chadicus\IO\Filter\IsDirectoryFilter;

/**
 * Unit tests for the \Chadicus\IO\Filter\IsDirectoryFilter.
 *
 * @coversDefaultClass \Chadicus\IO\Filter\IsDirectoryFilter
 */
final class IsDirectoryFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify basic behavior of filter().
     *
     * @test
     * @covers ::filter
     *
     * @return void
     */
    public function filterIsDirectory()
    {
        $filter = new IsDirectoryFilter();
        $this->assertTrue($filter->filter(new \SplFIleInfo(__DIR__)));
    }

    /**
     * Verify basic behavior of filter().
     *
     * @test
     * @covers ::filter
     *
     * @return void
     */
    public function filterIsNotDirectory()
    {
        $filter = new IsDirectoryFilter();
        $this->assertFalse($filter->filter(new \SplFIleInfo(__FILE__)));
    }
}
