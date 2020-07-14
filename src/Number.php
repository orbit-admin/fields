<?php


namespace Orbit\Fields;


class Number extends Field
{
    public function defaultValue($value)
    {
        if (!is_integer($value) && !is_float($value)) {
            throw new \InvalidArgumentException('Default value needs to be an integer or a float for Number fields');
        }
        return parent::defaultValue($value);
    }
}