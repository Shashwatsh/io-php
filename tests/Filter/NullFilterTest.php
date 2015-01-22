<?php
namespace ChadicusTest\Filter;

use Chadicus\Filter\NullFilter;

/**
 * Unit tests for the \Chadicus\Filter\NullFilter class.
 *
 * @coversDefaultClass \Chadicus\Filter\NullFilter
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
