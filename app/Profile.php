<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $surname
 * @property int $age
 * @property string $job
 * @property string $dateOfBirth
 * @property string $created_at
 * @property string $updated_at
 */
class Profile extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'profile';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['name', 'surname', 'age', 'job', 'dateOfBirth', 'created_at', 'updated_at'];
}
