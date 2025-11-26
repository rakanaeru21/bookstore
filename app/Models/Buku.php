<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Buku extends Model
{
    use HasFactory;

    protected $table = 't_buku';
    protected $primaryKey = 'id_buku';

    protected $fillable = [
        'Judul',
        'Pengarang',
        'id_kategori',
        'Sinopsis',
        'ISBN',
        'Tahun_Terbit',
        'Penerbit',
        'Cover',
        'Stok',
        'Harga'
    ];

    protected $casts = [
        'Harga' => 'decimal:2'
    ];

    /**
     * Relationship with Kategori
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    /**
     * Scope for searching books
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('Judul', 'like', '%' . $search . '%')
                  ->orWhere('Pengarang', 'like', '%' . $search . '%')
                  ->orWhere('ISBN', 'like', '%' . $search . '%')
                  ->orWhere('Penerbit', 'like', '%' . $search . '%');
        });
    }

    /**
     * Get formatted price
     */
    public function getFormattedHargaAttribute()
    {
        return 'Rp ' . number_format((float)$this->Harga, 2, ',', '.');
    }
}
