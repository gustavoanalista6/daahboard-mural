<?php

namespace App\Models;


use App\Models\Filial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Servico
 * @package App\Models
 * @version January 27, 2026, 7:38 pm UTC
 *
 * @property string $title
 * @property number $value
 * @property boolean $first_fee_exemption
 * @property boolean $is_monthly
 * @property integer $filial_id
 */
class Servico extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'servicos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'value',
        'first_fee_exemption',
        'is_monthly',
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
        'value' => 'float',
        'first_fee_exemption' => 'boolean',
        'is_monthly' => 'boolean',
        'filial_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'nullable|string|max:255',
        'value' => 'nullable|numeric',
        'first_fee_exemption' => 'nullable|boolean',
        'is_monthly' => 'nullable|boolean',
        'filial_id' => 'nullable|integer'
    ];

    public function filial() {
        return $this->belongsTo(Filial::class, 'filial_id');
    }
}
