<?php

namespace App\Infrastructure\Doctrine\Mappings;

use Cmd\Entities\Team;
use LaravelDoctrine\Fluent\EntityMapping;
use LaravelDoctrine\Fluent\Fluent;

class TeamMapping extends EntityMapping
{
    /**
     * {@inheritDoc}
     */
    public function mapFor(): string
    {
        return Team::class;
    }

    /**
     * {@inheritDoc}
     */
    public function map(Fluent $builder)
    {
        $builder->integer('id')->autoIncrement()->primary();
        $builder->string('name')->unique();
        $builder->string('description')->nullable();
        $builder->boolean('active');
        $builder->string('flag')->nullable();
        $builder->string('colors')->nullable();
        $builder->timestamps('createdAt', 'updatedAt');
        $builder->softDelete('deletedAt');
    }
}
