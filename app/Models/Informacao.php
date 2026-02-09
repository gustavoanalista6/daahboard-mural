<?php

namespace App\Models;


use App\Models\Filial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Informacao
 * @package App\Models
 * @version January 27, 2026, 7:39 pm UTC
 *
 * @property string $title
 * @property string $icon
 * @property integer $filial_id
 * @property boolean $enable
 * @property string $route
 * @property string $url_pdf
 */
class Informacao extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'informacao';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'icon',
        'filial_id',
        'enable',
        'route',
        'url_pdf'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'icon' => 'string',
        'filial_id' => 'integer',
        'enable' => 'boolean',
        'route' => 'string',
        'url_pdf' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'nullable|string|max:255',
        'icon' => 'nullable|string|max:50',
        'filial_id' => 'nullable|integer',
        'enable' => 'nullable|boolean',
        'route' => 'nullable|string|max:50',
        'url_pdf' => 'nullable|string|max:255'
    ];
    
    public function filial() {
        return $this->belongsTo(Filial::class, 'filial_id');
    }
    
}
