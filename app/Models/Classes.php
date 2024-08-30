<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AcademicYear;

class Classes extends Model
{
    use HasFactory;
    protected $table = "classes";
    protected $primaryKey = "id";
    protected $fillable = ['name', 'started_from'];
    public function academic_year()
    {
        return $this->belongsTo(AcademicYear::class, 'started_from');
    }
}
