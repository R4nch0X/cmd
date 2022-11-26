<?php

namespace Cmd\Repositories;

use Doctrine\Persistence\ObjectRepository;
use Doctrine\ORM\EntityNotFoundException;

interface ReadRepository extends ObjectRepository
{
    /**
     * @throws EntityNotFoundException
     *
     * @return object
     */
    public function get(int $id);

    /**
     * @throws EntityNotFoundException
     *
     * @return object|null
     */
    public function findOne(int $id);

    /**
     * @return array
     */
    public function all();

    public function findBy(array $criteria, ?array $orderBy = null, $limit = null, $offset = null);

    public function findOneBy(array $criteria);

    /**
     * @param mixed $entity
     */
    public function refresh($entity);

    public function findByIds(array $id): array;
}
