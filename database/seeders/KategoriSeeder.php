<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Fiksi',
            'Non-Fiksi',
            'Sejarah',
            'Teknologi',
            'Bisnis & Ekonomi',
            'Kesehatan',
            'Pendidikan',
            'Agama',
            'Hobi & Keterampilan',
            'Biografi',
            'Sains',
            'Psikologi',
            'Politik',
            'Hukum',
            'Seni & Desain',
            'Masakan',
            'Travel & Petualangan',
            'Olahraga',
            'Musik',
            'Bahasa'
        ];

        foreach ($categories as $category) {
            Kategori::create([
                'Nama_Kategori' => $category
            ]);
        }
    }
}
