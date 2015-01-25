<?php
namespace ChadicusTest\IO\Comparer;

use Chadicus\IO\Comparer\ExtensionComparer;

/**
 * Unit tests for the \Chadicus\IO\Comparer\ExtensionComparer class.
 *
 * @coversDefaultClass \Chadicus\IO\Comparer\ExtensionComparer
 */
final class ExtensionComparerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify basic behavior of compare().
     *
     * @test
     * @covers ::compare
     *
     * @return void
     */
    public function compare()
    {
        $comparer = new ExtensionComparer();
        $fileOne = new \SplTempFileObject();
        $fileTwo = new \SplTempFileObject();

        $this->assertSame(0, $comparer->compare($fileOne, $fileTwo));
    }
}
