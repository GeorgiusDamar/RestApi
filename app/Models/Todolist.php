<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [

        'id',
        'studentId',
        'todo',
        'completed'
        
    ];


    // Relasi many-to-one dengan Student
    public function student()
    {
        return $this->belongsTo(Student::class, 'studentId'); // Todolist dimiliki oleh Student
    }



    
}
