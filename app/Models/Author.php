<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Auditable;


class Author extends Model
{
    use HasFactory;

    use \OwenIt\Auditing\Auditable;


    public function books()
{
    return $this->hasMany(Book::class);
}

public function audits()
{
    return $this->hasMany(AuthorAudit::class);
}
}