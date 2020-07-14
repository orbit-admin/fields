<?php

namespace Orbit\Fields\Tests;

use Orbit\Fields\Parsers\JsonParser;
use Orbit\Fields\Text;
use PHPUnit\Framework\TestCase;

class FieldTest extends TestCase
{
    /** @test */
    public function fields_render_valid_json()
    {
        $fields = [Text::make('field')];
        $response = JsonParser::parse($fields);
        $this->assertJson($response);
    }

    /** @test */
    public function fields_have_default_values()
    {
        $fields = [Text::make('field')];
        $response = JsonParser::parse($fields);
        $this->assertJsonStringEqualsJsonString($response, '[{"name": "field", "required": false, "defaultValue": null}]');
    }

    /** @test */
    public function fields_can_be_required()
    {
        $fields = [Text::make('field')->required()];
        $response = JsonParser::parse($fields);
        $this->assertJsonStringEqualsJsonString($response, '[{"name": "field", "required": true, "defaultValue": null}]');
    }

    /** @test */
    public function fields_require_a_name()
    {
        $this->expectException('ArgumentCountError');
        $fields = [Text::make()->required()];
        JsonParser::parse($fields);
    }

    /** @test */
    public function fields_have_a_name()
    {
        $fields = [Text::make('Master Blaster')->required()];
        $response = JsonParser::parse($fields);
        $this->assertJsonStringEqualsJsonString($response, '[{"name": "Master Blaster", "required": true, "defaultValue": null}]');
    }

    /** @test */
    public function fields_can_have_a_default_value()
    {
        $fields = [Text::make('field')->defaultValue('Master Baiter')];
        $response = JsonParser::parse($fields);
        $this->assertJsonStringEqualsJsonString($response, '[{"name": "field", "required": false, "defaultValue": "Master Baiter"}]');
    }
}