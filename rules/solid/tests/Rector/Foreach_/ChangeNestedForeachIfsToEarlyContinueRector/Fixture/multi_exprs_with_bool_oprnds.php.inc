<?php

namespace Rector\SOLID\Tests\Rector\Foreach_\ChangeNestedForeachIfsToEarlyContinueRector\Fixture;

use Rector\Core\Testing\Contract\RunnableInterface;

class MultiExprsWithBoolOprnds implements RunnableInterface
{
    public function run()
    {
        $partPackageList = [ new \StdClass(), 'string' ];
        $payload = [];

        foreach( $partPackageList as $partPackage )
        {
            if(! is_null( $partPackage ) && ! is_object($partPackage) )
            {
                if (1 === 1 || 2 === 2)
                {
                    $payload[] = $partPackage;
                }
            }
        }

        return json_encode($payload);
    }
}

?>
-----
<?php

namespace Rector\SOLID\Tests\Rector\Foreach_\ChangeNestedForeachIfsToEarlyContinueRector\Fixture;

use Rector\Core\Testing\Contract\RunnableInterface;

class MultiExprsWithBoolOprnds implements RunnableInterface
{
    public function run()
    {
        $partPackageList = [ new \StdClass(), 'string' ];
        $payload = [];

        foreach ($partPackageList as $partPackage) {
            if (!! is_null( $partPackage )) {
            }
            if (!! is_object($partPackage)) {
            }
            if (1 === 1 && 2 === 2) {
                continue;
            }
            $payload[] = $partPackage;
        }

        return json_encode($payload);
    }
}

?>
