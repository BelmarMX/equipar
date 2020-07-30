<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendQuotations extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct($cliente, $promocion, $productos)
    {
        $this -> cliente = $cliente;
        $this -> promocion = $promocion;
        $this -> productos = $productos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this -> from('atencionaclientes@equi-par.com', 'Equipar: Atención a Clientes')
                    -> subject('Equipar: Cotización de productos')
                    -> view('00_layouts.03_email.cotizaciones')
                    -> with([
                            'cliente'   => $this -> cliente
                        ,   'promocion' => $this -> promocion
                        ,   'productos' => $this -> productos
                    ]);
    }
}
