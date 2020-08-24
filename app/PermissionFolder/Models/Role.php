<?php

namespace App\PermissionFolder\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // From here
    protected $fillable = [
        'name', 'slug', 'description', 'full-access',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')->withTimesTamps();
    }
}
