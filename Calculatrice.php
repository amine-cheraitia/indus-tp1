<?php

namespace MaCalculatrice;

use Throwable;
use DivisionByZeroError;


class Calculatrice
{
    public function addition(int $a, int $b): int
    {
        return $a + $b;
    }

    public function soustraction(int $a, int $b): int
    {
        return $a - $b;
    }

    public function multiplication(int $a, int $b): int
    {
        return $a * $b;
    }

    /*     public function division($a, $b)
    {
        try {
            return $a / $b;
            //  throw new DivisionByZeroError($e->message); 
        } catch (DivisionByZeroError $e) {
            return $e->getMessage();
        }
    } */

    function division($a,  $b)
    {
        try {
            if ($b == 0) {
                throw new DivisionByZeroError("Division by zero is not allowed.");
            }
            return $a / $b;
        } catch (DivisionByZeroError $e) {
            return $e->getMessage();
        } catch (Throwable $e) {
            return "An error occurred: " . $e->getMessage();
        }
    }
}
