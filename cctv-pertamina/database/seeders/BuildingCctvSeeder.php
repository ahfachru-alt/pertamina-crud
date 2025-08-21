<?php

namespace Database\Seeders;

use App\Models\Building;
use App\Models\Cctv;
use App\Models\Room;
use Illuminate\Database\Seeder;

class BuildingCctvSeeder extends Seeder
{
    public function run(): void
    {
        $buildingNames = [
            'Gedung Kolaboratif',
            'Gerbang Utama',
            'AWI',
            'Shelter Maintenance Area 1',
            'Shelter Maintenance Area 2',
            'Shelter Maintenance Area 3',
            'Shelter Maintenance Area 4',
            'Shelter White OM',
            'Pintu Masuk Area Kilang Pertamina',
            'Marine Region III Pertamina Balongan',
            'Main Control Room',
            'Tank Farm Area 1',
            'Gedung EXOR',
            'Area Produksi Crude Distillation Unit (CDU)',
            'HSSE Demo Room',
            'Gedung Amanah',
            'POC',
            'JGC',
        ];

        $baseLat = -6.3710000;
        $baseLng = 108.4339000;

        $buildings = [];
        foreach ($buildingNames as $i => $name) {
            $lat = $baseLat + (mt_rand(-300, 300) / 100000.0);
            $lng = $baseLng + (mt_rand(-300, 300) / 100000.0);
            $buildings[] = Building::create([
                'name' => $name,
                'latitude' => $lat,
                'longitude' => $lng,
                'address' => 'Kilang Pertamina Internasional RU VI Balongan',
            ]);
        }

        // Create simple rooms for each building
        foreach ($buildings as $building) {
            for ($r = 1; $r <= 5; $r++) {
                Room::create([
                    'building_id' => $building->id,
                    'name' => 'Ruang ' . $r,
                    'floor' => 'Lantai ' . $r,
                ]);
            }
        }

        $roomsByBuilding = [];
        foreach ($buildings as $building) {
            $roomsByBuilding[$building->id] = $building->rooms()->pluck('id')->all();
        }

        $statuses = ['online', 'offline', 'maintenance'];

        for ($i = 1; $i <= 700; $i++) {
            $building = $buildings[array_rand($buildings)];
            $roomIds = $roomsByBuilding[$building->id];
            $roomId = $roomIds[array_rand($roomIds)];

            $ipIndex = str_pad((string)$i, 3, '0', STR_PAD_LEFT);
            $rtsp = "rtsp://admin:password.123@10.56.236.$ipIndex/streaming/channels/";

            Cctv::create([
                'building_id' => $building->id,
                'room_id' => $roomId,
                'name' => 'CCTV ' . $i,
                'rtsp_url' => $rtsp,
                'status' => $statuses[array_rand($statuses)],
                'ip_address' => "10.56.236.$ipIndex",
                'metadata' => ['seeded' => true],
            ]);
        }
    }
}

