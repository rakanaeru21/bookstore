<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class UpdateCoverPathSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update cover path untuk SVG yang sudah dibuat
        $updates = [
            'Laskar Pelangi' => 'covers/laskar-pelangi.svg',
            'Bumi Manusia' => 'covers/bumi-manusia.svg',
            'Filosofi Teras' => 'covers/filosofi-teras.svg',
        ];

        foreach ($updates as $judul => $coverPath) {
            $buku = Buku::where('Judul', $judul)->first();
            if ($buku) {
                $buku->Cover = $coverPath;
                $buku->save();
                echo "Updated cover path for: {$judul} -> {$coverPath}\n";
            }
        }
    }
}
