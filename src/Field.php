<?php


namespace Orbit\Fields;


class Field implements \JsonSerializable
{
    protected string $name;

    protected bool $required = false;

    protected $defaultValue;

    public static function make(...$arguments)
    {
        return new static(...$arguments);
    }

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function required($value = true)
    {
        $this->required = $value;
        return $this;
    }

    public function defaultValue($value)
    {
        $this->defaultValue = $value;
        return $this;
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'required' => $this->required,
            'defaultValue' => $this->defaultValue
        ];
    }
}