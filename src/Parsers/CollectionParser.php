<?php

namespace Orbit\Fields\Parsers;

class CollectionParser implements ParserInterface
{

    /**
     * @param array $data
     * @return \Illuminate\Support\Collection|\Tightenco\Collect\Support\Collection
     */
    public static function parse(array $data)
    {
        return collect($data);
    }
}