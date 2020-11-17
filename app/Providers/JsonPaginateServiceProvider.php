<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class JsonPaginateServiceProvider
{
    /**
     * Load Macro in AppServiceProvider.php in boot method.
     * Example : (new JsonPaginate())->loadMacro();
     * Call like this : User::with('posts)->jsonPaginate() or User::with('posts)->jsonSimplePaginate();
     *
     * @return Illuminate\Support\Collection
     * @author vijaybajrot@gmail.com <Vijay Bajrot>
     */

    public function loadMacro()
    {
        $this->macro();
    }

    public function macro()
    {
        $self = new static;
        Builder::macro('jsonPaginate', function () use ($self) {
            return $self->mapPaginatorToLinks($this->paginate());
        });

        Builder::macro('jsonSimplePaginate', function () use ($self) {
            return $self->mapPaginatorToLinks($this->simplePaginate());
        });
    }

    public function mapPaginatorToLinks($paginator)
    {
        return new Collection([
            'items' => $paginator->items(),
            'links' => $this->getLinks($paginator),
        ]);
    }

    public function getLinks($paginator)
    {
        return (new Collection($paginator->toArray()))->only($this->linksKeys());
    }

    public function linksKeys(): array
    {
        return [
            "current_page",
            "first_page_url",
            "from",
            "last_page",
            "last_page_url",
            "next_page_url",
            "path",
            "per_page",
            "prev_page_url",
            "to",
            "total",
        ];
    }
}
