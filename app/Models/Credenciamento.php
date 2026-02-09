<?php

namespace App\Models;


use App\Models\Filial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Credenciamento
 * @package App\Models
 * @version January 27, 2026, 7:21 pm UTC
 *
 * @property string $url
 * @property integer $filial_id
 * @property string $title
 */
class Credenciamento extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'credenciamentos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'url',
        'filial_id',
        'title'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'url' => 'string',
        'filial_id' => 'integer',
        'title' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'url' => 'nullable|string|max:255',
        'filial_id' => 'nullable|integer',
        'title' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function filial() {
        return $this->belongsTo(Filial::class, 'filial_id');
    }
}
