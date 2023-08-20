<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, softDeletes;

	protected $fillable = [
		'category_id',
        'name',
        'stock',
        'price',
        'description',
    ];

	public function category() {
		return $this->belongsTo(Category::class, 'category_id', 'id');
	}
}
