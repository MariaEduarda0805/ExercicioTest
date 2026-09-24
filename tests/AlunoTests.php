<?php

use PHPUnit\Framework\TestCase;
use Controller\AlunoController;

final class AlunoTests extends TestCase
{
    public function test_calcular_media_e_aprovacao(): void
    {
      
        $alunoAprovado = new AlunoController("João", 20, "101", 8.0, 7.0, 1.0, 1.0);
        $alunoReprovado = new AlunoController("Maria", 19, "102", 5.0, 6.0, 2.0, 2.0);

      
        $this->assertEquals(7.5, $alunoAprovado->calcularMedia());
        $this->assertTrue($alunoAprovado->verificarAprovacao());

        $this->assertEquals(5.5, $alunoReprovado->calcularMedia());
        $this->assertFalse($alunoReprovado->verificarAprovacao());
    }

    public function test_exibir_dados(): void
    {
    
        $aluno = new AlunoController("Maria Eduarda", 21, "103", 9.0, 8.0, 1.0, 1.0);

     
        $dados = $aluno->exibirDados();

      
        $this->assertStringContainsString("Nome: Maria Eduarda", $dados);
        $this->assertStringContainsString("Status: Aprovado", $dados);
    }
}