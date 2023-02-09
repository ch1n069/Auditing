<?php

// use App\Models\Audit;
use App\Models\AuditData;
use App\Models\Audit;

// use OwenIt\Auditing\Models\Audit;


$audits = Audit::all();
foreach ($audits as $audit) {
    AuditData::create([
        'audit_id' => $audit->id,
        'event' => $audit->event,
        'old_values' => $audit->old_values,
        'new_values' => $audit->new_values,
        'user_id' => $audit->user_id,
        'url' => $audit->url,
        'ip_address' => $audit->ip_address,
        'user_agent' => $audit->user_agent,
        'created_at' => $audit->created_at,
        'updated_at' => $audit->updated_at,
    ]);
}