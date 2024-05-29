<?php

namespace App\Listeners;

use App\Events\ConsultaEstadoCambiado;
use App\Mail\ConsultaEstadoCambiadoMailable;
use Illuminate\Support\Facades\Mail;

class EnviarCorreoCambioEstado
{
    /**
     * Handle the event.
     *
     * @param  ConsultaEstadoCambiado  $event
     * @return void
     */
    public function handle(ConsultaEstadoCambiado $event)
    {
        $consulta = $event->consulta;
        $paciente = $consulta->paciente; 
        $user = $paciente->user; 
        $email = $user->email; 
       
        if (empty($email)) {
            throw new \Exception('El correo electrónico del paciente está vacío.');
        }

        $details = [
            'title' => 'Estado de la consulta actualizado',
            'body' => 'El estado de su consulta ha cambiado a ' . $consulta->estado_consulta. ".",
        ];

        Mail::to($email)->send(new ConsultaEstadoCambiadoMailable($details));
    }
}
