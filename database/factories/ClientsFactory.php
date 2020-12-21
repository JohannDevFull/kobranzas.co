<?php

namespace Database\Factories;

use App\Models\Clients;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clients::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $estados=['ACUERDO PAGO','ACUERDO ESCRITO','ACUERDO ROTO','COMPROMISO DE LLAMADA','COMPORMISO DE PAGO','CUENTA DE COBRO','DEMANDADO','DEMANDAR','FORMALIZAR','ILOCALIZADO','NOTIFICACION 2','PAZ Y SALVO','MINIMA CUANTIA','ORDENA SACAR','REDIFERIR','FORMALIZAR PAZ Y SALVO','SIN ESPECIFICAR'];
        return [
            'client_code'=>random_int($min=1000000000,$max=9999999999),
            'contract_number'=>random_int($min=1000000000,$max=9999999999),
            'state_id'=>$estados[rand(1,15)],
            'user_id'=,
            'building_id',
        ];

    }
}
