<?php
namespace App\Models\Academico;

//modulo 4
abstract class Avaliacao {
    protected float $nota;

    public function __construct(float $nota) {
        $this->nota = $nota;
    }

    abstract public function tipo(): string;

    public function getNota(): float {
        return $this->nota;
    }
}

class Prova extends Avaliacao {
    public function tipo(): string {
        return 'Prova';
    }
}

class Trabalho extends Avaliacao {
    public function tipo(): string {
        return 'Trabalho';
    }
}
