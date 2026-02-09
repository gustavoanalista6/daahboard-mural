<?php

namespace App\Models;


use App\Models\Filial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Detalhe
 * @package App\Models
 * @version January 27, 2026, 7:39 pm UTC
 *
 * @property string $title
 * @property integer $filial_id
 * @property integer $curso_id
 */
class Detalhe extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'detalhe_curso';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'filial_id',
        'curso_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'filial_id' => 'integer',
        'curso_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'nullable|string|max:255',
        'filial_id' => 'nullable|integer',
        'curso_id' => 'nullable|integer'
    ];
    
    public function filial() {
        return $this->belongsTo(Filial::class, 'filial_id');
    }
    
}
