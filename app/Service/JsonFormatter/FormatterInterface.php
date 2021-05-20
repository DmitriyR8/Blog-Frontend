<?php

namespace App\Service\JsonFormatter;

/**
 * Interface FormatterInterface
 * @package App\Service\JsonFormatter
 */
interface FormatterInterface
{
    /**
     * @param string $string
     * @return mixed
     */
    public function decode(string $string);
}