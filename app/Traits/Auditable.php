<?php
namespace App\Traits;

use Illuminate\Support\Facades\Request;

// Auditable.php

trait AuthorAudit
{
    // public static function bootAuthorAudit()
    // {
    //     static::updating(function ($author) {
    //         $original = $author->getOriginal();

    //         if ($original['name'] != $author->name) {
    //             AuthorAudit::create([
    //                 'author_id' => $author->id,
    //                 'previous_name' => $original['name'],
    //                 'new_name' => $author->name,
    //                 'reason' => Request::input('reason'),
    //             ]);
    //         }
    //     });
    // }
}