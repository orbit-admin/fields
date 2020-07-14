<?php

namespace Orbit\Fields\Tests;


use Orbit\Fields\Parsers\CollectionParser;
use PHPUnit\Framework\TestCase;
use Tightenco\Collect\Support\Collection;

class CollectionParserTest extends TestCase
{
    /** @test */
    public function fields_render_valid_collection()
    {
        $fields = [AbstractField::make('field')];
        $response = CollectionParser::parse($fields);
        $this->assertInstanceOf(Collection::class, $response);
        $this->assertEquals('field', $response->first()->name);
    }

}