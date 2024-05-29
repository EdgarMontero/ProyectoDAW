<?php

namespace App\Events;

use App\Models\Consulta;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ConsultaEstadoCambiado
{
    use Dispatchable, SerializesModels;

    public $consulta;

    /**
     * Create a new event instance.
     *
     * @param Consulta $consulta
     * @return void
     */
    public function __construct(Consulta $consulta)
    {
        $this->consulta = $consulta;
    }
}
