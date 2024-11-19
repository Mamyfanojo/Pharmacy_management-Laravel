<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Medicament extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'code',
        'description',
        'prix_unit',
        'stock',
        'forme',
        'avertissement',
        'effet',
        'date_exp',
        'image',
        'category_id',
        'supplier_id'
    ];

    public function imageUrl() {
        return Storage::url($this->image);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function supplier() {
        return $this->belongsTo(Supplier::class);
    }
}
