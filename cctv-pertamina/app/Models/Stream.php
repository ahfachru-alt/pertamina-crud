<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
	use HasFactory;

	protected $fillable = [
		'cctv_id', 'hls_path', 'status', 'started_at', 'stopped_at',
	];

	protected $casts = [
		'started_at' => 'datetime',
		'stopped_at' => 'datetime',
	];

	public function cctv()
	{
		return $this->belongsTo(Cctv::class);
	}
}
