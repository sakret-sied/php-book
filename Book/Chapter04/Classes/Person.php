<?php

namespace Book\Chapter04\Classes;

use Book\Chapter04\Traits\PersonBasic;
use Core\Classes\OutputHelper;

/**
 * @property string $name
 * @property int $age
 *
 * @method void writeName()
 * @see PersonWriter::writeName()
 *
 * @method void writeAge()
 * @see PersonWriter::writeAge()
 */
class Person
{
    use PersonBasic;

    /** @var Account|null */
    public ?Account $account;
    /** @var PersonWriter */
    private PersonWriter $writer;
    /** @var string|null */
    private ?string $_name;
    /** @var int|null */
    private ?int $_age;
    /** @var int|null */
    private ?int $id;

    /**
     * @param string|null $name
     * @param int|null $age
     * @param $account
     */
    public function __construct(?string $name = null, ?int $age = null, $account = null)
    {
        $this->writer = new PersonWriter();
        $this->name = $name;
        $this->age = $age;
        $this->account = $account;
    }

    public function __destruct()
    {
        if (!empty($this->id)) {
            // сохранить данные из экземпляра класса Person
            OutputHelper::echoText('Сохранение персональных данных');
        }
    }

    /**
     * @return void
     */
    public function __clone()
    {
        $this->id = 0;
        $this->account = clone $this->account;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        $desc = $this->getName();
        $desc .= " (возраст {$this->getAge()} лет)";
        return $desc;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (method_exists($this->writer, $name)) {
            return $this->writer->$name($this);
        }
        return null;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset(string $name): bool
    {
        $method = "get$name";
        return method_exists($this, $method);
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        $method = "get{$name}";
        if (method_exists($this, $method)) {
            return $this->$method();
        }
        return null;
    }

    /**
     * @param $name
     * @param $value
     * @return mixed
     */
    public function __set($name, $value)
    {
        $method = "set$name";
        if (method_exists($this, $method)) {
            return $this->$method($value);
        }
        return null;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __unset(string $name)
    {
        $method = "set$name";
        if (method_exists($this, $method)) {
            $this->$method(null);
        }
        return null;
    }

    /**
     * @param string|null $name
     * @return void
     */
    public function setName(?string $name): void
    {
        $this->_name = mb_strtoupper($name);
    }

    /**
     * @param int|null $age
     * @return void
     */
    public function setAge(?int $age): void
    {
        $this->_age = $age;
    }

    /**
     * @param int $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}
