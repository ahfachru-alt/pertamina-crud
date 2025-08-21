<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cctv extends Model
{
	use HasFactory;

	protected $fillable = [
		'building_id', 'room_id', 'name', 'rtsp_url', 'status', 'ip_address', 'metadata',
	];

	protected $casts = [
		'metadata' => 'array',
	];

	public function building()
	{
		return $this->belongsTo(Building::class);
	}

	public function room()
	{
		return $this->belongsTo(Room::class);
	}

	public function stream()
	{
		return $this->hasOne(Stream::class);
	}
}
