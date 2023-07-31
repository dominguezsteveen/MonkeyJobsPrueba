<?php

namespace Database\Seeders;

use App\Models\TipoDocumento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipo = new TipoDocumento();
        $tipo->descripcion = "Cédula de Ciudadanía";
        $tipo->save();
        $tipo = new TipoDocumento();
        $tipo->descripcion = "Tarjeta Identidad";
        $tipo->save();
        $tipo = new TipoDocumento();
        $tipo->descripcion = "Cedula de Extranjeria";
        $tipo->save();
    }
}
