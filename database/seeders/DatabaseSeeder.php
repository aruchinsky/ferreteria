<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;   //Facade para insertar
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* ===========================================================
         * 1. Usuarios de ejemplo  (dejé el tuyo de referencia)
         * -----------------------------------------------------------*/
        // User::factory(10)->create();
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);

        /* ===========================================================
         * 2. Medidas (tabla 'medidas')
         *    - AFIP Code / Abreviatura   (columna 'abreviatura')
         *    - Descripción               (columna 'descripcion')
         *    - activo = 1                (habilitada)
         * -----------------------------------------------------------*/
        //  Limpio la tabla solo en entorno local (opcional)
        if (app()->environment('local')) {
            // Evita conflictos de FK al truncar
            Schema::disableForeignKeyConstraints();
            DB::table('medidas')->truncate();
            Schema::enableForeignKeyConstraints();
        }

        $medidas = [
            ['abreviatura' => 'UN',   'descripcion' => 'Unidad',                 'activo' => 1],
            ['abreviatura' => 'KG',   'descripcion' => 'Kilogramo',              'activo' => 1],
            ['abreviatura' => 'G',    'descripcion' => 'Gramo',                  'activo' => 1],
            ['abreviatura' => 'M',    'descripcion' => 'Metro',                  'activo' => 1],
            ['abreviatura' => 'CM',   'descripcion' => 'Centímetro',             'activo' => 1],
            ['abreviatura' => 'MM',   'descripcion' => 'Milímetro',              'activo' => 1],
            ['abreviatura' => 'M2',   'descripcion' => 'Metro cuadrado',         'activo' => 1],
            ['abreviatura' => 'M3',   'descripcion' => 'Metro cúbico',           'activo' => 1],
            ['abreviatura' => 'L',    'descripcion' => 'Litro',                  'activo' => 1],
            ['abreviatura' => 'ML',   'descripcion' => 'Mililitro',              'activo' => 1],
            ['abreviatura' => 'PAR',  'descripcion' => 'Par',                    'activo' => 1],
            ['abreviatura' => 'JGO',  'descripcion' => 'Juego',                  'activo' => 1],
            ['abreviatura' => 'PAQ',  'descripcion' => 'Paquete',                'activo' => 1],
            ['abreviatura' => 'BOL',  'descripcion' => 'Bolsa',                  'activo' => 1],
            ['abreviatura' => 'DOC',  'descripcion' => 'Docena',                 'activo' => 1],
            ['abreviatura' => 'ROL',  'descripcion' => 'Rollo',                  'activo' => 1],
        ];

        DB::table('medidas')->insert($medidas);
    }
}
