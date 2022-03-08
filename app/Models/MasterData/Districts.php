<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Districts extends Model
{
    // use HasFactory;
    // use SoftDeletes;

    public $table = 'districts';

    // protected $dates = [
    //     'created_at',
    //     'updated_at',
    //     'deleted_at',
    // ];

    protected $fillable = [
        'regencies_id',
        'name',
        'alt_name',
        'latitude',
        'longitude',
    ];

    // one to many --- //
    public function regencies()
    {
        return $this->belongsTo('App\Models\MasterData\Regencies', 'regency_id', 'id');
    }
}
