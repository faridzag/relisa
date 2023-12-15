<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'poster',
        'slug',
        'tanggal',
        'ketentuan',
        'deskripsi',
        'category_id',
    ];
    //protected $casts = [
    //    'column' => 'array',
    //];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
