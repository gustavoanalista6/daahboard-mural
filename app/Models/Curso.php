<?php

namespace App\Models;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Curso
 * @package App\Models
 * @version January 27, 2026, 6:36 pm UTC
 *
 * @property integer $filial_id
 * @property string $icon
 * @property string $category
 * @property string $subtitle
 * @property string $title
 * @property string $route
 */
class Curso extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'cursos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'filial_id',
        'icon',
        'category',
        'subtitle',
        'title',
        'route',
        'nome_filial'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'filial_id' => 'integer',
        'icon' => 'string',
        'category' => 'string',
        'subtitle' => 'string',
        'title' => 'string',
        'route' => 'string',
        'nome_filial' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'filial_id' => 'nullable',
        'icon' => 'nullable|string|max:50',
        'category' => 'required|string|max:20',
        'subtitle' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'route' => 'required|string|max:50',
        'deleted_at' => 'nullable'
    ];

    public function filial() {
        return $this->belongsTo(Filial::class, 'filial_id');
    }
    
}
