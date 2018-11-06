<?php
namespace Facade1;

class Computer
{
    const BOOT_ADDRESS = 0;
    const BOOT_SECTOR = 1;
    const SECTOR_SIZE = 16;

    protected function cpuFreeze()
    {
        // difficult logic for CPU freeze
    }

    /**
     * @param $address
     */
    protected function cpuJump($address)
    {
        // difficult logic for CPU jump to $address
    }

    protected function cpuExecute()
    {
        // difficult logic for CPU execute
    }

    /**
     * @param $address
     * @param $data
     */
    protected function memoryLoad($address, $data)
    {
        // Loading address $address with data: $data
    }

    /**
     * @param $sector
     * @param $size
     * @return string
     */
    protected function discRead($sector, $size)
    {
        return "data from sector $sector ($size)";
    }

    public function startComputer()
    {
        $this->cpuFreeze();
        $dataForStart = $this->discRead(
            static::BOOT_SECTOR,
            static::SECTOR_SIZE
        );
        $this->memoryLoad(
            static::BOOT_ADDRESS,
            $dataForStart
        );
        $this->cpuJump(static::BOOT_ADDRESS);
        $this->cpuExecute();
    }
}

$pc = new Computer();
$pc->startComputer();




