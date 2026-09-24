<?php

use PHPUnit\Framework\TestCase;
use Controller\ContatoController;

final class ContatoTests extends TestCase
{
    public function test_exibir_dados_e_mensagens(): void
    {
        
        $contato = new ContatoController("Gustavo", "9999-9999", "gustavinho@email.com", "Amigo");

       
        $this->assertStringContainsString("Gustavo", $contato->exibirDados());
        $this->assertSame("Mensagem informal", $contato->obterMensagemTipo());
    }

    public function test_foreach_e_match_com_lista_de_contatos(): void
    {
       
        $contatos = [
            new ContatoController("João", "111", "joao@email.com", "Amigo"),
            new ContatoController("Maria", "222", "madu@email.com", "Colega"),
            new ContatoController("Dr. Cardoso", "333", "cardoso@email.com", "Profissional")
        ];

        $mensagens = [];

        foreach ($contatos as $c) {
            $mensagens[$c->nome] = $c->obterMensagemTipo();
        }

        $this->assertSame("Mensagem informal", $mensagens["João"]);
        $this->assertSame("Comunicação direta", $mensagens["Maria"]);
        $this->assertSame("Comunicação formal", $mensagens["Dr. Cardoso"]);
    }
}