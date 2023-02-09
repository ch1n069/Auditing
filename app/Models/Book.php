<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use OwenIt\Auditing\Auditable as AuditingTrait;

use OwenIt\Auditing\Contracts\Auditable;


class Book extends Model implements Auditable
{
    use HasFactory;
    use AuditingTrait;

   
// }
    protected $fillable =  [
        'title',
        'description',
        'author',
        // 'edited',
    ];
    
}