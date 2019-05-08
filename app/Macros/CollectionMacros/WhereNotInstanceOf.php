<?php


namespace App\Macros\CollectionMacros;

use Illuminate\Support\Collection;

class WhereNotInstanceOf
{
    /**
     * Filter
     *
     * @return callable
     */
    public function __invoke(): callable
    {
        return function (string $type): Collection {
            return $this->filter(function ($value) use ($type) {
                return !$value instanceof $type;
            });
        };
    }
}
