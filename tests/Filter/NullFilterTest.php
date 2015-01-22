<?php
namespace ChadicusTest\IO\Filter;

use Chadicus\IO\Filter\NullFilter;

/**
 * Unit tests for the \Chadicus\IO\Filter\NullFilter class.
 *
 * @coversDefaultClass \Chadicus\IO\Filter\NullFilter
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
