<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jalan extends Model
{
    use HasFactory;
    protected $table = 'tabel_jalan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_jalan',
        'lokasi',
        'panjang',
    ];

    // public function setLokasiAttribute($value)
    // {
    //     if (is_string($value)) {
    //         list($latitude, $longitude) = explode(',', $value);
    //         $this->attributes['lokasi'] = DB::raw("ST_GeomFromText('POINT($longitude $latitude)')");
    //     }
    // }

    // public function getLokasiAttribute($value)
    // {
    //     $result = DB::selectOne("SELECT ST_AsText(lokasi) as lokasi FROM tabel_jalan WHERE id = ?", [$this->id]);
    //     if ($result && $result->lokasi) {
    //         $point = $result->lokasi;
    //         $coordinates = str_replace(['POINT(', ')'], '', $point);
    //         return str_replace(' ', ', ', $coordinates);
    //     }
    //     return null;
    // }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }

    public function rencana()
    {
        return $this->hasMany(Rencana::class);
    }

    public function gis()
    {
        return $this->hasMany(GIS::class);
    }
}
