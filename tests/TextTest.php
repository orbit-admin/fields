<?php


namespace Orbit\Fields\Tests;


use Orbit\Fields\Parsers\JsonParser;
use Orbit\Fields\Text;
use PHPUnit\Framework\TestCase;

class TextTest extends TestCase
{
    /**
     * @test
     * @dataProvider defaultValueProvider
     */
    public function default_value_needs_to_be_a_string($value)
    {
        $this->expectException(\InvalidArgumentException::class);
        $fields = [Text::make('field')->defaultValue($value)];
        JsonParser::parse($fields);
    }

    public function defaultValueProvider()
    {
        return [
            'integer' => [1],
            'array' => [[]],
            'bool' => [true]
        ];
    }
}