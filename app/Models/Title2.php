<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Title2 extends Model
{
    protected $table = 'title2';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function getImageAttribute()
    {
        if (isset($this->attributes['image']) && $this->attributes['image']) {
            return env('APP_URL').'/storage/uploads/product/Medium/'. $this->attributes['image'];
        }
        return '';
    }
}
