<?php


namespace Orbit\Fields\Parsers;


interface ParserInterface
{
    public static function parse(array $data);
}