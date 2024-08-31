<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    use HasFactory;
    protected $table = "fee_structures";
    protected $primaryKey = "id";
    protected $fillable = ['class_id', 'academic_year_id', 'fee_head_id', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'september', 'november', 'december'];

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }
    public function feeHead()
    {
        return $this->belongsTo(FeeHead::class, 'fee_head_id');
    }
}
