<?php

namespace Database\Seeders;

use App\Models\Floor;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $floors = Floor::all();

        foreach ($floors as $floor) {
            foreach (range(1, 5) as $i) {
                Room::create([
                    'name' => $floor->name . " - " . $i . '-xona',
                    'floor_id' => $floor->id
                ]);
            }
        }
    }
}
