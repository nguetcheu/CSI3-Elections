<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bulletin
 * 
 * @property int $id
 * @property string $couleur
 * @property string $photo
 * 
 * @property Collection|Vote[] $votes
 *
 * @package App\Models
 */
class Bulletin extends Model
{
	use HasFactory;
	protected $table = 'bulletin';
	public $timestamps = false;

	protected $fillable = [
		'couleur',
		'photo'
	];

	public function votes()
	{
		return $this->hasMany(Vote::class, 'id_bulletin');
	}
}
