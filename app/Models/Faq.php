<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = ['faq', 'answer', 'service_id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
