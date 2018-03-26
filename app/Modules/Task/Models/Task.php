<?php

namespace App\Modules\Task\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Task extends Model 
{

    protected $table = 'task';
    protected $guarded = ['id'];
    protected $fillable = ['id_user', 'alphanumeric', 'description', 'status'];
    public $timestamps = true; 
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
