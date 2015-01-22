<?php
namespace ChadicusTest\IO\Filter;

use Chadicus\IO\Filter\FilterIterator;

/**
 * Unit tests for the \Chadicus\IO\Filter\FilterIterator class.
 *
 * @coversDefaultClass \Chadicus\IO\Filter\FilterIterator
 */
final class FilterIteratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify basic behavior of compare().
     *
     * @test
     * @covers ::__construct
     * @covers ::accept
     *
     * @return void
     */
    public function acceptNone()
    {
        $files = [
            new \SplTempFileObject(),
            new \SplTempFileObject(),
            new \SplTempFileObject(),
        ];

        $mockFilter = $this->getMockBuilder('\\Chadicus\\IO\\Filter\\FilterInterface')->getMock();
        $mockFilter->method('filter')->willReturn(false);

        $iterator = new FilterIterator(new \ArrayIterator($files), $mockFilter);
        $actual = [];
        foreach ($iterator as $item) {
            $actual[] = $item;
        }

        $this->assertSame([], $actual);
    }
}
