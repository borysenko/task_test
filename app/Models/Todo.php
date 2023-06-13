<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'title', 'description', 'status', 'priority'];

    public function childrens()
    {
        return $this->hasMany(self::class, 'parent_id')->sort();
    }

    public function scopeSort($query)
    {
        if(request()->has('sort') && request('sort'))
        {
            return $query->orderBy(request('sort'), 'DESC');
        }

        return $query->orderBy('id', 'ASC');
    }

}
