<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id;
 * @property string $label;
 */

class Region extends Model
{
    use HasFactory;
    protected $fillable = ['label'];
    protected $table = 'regions';

    public function participant()
    {
        return $this->hasMany(participant::class, 'id_region');
    }
}
