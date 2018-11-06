<?php

class A
{
    /**
     * @param int $a
     * @param string $b
     * @return bool
     */
    public function method1(int $a, string $b): bool
    {
        return $a != $b ?: true;
    }
}

class A1 extends A
{
    /**
     * @param int $a
     * @param string $b
     * @return bool
     * @throws Exception
     */
    public function method1(int $a, string $b): bool
    {
        if ($a < 0) {
            throw new \Exception('$a < 0');
        }
        return $a != $b ?: true;
    }
}

function userCases (A $a) {
    var_dump($a->method1(-1, 'test'));
}



userCases(new A());
userCases(new A1());