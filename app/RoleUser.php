<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';

    public function permission(){
        return $this->belongsTo('App\Role');
    }
}
