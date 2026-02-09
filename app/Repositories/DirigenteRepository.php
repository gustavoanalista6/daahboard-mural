<?php

namespace App\Repositories;

use App\Models\Dirigente;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;

/**
 * Class DirigenteRepository
 * @package App\Repositories
 * @version January 27, 2026, 8:03 pm UTC
 */

class DirigenteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'position',
        'order',
        'name',
        'filial_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Dirigente::class;
    }

    public function getAll()
    {
        return DB::table('dirigentes')
            ->join('filiais', 'dirigentes.filial_id', '=', 'filiais.id')
            ->select(
                'dirigentes.position',
                'dirigentes.order',
                'dirigentes.name',
                'dirigentes.filial_id',
                'filiais.nome_filial',
                'dirigentes.id',
            )->whereNull('dirigentes.deleted_at')
            ->get();
    }

    public function getById($id)
    {
        return DB::table('dirigentes')
            ->join('filiais', 'dirigentes.filial_id', '=', 'filiais.id')
            ->select(
                'dirigentes.position',
                'dirigentes.order',
                'dirigentes.name',
                'dirigentes.filial_id',
                'filiais.nome_filial',
                'dirigentes.id',
            )->where('dirigentes.id', '=', $id)
            ->first();
    }
}
