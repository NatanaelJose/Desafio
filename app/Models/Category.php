<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::deleting(function($category) {
            $category->tasks()->delete();
        });
    }
}

