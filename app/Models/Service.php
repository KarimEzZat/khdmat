<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class Service extends Model
{
    use HasFactory;
    use CascadesDeletes;
    protected $fillable = ['title', 'slug', 'phone'];

    protected $cascadeDeletes = ['articles', 'faqs'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    public function faqs()
    {
        return $this->hasMany(Faq::class);
    }

    public function seo()
    {
        return $this->hasOne(Seo::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
