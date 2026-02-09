<?php

namespace App\Models;


use App\Models\Filial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class legislacao
 * @package App\Models
 * @version January 27, 2026, 7:38 pm UTC
 *
 * @property string $title
 * @property string $url
 * @property integer $order
 * @property integer $filial_id
 */
class legislacao extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'legislacao';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'url',
        'order',
        'filial_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'url' => 'string',
        'order' => 'integer',
        'filial_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'nullable|string|max:255',
        'url' => 'nullable|string|max:500',
        'order' => 'nullable|integer',
        'filial_id' => 'nullable|integer'
    ];

    public function filial() {
        return $this->belongsTo(Filial::class, 'filial_id');
    }
}
