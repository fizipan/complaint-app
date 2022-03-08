<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttachmentComplaint extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = 'attachment_complaint';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'complaint_id',
        'path',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // one to many --- //
    public function complaint()
    {
        return $this->belongsTo('App\Models\Operational\Complaint', 'complaint_id', 'id');
    }
}
