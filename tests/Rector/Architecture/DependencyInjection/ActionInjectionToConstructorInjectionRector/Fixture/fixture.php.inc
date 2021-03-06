<?php

namespace Rector\Core\Tests\Rector\Architecture\DependencyInjection\ActionInjectionToConstructorInjectionRector\Fixture;

use Rector\Core\Tests\Rector\Architecture\DependencyInjection\ActionInjectionToConstructorInjectionRector\Source\ProductRepository;

final class SomeController
{
    public function default(ProductRepository $productRepository)
    {
        $products = $productRepository->fetchAll();
    }
}

?>
-----
<?php

namespace Rector\Core\Tests\Rector\Architecture\DependencyInjection\ActionInjectionToConstructorInjectionRector\Fixture;

use Rector\Core\Tests\Rector\Architecture\DependencyInjection\ActionInjectionToConstructorInjectionRector\Source\ProductRepository;

final class SomeController
{
    private \Rector\Core\Tests\Rector\Architecture\DependencyInjection\ActionInjectionToConstructorInjectionRector\Source\ProductRepository $productRepository;
    public function __construct(\Rector\Core\Tests\Rector\Architecture\DependencyInjection\ActionInjectionToConstructorInjectionRector\Source\ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function default()
    {
        $products = $this->productRepository->fetchAll();
    }
}

?>
