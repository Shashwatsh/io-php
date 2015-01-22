<?php
namespace ChadicusTest\Filter;

use Chadicus\Filter\IsDirectoryFilter;

/**
 * Unit tests for the \Chadicus\Filter\IsDirectoryFilter.
 *
 * @coversDefaultClass \Chadicus\Filter\IsDirectoryFilter
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
