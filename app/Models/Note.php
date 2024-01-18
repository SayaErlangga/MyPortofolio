<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $table = 'note';
    protected $fillable = ['id', 'title', 'date', 'description', 'status', 'created_at', 'updated_at'];
}
