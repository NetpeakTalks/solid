<?php

namespace Strategy2;


interface IAnalyser
{
    /**
     * @param array $data
     * @return float|int
     */
    public function analyse(array $data);

}

/**
 * Class StatisticAnalyser -- this is CONTEXT for strategy
 */
class StatisticAnalyser
{
    /**
     * @var IAnalyser
     */
    protected $analyser;

    /**
     * StatisticAnalyser constructor.
     * @param IAnalyser $analyser
     */
    public function __construct(IAnalyser $analyser)
    {
        $this->analyser = $analyser;
    }

    /**
     * @param IAnalyser $analyser
     */
    public function changeStrategy(IAnalyser $analyser)
    {
        $this->analyser = $analyser;
    }

    /**
     * @param array $data
     * @return float|int
     */
    public function analyse(array $data)
    {
        return $this->analyser->analyse($data);
    }
}

class AnalyserSum implements IAnalyser
{
    /**
     * @inheritdoc
     */
    public function analyse(array $data)
    {
        return array_sum($data);
    }
}

class AnalyserAverage implements IAnalyser
{
    /**
     * @inheritdoc
     */
    public function analyse(array $data)
    {
        return array_sum($data) / count($data);
    }
}

class AnalyserMax implements IAnalyser
{
    /**
     * @inheritdoc
     */
    public function analyse(array $data)
    {
        return max($data);
    }
}
class AnalyserMin implements IAnalyser
{
    /**
     * @inheritdoc
     */
    public function analyse(array $data)
    {
        return min($data);
    }
}


$initialData = [
    3, 2, 1, 4, 5, 6, 2, 1, 4, 5
];

$analyser = new StatisticAnalyser(new AnalyserSum());

echo "Total: " . $analyser->analyse($initialData) . PHP_EOL;

$analyser->changeStrategy(new AnalyserAverage());
echo "Average: " . $analyser->analyse($initialData) . PHP_EOL;

$analyser->changeStrategy(new AnalyserMax());
echo "Max: " . $analyser->analyse($initialData) . PHP_EOL;

$analyser->changeStrategy(new AnalyserMin());
echo "Min: " . $analyser->analyse($initialData) . PHP_EOL;


