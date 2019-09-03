<?php

use App\Room;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');
        $rooms = [
            ['type'=>'Single', 'persons'=>'1', 'created_at'=> $now, 'updated_at' => $now],
            ['type'=>'Double', 'persons'=>'2', 'created_at'=> $now, 'updated_at' => $now],
            ['type'=>'Triple', 'persons'=>'3', 'created_at'=> $now, 'updated_at' => $now],
            ['type'=>'Quad', 'persons'=>'4', 'created_at'=> $now, 'updated_at' => $now],
            ['type'=>'Queen', 'persons'=>'1', 'created_at'=> $now, 'updated_at' => $now],
            ['type'=>'King', 'persons'=>'1', 'created_at'=> $now, 'updated_at' => $now],
            ['type'=>'Twin', 'persons'=>'2', 'created_at'=> $now, 'updated_at' => $now],
            ];
        Room::insert($rooms);
    }
}
