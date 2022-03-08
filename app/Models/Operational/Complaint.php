<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Complaint extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = 'complaint';

    protected $dates = [
        'incident_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'users_id',
        'province_id',
        'regency_id',
        'district_id',
        'category_complaint_id',
        'title',
        'content',
        'incident_date',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // one to one --- //
    public function complaint_response()
    {
        return $this->hasOne('App\Models\Operational\ComplaintResponse', 'complaint_id', 'id');
    }

    // one to many --- //
    public function users()
    {
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }

    public function provinces()
    {
        return $this->belongsTo('App\Models\MasterData\Provinces', 'province_id', 'id');
    }

    public function regencies()
    {
        return $this->belongsTo('App\Models\MasterData\Regencies', 'regency_id', 'id');
    }

    public function districts()
    {
        return $this->belongsTo('App\Models\MasterData\Districts', 'district_id', 'id');
    }

    public function category_complaint()
    {
        return $this->belongsTo('App\Models\MasterData\CategoryComplaint', 'category_complaint_id', 'id');
    }
    
    public function attachment_complaint()
    {
        return $this->hasMany('App\Models\Operational\AttachmentComplaint', 'complaint_id', 'id');
    }
    
}
