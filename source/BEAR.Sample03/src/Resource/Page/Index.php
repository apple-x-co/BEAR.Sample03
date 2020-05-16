<?php
namespace MyVendor\MyProject\Resource\Page;

use BEAR\RepositoryModule\Annotation\Cacheable;
use BEAR\Resource\ResourceObject;

/**
 * Class Index
 * @package MyVendor\MyProject\Resource\Page
 *
 * @Cacheable()
 */
class Index extends ResourceObject
{
    public function onGet(string $name = 'BEAR.Sunday') : ResourceObject
    {
        $this->body = [
            'greeting' => 'Hello ' . $name
        ];

        return $this;
    }
}
