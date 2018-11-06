<?php

namespace Strategy0;

class StatisticAnalyser
{
    /**
     * @param array $data
     * @return float|int
     */
    public function analyse(array $data)
    {
        return array_sum($data);
    }
}


$initialData = [
    3, 2, 1, 4, 5, 6, 2, 1, 4, 5
];

$analyser = new StatisticAnalyser();

echo $analyser->analyse($initialData) . PHP_EOL;


namespace Strategy1;

class StatisticAnalyser
{
    const TYPE_SUM = 0;
    const TYPE_AVERAGE = 1;
    const TYPE_MAX = 2;
    const TYPE_MIN = 3;

    /**
     * @param array $data
     * @param int $type
     * @return float|int
     * @throws \Exception
     */
    public function analyse(array $data, int $type = self::TYPE_SUM)
    {
        if ($type == self::TYPE_SUM) {
            $result = array_sum($data);

        } elseif ($type == self::TYPE_AVERAGE) {
            $result = array_sum($data) / count($data);

        } elseif ($type == self::TYPE_MAX) {
            $result = max($data);

        } elseif ($type == self::TYPE_MIN) {
            $result = min($data);

        } else {
            throw new \Exception('Undefined type statistic');
        }
        return $result;
    }


    /**
     * @param array $data
     * @param int $type
     * @return float|int
     * @throws \Exception
     */
    public function analyse2(array $data, int $type = self::TYPE_SUM)
    {
        switch ($type) {
            case  self::TYPE_SUM:
                $result = array_sum($data);
                break;
            case  self::TYPE_AVERAGE:
                $result = array_sum($data) / count($data);
                break;
            case  self::TYPE_MAX:
                $result = max($data);
                break;
            case  self::TYPE_MIN:
                $result = min($data);
                break;
            default:
                throw new \Exception('Undefined type statistic');
        }
        return $result;
    }
}


$initialData = [
    3, 2, 1, 4, 5, 6, 2, 1, 4, 5
];

$analyser = new StatisticAnalyser();

echo "Total: " . $analyser->analyse($initialData) . PHP_EOL;
echo "Average: " . $analyser->analyse($initialData, StatisticAnalyser::TYPE_AVERAGE) . PHP_EOL;
echo "Max: " . $analyser->analyse($initialData, StatisticAnalyser::TYPE_MAX) . PHP_EOL;
echo "Min: " . $analyser->analyse($initialData, StatisticAnalyser::TYPE_MIN) . PHP_EOL;


