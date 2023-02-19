<?php

namespace Cmd\Repositories;

use Doctrine\ORM\EntityNotFoundException;
use Doctrine\Persistence\ObjectRepository;

interface ReadRepository extends ObjectRepository
{
    /**
     * @throws EntityNotFoundException
     */
    public function get(int $id): object;

    /**
     * @throws EntityNotFoundException
     */
    public function findOne(int $id): ?object;

    public function all(): array;

    public function findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null): array;

    public function findOneBy(array $criteria);

    public function refresh(mixed $entity);

    public function findByIds(array $id): array;
}
