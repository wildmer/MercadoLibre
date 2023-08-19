<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Model;

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
}
