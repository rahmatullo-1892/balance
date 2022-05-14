<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends BaseModel
{
    protected $table = "histories";
    protected $fillable = [
        "user_id", "sum", "comments"
    ];
    public $timestamps = false;
}
