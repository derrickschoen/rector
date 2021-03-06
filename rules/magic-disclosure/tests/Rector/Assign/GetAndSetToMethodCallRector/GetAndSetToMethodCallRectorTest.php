<?php

declare(strict_types=1);

namespace Rector\MagicDisclosure\Tests\Rector\Assign\GetAndSetToMethodCallRector;

use Iterator;
use Rector\Core\Testing\PHPUnit\AbstractRectorTestCase;
use Rector\MagicDisclosure\Rector\Assign\GetAndSetToMethodCallRector;
use Rector\MagicDisclosure\Tests\Rector\Assign\GetAndSetToMethodCallRector\Source\Klarka;
use Rector\MagicDisclosure\Tests\Rector\Assign\GetAndSetToMethodCallRector\Source\SomeContainer;
use Symplify\SmartFileSystem\SmartFileInfo;

final class GetAndSetToMethodCallRectorTest extends AbstractRectorTestCase
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
            GetAndSetToMethodCallRector::class => [
                '$typeToMethodCalls' => [
                    SomeContainer::class => [
                        'get' => 'getService',
                        'set' => 'addService',
                    ],
                    Klarka::class => [
                        'get' => 'get',
                    ],
                ],
            ],
        ];
    }
}
