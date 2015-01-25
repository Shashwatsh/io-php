<?php
namespace ChadicusTest\IO;

class DirectoryAwareTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Verify basic behavior of setDirectory().
     *
     * @test
     * @covers \Chadicus\IO\DirectoryAwareTrait
     *
     * @return void
     */
    public function setDirectory()
    {
        $object = $this->getObjectForTrait('\Chadicus\IO\DirectoryAwareTrait');
        $this->assertAttributeEquals(null, 'directory', $object);
        $directory = $this->getMock('\\Chadicus\\IO\\DirectoryInterface');
        $object->setDirectory($directory);
        $this->assertAttributeEquals($directory, 'directory', $object);
    }

    /**
     * Verify basic behavior of getDirectory().
     *
     * @test
     * @covers \Chadicus\IO\DirectoryAwareTrait
     *
     * @return void
     */
    public function getDirectory()
    {
        $object = $this->getObjectForTrait('\Chadicus\IO\DirectoryAwareTrait');
        $this->assertNull($object->getDirectory());
        $directory = $this->getMock('\\Chadicus\\IO\\DirectoryInterface');
        $object->setDirectory($directory);
        $this->assertEquals($directory, $object->getDirectory());
    }
}
