<?php

namespace Controller;

class AlunoController
{
    public function __construct(
        public string $nome,
        public int $idade,
        public string $matricula,
        public float $nota1,
        public float $nota2,
        public float $peso1,
        public float $peso2
    ) {}

    public function calcularMedia(): float
    {
        return round((($this->nota1 * $this->peso1) + ($this->nota2 * $this->peso2)) / ($this->peso1 + $this->peso2), 2);
    }

    public function verificarAprovacao(): bool
    {
        return $this->calcularMedia() >= 7.0;
    }

    public function exibirDados(): string
    {
        $status = $this->verificarAprovacao() ? "Aprovado" : "Reprovado";
        return "Matrícula: {$this->matricula} | Nome: {$this->nome} | Média: {$this->calcularMedia()} | Status: {$status}";
    }
}