<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'idrekam_medis';
    public $timestamps = true;

    protected $fillable = [
        'anamesa',
        'temuan_klinis',
        'diagnosa',
        'idpet',
        'dokter_pemeriksa'
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'idpet', 'idpet');
    }

    public function detailRekamMedis()
    {
        return $this->hasMany(DetailRekamMedis::class, 'idrekam_medis', 'idrekam_medis');
    }
}

?>