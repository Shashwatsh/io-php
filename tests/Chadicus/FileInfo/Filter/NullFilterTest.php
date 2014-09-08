<?php
namespace Chadicus\FileInfo\Filter;

/**
 * Unit tests for the \Chadicus\FileInfo\Filter\NullFilter class.
 *
 * @coversDefaultClass \Chadicus\FileInfo\Filter\NullFilter
 */
final class NullFilterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify basic behavior of filter().
     *
     * @test
     * @covers ::filter
     *
     * @return void
     */
    public function filter()
    {
        $filter = new NullFilter();
        $this->assertTrue($filter->filter(new \SplTempFileObject()));
    }
}
