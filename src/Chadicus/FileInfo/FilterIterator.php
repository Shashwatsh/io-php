<?php
namespace Chadicus\FileInfo;

final class FilterIterator extends \FilterIterator
{
    /**
     * The filterer
     *
     * @var IFilter
     */
    private $filter;

    /**
     * Construct a new instance of FilterIterator
     *
     * @param \Iterator The iterator that is being filtered.
     * @param IFilter The filter
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
