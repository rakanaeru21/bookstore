<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class UpdateCoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update cover untuk beberapa buku
        $updates = [
            'Laskar Pelangi' => 'laskar-pelangi.svg',
            'Bumi Manusia' => 'bumi-manusia.svg',
            'Filosofi Teras' => 'filosofi-teras.svg',
        ];

        foreach ($updates as $judul => $cover) {
            $buku = Buku::where('Judul', $judul)->first();
            if ($buku) {
                $buku->Cover = $cover;
                $buku->save();
                echo "Updated cover for: {$judul}\n";
            }
        }
    }
}
