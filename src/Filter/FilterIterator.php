<?php
namespace Chadicus\Filter;

use Iterator;

/**
 * Implementation of the abstract \FilterIterator which uses an FilterInterface for filtering.
 */
final class FilterIterator extends \FilterIterator
{
    /**
     * The filterer.
     *
     * @var FilterInterface
     */
    private $filter;

    /**
     * Construct a new instance of FilterIterator.
     *
     * @param Iterator        $iterator The iterator that is being filtered.
     * @param FilterInterface $filter   The filter.
     */
    public function __construct(Iterator $iterator, FilterInterface $filter)
    {
        $this->filter = $filter;
        parent::__construct($iterator);
    }

    /**
     * Returns whether the current element of the iterator is acceptable through this filter.
     *
     * @return boolean
     */
    public function accept()
    {
        return $this->filter->filter($this->getInnerIterator()->current());
    }
}
