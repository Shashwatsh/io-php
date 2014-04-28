<?php
namespace Chadicus\FileInfo;

/**
 * @coversDefaultClass \Chadicus\FileInfo\NullComparer
 */
final class NullComparerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify basic behavior of compare()
     *
     * @test
     * @covers ::compare
     *
     * @return void
     */
    public function filter()
    {
        $this->assertSame(0, (new NullComparer())->compare(new \SplTempFileObject(), new \SplTempFileObject()));
    }
}
