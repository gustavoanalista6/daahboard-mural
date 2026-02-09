<?php

namespace App\Models;


use App\Models\Filial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Dirigente
 * @package App\Models
 * @version January 27, 2026, 8:03 pm UTC
 *
 * @property string $position
 * @property integer $order
 * @property string $name
 * @property integer $filial_id
 */
class Dirigente extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'dirigentes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'position',
        'order',
        'name',
        'filial_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'position' => 'string',
        'order' => 'integer',
        'name' => 'string',
        'filial_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'position' => 'nullable|string|max:50',
        'order' => 'nullable|integer',
        'name' => 'nullable|string|max:255',
        'filial_id' => 'nullable|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function filial() {
        return $this->belongsTo(Filial::class, 'filial_id');
    }
}
