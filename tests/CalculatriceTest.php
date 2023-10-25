<?php

use PHPUnit\Framework\TestCase;
use MaCalculatrice\Calculatrice;


class CalculatriceTest extends TestCase
{
    public function testAddition()
    {
        $calculatrice = new Calculatrice();
        $val1 = 3;
        $val2 = 5;


        // Vérifie que les variables d'entrée sont des nombres
        $this->assertTrue(is_int($val1));
        $this->assertTrue(is_int($val2));

        // Effectue l'addition si les variables sont correctes
        if (is_int($val1) && is_int($val2)) {
            $resultat = $calculatrice->addition($val1, $val2);
            $this->assertEquals(8, $resultat);
        }
    }


    public function testSoustraction()
    {
        $calculatrice = new Calculatrice();
        $resultat = $calculatrice->soustraction(7, 5);
        $this->assertEquals(2, $resultat);
    }

    public function testMultiplication()
    {
        $calculatrice = new Calculatrice();
        $resultat = $calculatrice->multiplication(7, 5);
        $this->assertEquals(35, $resultat);
    }

    /*  public function testDivision()
    {
        $calculatrice = new Calculatrice();
        $resultat = $calculatrice->division(7, 5);
        $this->assertEquals(1.4, $resultat);
    }

    public function testDivisionParZero()
    {
        $calculatrice = new Calculatrice();
/*         $resultat = $calculatrice->division(7, 0);
        $this->assertEquals("Division par zéro impossible.", $resultat); */

    /*
        try {
            $calculatrice->division(10, 0);
            $this->fail("L'exception DivisionByZeroError n'a pas été levée.");
        } catch (DivisionByZeroError $e) {
            $this->assertEquals("Division by zero is not allowed.", $e->getMessage());
        }
    }
 */
    public function testDivision()
    {
        $calculatrice = new Calculatrice();

        // Test de division sans division par zéro
        $resultat = $calculatrice->division(10, 2);
        $this->assertEquals(5, $resultat);
    }

    /*     public function testDivisionParZero()
    {
        $calculatrice = new Calculatrice();

        // Test de division par zéro
        $this->expectException(DivisionByZeroError::class);
        $calculatrice->division(10, 0);
    } */


    public function testDivisionNormale()
    {
        $calculatrice = new Calculatrice();
        $resultat = $calculatrice->division(10, 2);
        $this->assertEquals(5, $resultat);
    }

    public function testDivisionParZero()
    {
        $calculatrice = new Calculatrice();
        $resultat = $calculatrice->division(10, 0);
        $this->assertEquals("Division by zero is not allowed.", $resultat);
    }

    public function testDivisionAvecErreur()
    {
        $calculatrice = new Calculatrice();
        $resultat = $calculatrice->division(10, 'a');
        $this->assertEquals("An error occurred: Unsupported operand types: int / string", $resultat);
    }
}
