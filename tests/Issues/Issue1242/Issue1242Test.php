<?php

declare(strict_types=1);

namespace Rector\Core\Tests\Issues\Issue1242;

use Rector\Core\Testing\PHPUnit\AbstractRectorTestCase;
use Symplify\SmartFileSystem\SmartFileInfo;

final class Issue1242Test extends AbstractRectorTestCase
{
    public function test(): void
    {
        $fixtureFileInfo = new SmartFileInfo(__DIR__ . '/Fixture/fixture1242.php.inc');
        $this->doTestFileInfo($fixtureFileInfo);
    }

    protected function provideConfig(): string
    {
        return __DIR__ . '/../../../config/set/twig/twig-underscore-to-namespace.yaml';
    }
}
