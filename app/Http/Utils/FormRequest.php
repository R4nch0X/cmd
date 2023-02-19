<?php

namespace App\Http\Utils;

use Cmd\Repositories\ReadRepository;
use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

abstract class FormRequest extends BaseFormRequest
{
    /**
     * @return ReadRepository
     */
    protected function repository(string $className)
    {
        $repository = $this->container->make($className);

        if ($repository instanceof ReadRepository) {
            return $repository;
        }

        throw new \RuntimeException("$className must implement ReadRepository or ObjectRepository");
    }
}
