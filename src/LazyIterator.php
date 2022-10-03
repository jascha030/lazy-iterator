<?php

declare(strict_types=1);

namespace Jascha030\Iterator\Lazy;

use Closure;
use IteratorAggregate;
use Traversable;

class LazyIterator implements IteratorAggregate
{
    private Closure $factory;

    public function __construct(callable $factory)
    {
        $this->factory = $factory instanceof Closure
            ? $factory
            : Closure::fromCallable($factory);
    }

    public function getIterator(): Traversable
    {
        yield from ($this->factory)();
    }
}
