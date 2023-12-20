<?php
namespace App\Modules\Product;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{

    protected $table = 'categories';

    protected $fillable = ['name', 'photo', 'description', 'status'];
}