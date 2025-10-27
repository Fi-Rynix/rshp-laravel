<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'iduser';
    public $timestamps = false;

    protected $fillable = ['nama', 'email', 'password'];

    public function roleUsers()
    {
        return $this->hasMany(RoleUser::class, 'iduser', 'iduser');
    }

    public function Pemilik()
    {
        return $this->hasOne(Pemilik::class, 'iduser', 'iduser');
    }

}

?>