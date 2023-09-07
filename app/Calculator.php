<?php

namespace App;

class Calculator
{

    public function add(string $par) :int
    {
        if (empty($par)) {
            return 0;
        }
        if (strlen($par) == 1 ) {
            return (int)$par;
        }
        if (str_ends_with($par, ',')) {
            throw new \Exception('Parameter ended with comma separator');
        }
        $nums = explode(',', str_replace(["\n", '|', ';', 'sep'], ',', $par));

        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] >= 1000) {
                unset($nums[$i]);
            }
        }
        for ($i = 0; $i < count($nums); $i++) {
            if ((int)$nums[$i] < 0) {
                $navNum[] = (int)$nums[$i];
            }
        }
        if (!empty($navNum)) {
            throw new \Exception('Negative number(s) not allowed: ' . implode(', ', $navNum));
        } else {
            return array_sum($nums);
        }
    }
}