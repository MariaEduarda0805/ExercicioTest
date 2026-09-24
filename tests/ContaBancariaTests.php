<?php

use PHPUnit\Framework\TestCase;
use Controller\ContaBancaria;

final class ContaBancariaTests extends TestCase
{
    public function test_operacoes_e_situacao_do_saldo(): void
    {
      
        $conta = new ContaBancaria("Carlos", 100.0);

       
        $conta->depositar(50.0);
        $this->assertEquals(150.0, $conta->consultarSaldo());
        $this->assertSame("Positivo", $conta->verificarSituacaoSaldo());

        
        $conta->sacar(200.0);
        $this->assertEquals(-50.0, $conta->consultarSaldo());
        $this->assertSame("Negativo", $conta->verificarSituacaoSaldo());
    }

    public function test_foreach_e_match_com_lista_de_contas(): void
    {
       
        $contas = [
            new ContaBancaria("Maria Eduarda", 100.0),
            new ContaBancaria("Carlos", -20.0),
            new ContaBancaria("Miguel", 0.0)
        ];

        $resultados = [];

       
        foreach ($contas as $c) {
            $resultados[$c->titular] = $c->verificarSituacaoSaldo();
        }

    
        $this->assertSame("Positivo", $resultados["Maria Eduarda"]);
        $this->assertSame("Negativo", $resultados["Carlos"]);
        $this->assertSame("Zero", $resultados["Miguel"]);
    }
}