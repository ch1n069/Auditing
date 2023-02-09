<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditData extends Model
{

    protected $table = 'audit_data';
    protected $fillable = [
        'audit_id',
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
    use HasFactory;


}