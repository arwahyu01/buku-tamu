<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tamu extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = ['id','nama','nik','tempat_lahir','tanggal_lahir','email','no_hp','alamat','jabatan','dari','keperluan','unor_id'];
    protected $casts = [];
    protected $table = 'tamus';

	public function unor() : object
	{
		return $this->belongsTo(Unor::class);
	}

    public function file() : object
    {
        return $this->morphOne(File::class, 'fileable');
    }
}