<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provinces extends Model
{
    // use HasFactory;
    // use SoftDeletes;

    public $table = 'provinces';

    // protected $dates = [
    //     'created_at',
    //     'updated_at',
    //     'deleted_at',
    // ];

    protected $fillable = [
        'country_id',
        'name',
        'alt_name',
        'latitude',
        'longitude',
    ];

    // one to many --- //
    public function regencies()
    {
        return $this->hasMany('App\Models\MasterData\Regencies', 'provinces_id');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\MasterData\Country', 'country_id', 'id');
    }
}
