<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeHead extends Model
{
    use HasFactory;
    protected $table = "fee_heads";
    protected $primaryKey = "id";
    protected $fillable = ['name'];
}
