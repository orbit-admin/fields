<?php


namespace Orbit\Fields\Parsers;


use Orbit\Fields\Field;

class JsonParser implements ParserInterface
{
    /**
     * @param Field[] $data
     * @return false|string
     */
    public static function parse(array $data)
    {
        return json_encode($data);
    }
}