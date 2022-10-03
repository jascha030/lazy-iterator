<?php

declare(strict_types=1);

namespace Jascha030\Iterator\Lazy\Tests;

use ArrayIterator;
use PHPUnit\Framework\TestCase;
use Jascha030\Iterator\Lazy\LazyIterator;

final class LazyIteratorTest extends TestCase
{
    public function testGetIterator(): void
    {
        $iter = new LazyIterator(fn(): ArrayIterator => new ArrayIterator([1, 2]));

        $this->assertCount(2, $iter);
    }

    public function testLazyIterator(): void
    {
        new LazyIterator(function (): void {
            $this->fail('Test has failed, Lazy iterator factory function was called!');
        });

        $this->expectNotToPerformAssertions();
    }
}
