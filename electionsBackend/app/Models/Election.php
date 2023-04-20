<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Election
 * 
 * @property int $id
 * @property string $date
 * @property string $statut
 * @property string $label
 * @property string $description
 * 
 * @property Collection|Vote[] $votes
 *
 * @package App\Models
 */
class Election extends Model
{
	protected $table = 'election';
	public $timestamps = false;

	protected $fillable = [
		'date',
		'statut',
		'label',
		'description'
	];

	public function votes()
	{
		return $this->hasMany(Vote::class, 'id_election');
	}
}
