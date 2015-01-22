<?php
namespace Chadicus;

use IteratorAggregate;
use FileSystemIterator;

/**
 * Class for sorting and filtering a directory path.
 */
class Collection implements IteratorAggregate
{
    /**
     * Comparer for sorting the collection.
     *
     * @var ComparerInterface
     */
    private $comparer;

    /**
     * Iterator for the collection.
     *
     * @var \Iterator
     */
    private $iterator;

    /**
     * The file system path to iterate over.
     *
     * @var string
     */
    private $path;

    /**
     * Construct a new FileInfo collection.
     *
     * @param string            $path     The path of the filesystem item to be iterated over.
     * @param FilterInterface   $filter   Filter to apply to the path contents.
     * @param ComparerInterface $comparer Comparer to apply to the path contents.
     */
    final public function __construct(
        $path,
        Filter\FilterInterface $filter = null,
        Comparer\ComparerInterface $comparer = null
    ) {
        $this->path = $path;

        if ($filter === null) {
            $filter = new Filter\NullFilter();
        }

        $this->comparer = $comparer;

        $this->iterator = new Filter\FilterIterator(new FileSystemIterator($this->path), $filter);
    }

    /**
     * Sets the sort for this collection.
     *
     * @param Comparer\ComparerInterface $comparer The comparer to be used for sorting.
     *
     * @return Collection Returns $this for fluent interface.
     */
    final public function setComparer(Comparer\ComparerInterface $comparer)
    {
        $this->comparer = $comparer;
        return $this;
    }

    /**
     * Sets the filter for this collection.
     *
     * @param Filter\FilterInterface $filter The filter to use for filtering.
     *
     * @return Collection Returns $this for fluent interface.
     */
    final public function setFilter(Filter\FilterInterface $filter)
    {
        $this->iterator = new Filter\FilterIterator(new FileSystemIterator($this->path), $filter);
        return $this;
    }

    /**
     * Returns the iterator for this collection.
     *
     * @return \Iterator
     */
    final public function getIterator()
    {
        if ($this->comparer === null) {
            return $this->iterator;
        }

        $iterator = new \ArrayIterator(iterator_to_array($this->iterator));

        $comparer = $this->comparer;
        $iterator->uasort(function ($a, $b) use ($comparer) {
            return $comparer->compare($a, $b);
        });

        return $iterator;
    }
}
