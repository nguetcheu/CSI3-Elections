<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vote
 * 
 * @property int $id
 * @property string $date
 * @property int $id_election
 * @property int $id_bulletin
 * @property int $id_participant
 * 
 * @property Bulletin $bulletin
 * @property Election $election
 * @property Participant $participant
 *
 * @package App\Models
 */
class Vote extends Model
{
	protected $table = 'vote';
	public $timestamps = false;

	protected $casts = [
		'id_election' => 'int',
		'id_bulletin' => 'int',
		'id_participant' => 'int'
	];

	protected $fillable = [
		'date',
		'id_election',
		'id_bulletin',
		'id_participant'
	];

	public function bulletin()
	{
		return $this->belongsTo(Bulletin::class, 'id_bulletin');
	}

	public function election()
	{
		return $this->belongsTo(Election::class, 'id_election');
	}

	public function participant()
	{
		return $this->belongsTo(Participant::class, 'id_participant');
	}
}
