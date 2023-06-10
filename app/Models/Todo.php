<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $table = "todos";
    protected $fillable = [
        'user_id',
        'description',
        'is_completed',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
