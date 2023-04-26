<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Participant
 * 
 * @property int $id
 * @property string $nom
 * @property string $num_cni
 * @property int $age
 * @property string $sexe
 * @property string $statut
 * @property int $id_region
 * @property string $login
 * @property string $pwd
 * @property string|null $email
 * @property bool $etat
 * @property string|null $tel
 * 
 * @property Region $region
 * @property Collection|Vote[] $votes
 *
 * @package App\Models
 */
class Participant extends Model
{
	use HasFactory;
	protected $table = 'participant';
	public $timestamps = false;

	protected $casts = [
		'age' => 'int',
		'id_region' => 'int',
		'etat' => 'bool'
	];

	protected $fillable = [
		'nom',
		'num_cni',
		'age',
		'sexe',
		'id_region',
		'login',
		'pwd',
		'email',
		'tel'
	];

	public function region()
	{
		return $this->belongsTo(Region::class, 'id_region');
	}

	public function votes()
	{
		return $this->hasMany(Vote::class, 'id_participant');
	}
}
