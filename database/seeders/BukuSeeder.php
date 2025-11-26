<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;
use App\Models\Kategori;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get kategori IDs
        $fiksi = Kategori::where('Nama_Kategori', 'Fiksi')->first();
        $nonFiksi = Kategori::where('Nama_Kategori', 'Non-Fiksi')->first();
        $sejarah = Kategori::where('Nama_Kategori', 'Sejarah')->first();
        $teknologi = Kategori::where('Nama_Kategori', 'Teknologi')->first();
        $bisnis = Kategori::where('Nama_Kategori', 'Bisnis & Ekonomi')->first();
        $sains = Kategori::where('Nama_Kategori', 'Sains')->first();

        $books = [
            [
                'Judul' => 'Laskar Pelangi',
                'Pengarang' => 'Andrea Hirata',
                'id_kategori' => $fiksi?->id_kategori ?? 1,
                'Sinopsis' => 'Novel yang mengisahkan tentang perjuangan anak-anak Belitung untuk mendapatkan pendidikan.',
                'ISBN' => '978-602-291-000-1',
                'Tahun_Terbit' => 2005,
                'Penerbit' => 'Bentang Pustaka',
                'Cover' => null,
                'Stok' => 25,
                'Harga' => 85000.00
            ],
            [
                'Judul' => 'Bumi Manusia',
                'Pengarang' => 'Pramoedya Ananta Toer',
                'id_kategori' => $fiksi?->id_kategori ?? 1,
                'Sinopsis' => 'Novel pertama dari Tetralogi Buru yang mengisahkan kehidupan di masa kolonial Belanda.',
                'ISBN' => '978-602-291-001-8',
                'Tahun_Terbit' => 1980,
                'Penerbit' => 'Lentera Dipantara',
                'Cover' => null,
                'Stok' => 30,
                'Harga' => 95000.00
            ],
            [
                'Judul' => 'Ayah',
                'Pengarang' => 'Andrea Hirata',
                'id_kategori' => $fiksi?->id_kategori ?? 1,
                'Sinopsis' => 'Kisah tentang seorang ayah yang berjuang untuk keluarganya.',
                'ISBN' => '978-602-291-002-5',
                'Tahun_Terbit' => 2015,
                'Penerbit' => 'Bentang Pustaka',
                'Cover' => null,
                'Stok' => 20,
                'Harga' => 75000.00
            ],
            [
                'Judul' => 'Filosofi Teras',
                'Pengarang' => 'Henry Manampiring',
                'id_kategori' => $nonFiksi?->id_kategori ?? 2,
                'Sinopsis' => 'Filosofi Yunani-Romawi kuno untuk mental yang tangguh masa kini.',
                'ISBN' => '978-602-291-003-2',
                'Tahun_Terbit' => 2018,
                'Penerbit' => 'Penerbit Buku Kompas',
                'Cover' => null,
                'Stok' => 40,
                'Harga' => 89000.00
            ],
            [
                'Judul' => 'Atomic Habits',
                'Pengarang' => 'James Clear',
                'id_kategori' => $nonFiksi?->id_kategori ?? 2,
                'Sinopsis' => 'Cara mudah dan terbukti untuk membentuk kebiasaan baik dan menghilangkan kebiasaan buruk.',
                'ISBN' => '978-602-291-004-9',
                'Tahun_Terbit' => 2018,
                'Penerbit' => 'Avery',
                'Cover' => null,
                'Stok' => 35,
                'Harga' => 120000.00
            ],
            [
                'Judul' => 'Sejarah Dunia yang Disembunyikan',
                'Pengarang' => 'Jonathan Black',
                'id_kategori' => $sejarah?->id_kategori ?? 3,
                'Sinopsis' => 'Sejarah rahasia dunia yang tidak diajarkan di sekolah.',
                'ISBN' => '978-602-291-005-6',
                'Tahun_Terbit' => 2010,
                'Penerbit' => 'Mizan',
                'Cover' => null,
                'Stok' => 15,
                'Harga' => 98000.00
            ],
            [
                'Judul' => 'Clean Code',
                'Pengarang' => 'Robert C. Martin',
                'id_kategori' => $teknologi?->id_kategori ?? 4,
                'Sinopsis' => 'A Handbook of Agile Software Craftsmanship.',
                'ISBN' => '978-602-291-006-3',
                'Tahun_Terbit' => 2008,
                'Penerbit' => 'Prentice Hall',
                'Cover' => null,
                'Stok' => 22,
                'Harga' => 150000.00
            ],
            [
                'Judul' => 'The Lean Startup',
                'Pengarang' => 'Eric Ries',
                'id_kategori' => $bisnis?->id_kategori ?? 5,
                'Sinopsis' => 'How Today\'s Entrepreneurs Use Continuous Innovation to Create Radically Successful Businesses.',
                'ISBN' => '978-602-291-007-0',
                'Tahun_Terbit' => 2011,
                'Penerbit' => 'Crown Business',
                'Cover' => null,
                'Stok' => 18,
                'Harga' => 135000.00
            ],
            [
                'Judul' => 'Sapiens: A Brief History of Humankind',
                'Pengarang' => 'Yuval Noah Harari',
                'id_kategori' => $sejarah?->id_kategori ?? 3,
                'Sinopsis' => 'Sejarah singkat umat manusia dari zaman batu hingga era digital.',
                'ISBN' => '978-602-291-008-7',
                'Tahun_Terbit' => 2014,
                'Penerbit' => 'Harper',
                'Cover' => null,
                'Stok' => 28,
                'Harga' => 125000.00
            ],
            [
                'Judul' => 'Thinking, Fast and Slow',
                'Pengarang' => 'Daniel Kahneman',
                'id_kategori' => $nonFiksi?->id_kategori ?? 2,
                'Sinopsis' => 'Cara kerja otak manusia dalam mengambil keputusan.',
                'ISBN' => '978-602-291-009-4',
                'Tahun_Terbit' => 2011,
                'Penerbit' => 'Farrar, Straus and Giroux',
                'Cover' => null,
                'Stok' => 32,
                'Harga' => 140000.00
            ],
            [
                'Judul' => 'A Brief History of Time',
                'Pengarang' => 'Stephen Hawking',
                'id_kategori' => $sains?->id_kategori ?? 11,
                'Sinopsis' => 'Penjelasan tentang alam semesta untuk orang awam.',
                'ISBN' => '978-602-291-010-0',
                'Tahun_Terbit' => 1988,
                'Penerbit' => 'Bantam Books',
                'Cover' => null,
                'Stok' => 26,
                'Harga' => 110000.00
            ],
            [
                'Judul' => 'Rich Dad Poor Dad',
                'Pengarang' => 'Robert T. Kiyosaki',
                'id_kategori' => $bisnis?->id_kategori ?? 5,
                'Sinopsis' => 'Apa yang diajarkan orang kaya kepada anak-anak mereka tentang uang.',
                'ISBN' => '978-602-291-011-7',
                'Tahun_Terbit' => 1997,
                'Penerbit' => 'Warner Books',
                'Cover' => null,
                'Stok' => 45,
                'Harga' => 95000.00
            ],
            [
                'Judul' => 'The Design of Everyday Things',
                'Pengarang' => 'Don Norman',
                'id_kategori' => $teknologi?->id_kategori ?? 4,
                'Sinopsis' => 'Prinsip-prinsip desain untuk kehidupan sehari-hari.',
                'ISBN' => '978-602-291-012-4',
                'Tahun_Terbit' => 1988,
                'Penerbit' => 'Basic Books',
                'Cover' => null,
                'Stok' => 19,
                'Harga' => 130000.00
            ],
            [
                'Judul' => 'Steve Jobs',
                'Pengarang' => 'Walter Isaacson',
                'id_kategori' => $nonFiksi?->id_kategori ?? 2,
                'Sinopsis' => 'Biografi lengkap pendiri Apple Inc.',
                'ISBN' => '978-602-291-013-1',
                'Tahun_Terbit' => 2011,
                'Penerbit' => 'Simon & Schuster',
                'Cover' => null,
                'Stok' => 24,
                'Harga' => 165000.00
            ],
            [
                'Judul' => 'The Psychology of Money',
                'Pengarang' => 'Morgan Housel',
                'id_kategori' => $bisnis?->id_kategori ?? 5,
                'Sinopsis' => 'Timeless lessons on wealth, greed, and happiness.',
                'ISBN' => '978-602-291-014-8',
                'Tahun_Terbit' => 2020,
                'Penerbit' => 'Harriman House',
                'Cover' => null,
                'Stok' => 33,
                'Harga' => 115000.00
            ]
        ];

        foreach ($books as $book) {
            Buku::create($book);
        }
    }
}
