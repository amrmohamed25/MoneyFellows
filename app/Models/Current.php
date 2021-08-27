<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class Current extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'months', 'money', 'no_of_members', 'due_date',];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('months_left_to_be_paid', 'money','is_paid')->withTimestamps();
    }

}
