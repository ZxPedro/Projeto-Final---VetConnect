<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            [
                "id" => 1,
                "status_name" => "Agendado",
            ],
            [
                "id" => 2,
                "status_name" => "Confirmado",
            ],
            [
                "id" => 3,
                "status_name" => "Remarcado",
            ],
            [
                "id" => 4,
                "status_name" => "Finalizado",
            ],
            [
                "id" => 5,
                "status_name" => "Faltou",
            ],
            [
                "id" => 6,
                "status_name" => "Cancelado",
            ]
        ];

        foreach ($data as $item) {
            Status::create($item);
        }
    }
}
