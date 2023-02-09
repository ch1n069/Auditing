<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    use HasFactory;
    protected $table = 'audits';
    protected $fillable = [
        'event',
        'old_values',
        'new_values',
        'user_id',
        'url',
        'ip_address',
        'user_agent',
        'created_at',
        'updated_at',
    ];
    protected static function boot()
    {
        parent::boot();

        static::updated(function ($audit) {
            AuditData::createFromAudit($audit);
        });
    }

    public static function createFromAudit(Audit $audit)
    {
        $auditData = new AuditData();
        $auditData->event = $audit->event;
        $auditData->old_values = $audit->old_values;
        $auditData->new_values = $audit->new_values;
        $auditData->user_id = $audit->user_id;
        $auditData->url = $audit->url;
        $auditData->ip_address = $audit->ip_address;
        $auditData->user_agent = $audit->user_agent;
        $auditData->created_at = $audit->created_at;
        $auditData->updated_at = $audit->updated_at;
        $auditData->save();
    }

}