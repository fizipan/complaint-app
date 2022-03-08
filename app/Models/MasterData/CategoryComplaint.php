<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryComplaint extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = 'category_complaint';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

     // one to many --- //
     public function complaint()
     {
         return $this->hasMany('App\Models\Operational\Complaint', 'category_complaint_id');
     }
}
