<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';

    protected $fillable = [

        'userId',
        
        'studentName',
        'studentNim',
        'foto',
         
    ];



    // Relasi one-to-one dengan User
    public function user()
    {
        return $this->belongsTo(User::class, 'userId'); // Student dimiliki oleh User
    }

    // Relasi one-to-many dengan Todolist
    public function todolists()
    {
        return $this->hasMany(Todolist::class); // Student memiliki banyak Todolist
    }
}
