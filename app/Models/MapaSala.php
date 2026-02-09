<?php

namespace App\Models;


use App\Models\Filial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class MapaSala
 * @package App\Models
 * @version January 27, 2026, 7:39 pm UTC
 *
 * @property string $titulo
 * @property string $url_pdf
 */
class MapaSala extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'mapa_salas';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'titulo',
        'url_pdf'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'titulo' => 'string',
        'url_pdf' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'titulo' => 'nullable|string|max:255',
        'url_pdf' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function filial() {
        return $this->belongsTo(Filial::class, 'filial_id');
    }
}
