<?php

declare(strict_types=1);

namespace Rector\MagicDisclosure\Tests\Rector\Isset_\UnsetAndIssetToMethodCallRector;

use Iterator;
use Rector\Core\Testing\PHPUnit\AbstractRectorTestCase;
use Rector\MagicDisclosure\Rector\Isset_\UnsetAndIssetToMethodCallRector;
use Rector\MagicDisclosure\Tests\Rector\Isset_\UnsetAndIssetToMethodCallRector\Source\LocalContainer;
use Symplify\SmartFileSystem\SmartFileInfo;

final class UnsetAndIssetToMethodCallRectorTest extends AbstractRectorTestCase
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

    /**
     * @return mixed[]
     */
    protected function getRectorsWithConfiguration(): array
    {
        return [
            UnsetAndIssetToMethodCallRector::class => [
                '$typeToMethodCalls' => [
                    LocalContainer::class => [
                        'isset' => 'hasService',
                        'unset' => 'removeService',
                    ],
                ],
            ],
        ];
    }
}
