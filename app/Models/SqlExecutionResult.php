<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SqlExecutionResult extends Model
{
    use HasFactory;

    // Specify the fillable attributes
    protected $fillable = [
        'student_id',
        'code',  // Allow mass assignment for the code attribute
        'output', // Allow mass assignment for the output attribute
    ];
}
