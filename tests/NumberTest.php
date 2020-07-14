<?php


namespace Orbit\Fields\Tests;


use Orbit\Fields\Number;
use Orbit\Fields\Parsers\JsonParser;
use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase
{
    /**
     * @test
     * @dataProvider incorrectDefaultValueProvider
     */
    public function default_value_needs_to_be_a_number($value)
    {
        $this->expectException(\InvalidArgumentException::class);
        $fields = [Number::make('field')->defaultValue($value)];
        JsonParser::parse($fields);
    }

    public function incorrectDefaultValueProvider()
    {
        return [
            'string' => ['Hello World'],
            'array' => [[]],
            'bool' => [true]
        ];
    }

    /**
     * @test
     * @dataProvider correctDefaultValueProvider
     */
    public function default_value_can_be_integer_or_float($value)
    {
        $fields = [Number::make('field')->defaultValue($value)];
        $response = JsonParser::parse($fields);
        $this->assertJsonStringEqualsJsonString($response, '[{"field": "Number", "name": "field", "defaultValue": ' . $value . ', "required": false}]');
    }

    public function correctDefaultValueProvider()
    {
        return [
            'float' => [1.3],
            'int' => [1]
        ];
    }
}