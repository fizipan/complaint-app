<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Regencies extends Model
{
    // use HasFactory;
    // use SoftDeletes;

    public $table = 'regencies';

    // protected $dates = [
    //     'created_at',
    //     'updated_at',
    //     'deleted_at',
    // ];

    protected $fillable = [
        'province_id',
        'name',
        'alt_name',
        'latitude',
        'longitude',
    ];

    // one to many --- //
    public function districts()
    {
        return $this->hasMany('App\Models\MasterData\Districts', 'regencies_id');
    }

    public function provinces()
    {
        return $this->belongsTo('App\Models\MasterData\Provinces', 'province_id', 'id');
    }
}
