<?php

namespace Controller;

class ContaBancaria
{
    public function __construct(
        public string $titular,
        public float $saldo = 0.0
    ) {}

    public function depositar(float $valor): void
    {
        $this->saldo += $valor;
    }

    public function sacar(float $valor): void
    {
        $this->saldo -= $valor;
    }

    public function consultarSaldo(): float
    {
        return $this->saldo;
    }

    public function verificarSituacaoSaldo(): string
    {
        return match (true) {
            $this->saldo > 0 => "Positivo",
            $this->saldo < 0 => "Negativo",
            default => "Zero"
        };
    }
}