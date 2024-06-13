<?php

namespace Karaev\Admin\Infrastructure\Eloquent\Repository;

use Karaev\Admin\Domain\Api\Data\AdminInterface;
use Karaev\Admin\Domain\Api\AdminRepositoryInterface;
use Karaev\Admin\Infrastructure\Eloquent\Transformer\AdminTransformer;

class AdminRepository implements AdminRepositoryInterface
{
    public function __construct(private AdminTransformer $adminTransformer) {}

    public function save(AdminInterface $admin)
    {
        $booking = $this->adminTransformer->domainToEntity($admin);
        $booking->save();

        return $this->adminTransformer->entityToDomain($booking);
    }
}
