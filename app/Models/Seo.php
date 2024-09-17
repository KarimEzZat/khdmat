<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    use HasFactory;
    protected $fillable = ['author', 'title', 'description', 'keywords', 'site_name', 'image_alt', 'service_id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
