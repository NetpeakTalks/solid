<?php
namespace Facade2;

class CPU
{
    public function freeze()
    {
        // difficult logic for CPU freeze
    }

    /**
     * @param $address
     */
    public function jump($address)
    {
        // difficult logic for CPU jump to $address
    }

    public function execute()
    {
        // difficult logic for CPU execute
    }
}

class Memory
{
    /**
     * @param $address
     * @param $data
     */
    public function load($address, $data)
    {
        // Loading address $address with data: $data
    }
}

class Disk
{
    /**
     * @param $sector
     * @param $size
     * @return string
     */
    public function read($sector, $size)
    {
        return "data from sector $sector ($size)";
    }
}

// Facade
class Computer
{
    const BOOT_ADDRESS = 0;
    const BOOT_SECTOR = 1;
    const SECTOR_SIZE = 16;

    /**
     * @var CPU
     */
    protected $cpu;
    /**
     * @var Memory
     */
    protected $mem;
    /**
     * @var Disk
     */
    protected $hd;

    /**
     * Computer constructor.
     * @param CPU $cpu
     * @param Memory $mem
     * @param Disk $hd
     */
    public function __construct(CPU $cpu, Memory $mem, Disk $hd)
    {
        $this->cpu = $cpu;
        $this->mem = $mem;
        $this->hd = $hd;
    }

    public function startComputer()
    {
        $this->cpu->freeze();
        $dataForStart = $this->hd->read(
            static::BOOT_SECTOR,
            static::SECTOR_SIZE
        );
        $this->mem->load(
            static::BOOT_ADDRESS,
            $dataForStart
        );
        $this->cpu->jump(self::BOOT_ADDRESS);
        $this->cpu->execute();
    }
}

// Usage example
$pc = new Computer(
    new CPU(),
    new Memory(),
    new Disk()
);
$pc->startComputer();

