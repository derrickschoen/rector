<?php

declare(strict_types=1);

namespace Rector\Polyfill\Tests\Rector\If_\UnwrapFutureCompatibleIfFunctionExistsRector;

use Iterator;
use Rector\Core\Testing\PHPUnit\AbstractRectorTestCase;
use Rector\Polyfill\Rector\If_\UnwrapFutureCompatibleIfFunctionExistsRector;
use Symplify\SmartFileSystem\SmartFileInfo;

final class UnwrapFutureCompatibleIfFunctionExistsRectorTest extends AbstractRectorTestCase
{
    /**
     * @dataProvider provideData()
     */
    public function test(SmartFileInfo $file): void
    {
        $this->doTestFileInfo($file);
    }

    public function provideData(): Iterator
    {
        return $this->yieldFilesFromDirectory(__DIR__ . '/Fixture');
    }

    protected function getRectorClass(): string
    {
        return UnwrapFutureCompatibleIfFunctionExistsRector::class;
    }
}
