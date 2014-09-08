<?php
namespace Chadicus\FileInfo;

use Chadicus\FileInfo\Filter\AlwaysFalseFilter;

/**
 * Unit tests for the \Chadicus\FileInfo\FilterIterator class.
 *
 * @coversDefaultClass \Chadicus\FileInfo\FilterIterator
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
        $files = array(
            new \SplTempFileObject(),
            new \SplTempFileObject(),
            new \SplTempFileObject(),
        );

        $iterator = new FilterIterator(new \ArrayIterator($files), new AlwaysFalseFilter());
        $actual = array();
        foreach ($iterator as $item) {
            $actual[] = $item;
        }

        $this->assertSame(array(), $actual);
    }
}
