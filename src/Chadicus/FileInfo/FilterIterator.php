<?php
namespace Chadicus\FileInfo;

/**
 * Implementation of the abstract \FilterIterator which uses an IFilter for filtering.
 */
final class FilterIterator extends \FilterIterator
{
    /**
     * The filterer.
     *
     * @var IFilter
     */
    private $filter;

    /**
     * Construct a new instance of FilterIterator.
     *
     * @param \Iterator $iterator The iterator that is being filtered.
     * @param IFilter   $filter   The filter.
     */
    public function __construct(\Iterator $iterator, IFilter $filter)
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
