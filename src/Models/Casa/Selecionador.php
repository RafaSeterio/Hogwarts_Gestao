<?php
/**
 * Classe ChapeuSeletor (com polimorfismo)
 * Define o comportamento do chapéu seletor, que pode ser substituído por outras variações no futuro.
 */

namespace Casa;

class ChapeuSeletor
{
    public function escolherCasa(array $caracteristicasAluno, array $casasDisponiveis): Casa
    {
        $melhorCasa = null;
        $maiorCompatibilidade = 0;

        foreach ($casasDisponiveis as $casa) {
            if (!$casa instanceof Casa) {
                continue;
            }

            $caracteristicasCasa = $casa->getCaracteristicas();
            $compatibilidade = count(array_intersect($caracteristicasAluno, $caracteristicasCasa));

            if ($compatibilidade > $maiorCompatibilidade) {
                $maiorCompatibilidade = $compatibilidade;
                $melhorCasa = $casa;
            }
        }

        return $melhorCasa ?? $casasDisponiveis[0]; // retorna a primeira casa se não houver compatibilidade
    }
}
