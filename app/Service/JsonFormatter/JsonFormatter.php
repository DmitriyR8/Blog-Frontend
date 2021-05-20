<?php

namespace App\Service\JsonFormatter;

/**
 * Class JsonFormatter
 * @package App\Service\JsonFormatter
 */
class JsonFormatter implements FormatterInterface
{

    /**
     * @param string $string
     * @return mixed
     */
    public function decode(string $string)
    {
        return json_decode($string, true);
    }
}