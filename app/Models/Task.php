<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "is_done"
    ];


    protected $casts = [
        "id" => "int",
        "title" => "string",
        "is_done" => "bool"
    ];
}
