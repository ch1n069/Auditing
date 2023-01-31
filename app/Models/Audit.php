<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Models\Audit as AuditingAudit;


class Audit extends AuditingAudit
{
    protected $appends = ['comment'];
    protected $comment;

    public function setCommentAttribute($value)
    {
        $this->comment = $value;
    }

    public function getCommentAttribute()
    {
        return $this->comment;
    }
    protected $fillable = [
        // other fillable fields
        'comment',
    ];

    use HasFactory;
    
}