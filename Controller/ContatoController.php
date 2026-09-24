<?php

namespace Controller;

class ContatoController
{
    public function __construct(
        public string $nome,
        public string $telefone,
        public string $email,
        public string $tipo
    ) {}

    public function exibirDados(): string
    {
        return "{$this->nome} | {$this->telefone} | {$this->email} | {$this->tipo}";
    }

    public function obterMensagemTipo(): string
    {
        return match (mb_strtolower($this->tipo)) {
            'amigo' => "Mensagem informal",
            'colega' => "Comunicação direta",
            'profissional' => "Comunicação formal",
            default => "Não foi especificado"
        };
    }
}