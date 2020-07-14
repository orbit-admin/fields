<?php


namespace Orbit\Fields;


class Text extends Field
{
    public function defaultValue($value)
    {
        if (!is_string($value)) {
            throw new \InvalidArgumentException('Default value needs to be a string for Text fields');
        }
        return parent::defaultValue($value);
    }
}