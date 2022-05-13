<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class SituationIndicatedEnum extends Enum
{
    const INICIADA = 'Iniciada';
    const EMPROCESSO = 'Em Processo';
    const FINALIZADA = 'Finalizada';

    public static function situationsIndicated($situation)
    {   
        if($situation == 1) {
            return self::INICIADA;
        } else if($situation == 2) {
            return self::EMPROCESSO;
        } else {
            return self::FINALIZADA;
        }
    }

    public static function situationIndicateds()
    {
        return [
            '1' => self::INICIADA,
            '2' => self::EMPROCESSO,
            '3' => self::FINALIZADA
        ];
    }
}
