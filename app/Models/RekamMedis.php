<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'idrekam_medis';
    public $timestamps = true;
    const UPDATED_AT = null;

    protected $fillable = [
        'anamesa',
        'temuan_klinis',
        'diagnosa',
        'dokter_pemeriksa',
        'idreservasi_dokter'
    ];

    public function roleUser()
    {
        return $this->belongsTo(RoleUser::class, 'idrole_user', 'dokter_pemeriksa');
    }

    public function temuDokter()
    {
        return $this->belongsTo(temuDokter::class, 'idreservasi_dokter', 'idreservasi_dokter');
    }

    public function detailRekamMedis()
    {
        return $this->hasOne(DetailRekamMedis::class, 'idrekam_medis', 'idrekam_medis');
    }
}

?>