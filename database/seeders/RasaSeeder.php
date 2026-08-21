<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\House;
use App\Models\ElectronicDevice;
use App\Models\PowerReading;
use App\Models\Alert;
use App\Models\SystemLog;
use App\Models\GlobalSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RasaSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // ADMIN
        // =========================

        $admin = User::create([
            'name' => 'RASA Administrator',
            'email' => 'admin@rasa.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // =========================
        // USER / ANAK
        // =========================

        $user = User::create([
            'name' => 'Shayna',
            'email' => 'user@rasa.test',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // =========================
        // RUMAH LANSIA
        // =========================

        $house = House::create([
            'user_id' => $user->id,
            'elderly_name' => 'Ibu Siti',
            'address' => 'Metro, Lampung',
            'phone' => '081234567890',
            'nominal_voltage' => 220,
            'status' => 'active',
        ]);

        // =========================
        // PERANGKAT ELEKTRONIK
        // =========================

        $devices = [
            [
                'name' => 'Kulkas',
                'category' => 'Kitchen',
                'voltage' => 220,
                'watt' => 150,
            ],
            [
                'name' => 'Televisi',
                'category' => 'Entertainment',
                'voltage' => 220,
                'watt' => 100,
            ],
            [
                'name' => 'AC Kamar',
                'category' => 'Cooling',
                'voltage' => 220,
                'watt' => 500,
            ],
            [
                'name' => 'Rice Cooker',
                'category' => 'Kitchen',
                'voltage' => 220,
                'watt' => 300,
            ],
            [
                'name' => 'Lampu Ruang Tamu',
                'category' => 'Lighting',
                'voltage' => 220,
                'watt' => 20,
            ],
        ];

        foreach ($devices as $device) {
            ElectronicDevice::create([
                'house_id' => $house->id,
                'name' => $device['name'],
                'category' => $device['category'],
                'voltage' => $device['voltage'],
                'watt' => $device['watt'],
                'status' => 'active',
            ]);
        }

        // =========================
        // POWER READINGS
        // =========================

        $powerData = [
            210, 220, 230, 250,
            270, 300, 320, 350,
            380, 400, 390, 360,
            340, 320, 310, 290,
            280, 260, 300, 350,
            400, 380, 300, 240,
        ];

        foreach ($powerData as $hour => $power) {

            // Simulasi anomali pukul 03:00
            if ($hour === 3) {
                $power = 1280;
            }

            PowerReading::create([
                'house_id' => $house->id,
                'voltage' => rand(218, 223),
                'current' => round($power / 220, 2),
                'power' => $power,
                'frequency' => 50,
                'recorded_at' => Carbon::today()->setHour($hour),
            ]);
        }

        // =========================
        // ALERT
        // =========================

        Alert::create([
            'house_id' => $house->id,
            'title' => 'Daya Tinggi Terdeteksi',
            'message' => 'Pemakaian daya mencapai 1280W pada pukul 03:00.',
            'severity' => 'danger',
            'is_read' => false,
        ]);

        Alert::create([
            'house_id' => $house->id,
            'title' => 'Tegangan Meningkat',
            'message' => 'Tegangan listrik meningkat di atas kondisi normal.',
            'severity' => 'warning',
            'is_read' => false,
        ]);

        Alert::create([
            'house_id' => $house->id,
            'title' => 'Sistem Normal',
            'message' => 'Monitoring listrik berjalan dengan normal.',
            'severity' => 'info',
            'is_read' => true,
        ]);

        // =========================
        // SYSTEM LOG
        // =========================

        SystemLog::create([
            'house_id' => $house->id,
            'type' => 'device_offline',
            'message' => 'Perangkat monitoring sempat kehilangan koneksi.',
            'status' => 'warning',
        ]);

        SystemLog::create([
            'house_id' => $house->id,
            'type' => 'connection_restored',
            'message' => 'Koneksi perangkat berhasil dipulihkan.',
            'status' => 'info',
        ]);

        SystemLog::create([
            'house_id' => $house->id,
            'type' => 'voltage_warning',
            'message' => 'Terdeteksi perubahan tegangan yang tidak biasa.',
            'status' => 'warning',
        ]);

        // =========================
        // GLOBAL SETTINGS
        // =========================

        GlobalSetting::create([
            'key' => 'minimum_voltage',
            'value' => '198',
            'description' => 'Batas minimum tegangan aman.',
        ]);

        GlobalSetting::create([
            'key' => 'maximum_voltage',
            'value' => '242',
            'description' => 'Batas maksimum tegangan aman.',
        ]);
    }
}