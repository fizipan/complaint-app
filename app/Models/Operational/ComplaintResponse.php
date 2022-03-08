<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComplaintResponse extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = 'complaint_response';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'complaint_id',
        'users_id',
        'response',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // one to many --- //
    public function complaint()
    {
        return $this->belongsTo('App\Models\Operational\Complaint', 'complaint_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }
}
