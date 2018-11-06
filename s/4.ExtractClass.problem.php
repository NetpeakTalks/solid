<?php

namespace EC0;


class User
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $phone;

    /**
     * UserV1 constructor.
     * @param string $name
     * @param string $phone
     */
    public function __construct(string $name, string $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }
}

new User('John Doe', '0971112233');

namespace EC1;

class User
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $phone;

    /**
     * @var string
     */
    protected $phoneOperator;

    /**
     * UserV1 constructor.
     * @param string $name
     * @param string $phone
     * @throws \Exception
     */
    public function __construct(string $name, string $phone)
    {
        $this->name = $name;

        $this->phone = $phone;
        $this->parseNumber();
        $this->validateNumber();
        $this->checkAvailabilityPhone();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getPhoneOperator(): string
    {
        return $this->phoneOperator;
    }


    protected function parseNumber()
    {
        // parse $this->number
        $this->phoneOperator = "097";
    }

    /**
     * @throws \Exception
     */
    protected function validateNumber()
    {
        // logic validate $this->number
    }

    /**
     * @throws \Exception
     */
    protected function checkAvailabilityPhone()
    {
        // logic check phone number for availability
    }

}

new User('John Doe', '0971112233');
