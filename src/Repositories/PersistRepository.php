<?php

namespace Cmd\Repositories;

interface PersistRepository
{
    public function save($entity): void;

    public function remove($entity): void;

    public function persist($entity): void;

    public function flush($entity = null): void;

    public function clear($entity = null): void;

    public function transactional(callable $function);
}
