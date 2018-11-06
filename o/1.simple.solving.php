<?php

namespace Simple2;

abstract class AbstractEntity
{
    // .........
}

class A extends AbstractEntity
{
    // .........
}

class B extends AbstractEntity
{
    // .........
}

class C extends AbstractEntity
{
    // .........
}

class AccountEntity extends AbstractEntity
{
    // .........
}

class RoleEntity extends AbstractEntity
{
    // .........
}

interface IRepository
{
    /**
     * @param AbstractEntity $entity
     */
    public function save(AbstractEntity $entity);
}


class Repository implements IRepository
{
    // .........

    /**
     * @var IRepository[]
     */
    protected $customRepositories = [];

    /**
     * @param IRepository $repository
     * @param string $entityClass
     * @return static
     */
    public function addCustomRepository(IRepository $repository, string $entityClass)
    {
        $this->customRepositories[$entityClass] = $repository;
        return $this;
    }

    /**
     * @param AbstractEntity $entity
     */
    public function save(AbstractEntity $entity)
    {
        $className = get_class($entity);
        if (isset($this->customRepositories[$className])) {
            /**
             * @var IRepository $repository
             */
            $repository = $this->customRepositories[$className];
            $repository->save($entity);
        } else {
            // logic for save any entity
        }
    }


    // .........
}

class AccountRepository implements IRepository
{
    // .........

    public function save(AbstractEntity $entity)
    {
        // custom logic for save AccountEntity
    }

    // .........
}

class RoleRepository implements IRepository
{
    // .........

    public function save(AbstractEntity $entity)
    {
        // custom logic for save RoleEntity
    }

    // .........
}


$repository = new Repository();
$repository
    ->addCustomRepository(new AccountRepository(), AccountEntity::class)
    ->addCustomRepository(new RoleRepository(), RoleEntity::class)
;

$a = new A();
$b = new B();
$c = new C();
$account = new AccountEntity();
$role = new RoleEntity();

$repository->save($a);
$repository->save($b);
$repository->save($c);
$repository->save($account);
$repository->save($role);

