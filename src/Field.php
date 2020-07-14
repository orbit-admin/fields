<?php


namespace Orbit\Fields;


abstract class Field implements \JsonSerializable
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
            'field' => (new \ReflectionClass($this))->getShortName(),
            'name' => $this->name,
            'required' => $this->required,
            'defaultValue' => $this->defaultValue
        ];
    }
}