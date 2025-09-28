<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phones';

    public function organization() {
        return $this->belongsTo(Organization::class);
    }
}
