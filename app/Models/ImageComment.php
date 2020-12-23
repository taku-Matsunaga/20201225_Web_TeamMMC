<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageComment extends Model
{
    use HasFactory;

    protected $table = "image_comments";
    protected $fillable = ["user_id", "user_name", "detail_id", "comment", "image"];
}
