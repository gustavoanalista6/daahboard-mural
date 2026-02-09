<?php

namespace App\Repositories;

use App\Models\legislacao;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;

/**
 * Class legislacaoRepository
 * @package App\Repositories
 * @version January 27, 2026, 7:38 pm UTC
 */

class legislacaoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'url',
        'order',
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
        return legislacao::class;
    }

    public function getAll()
    {
        return DB::table('legislacao')
            ->join('filiais', 'legislacao.filial_id', '=', 'filiais.id')
            ->select(
                'legislacao.title',
                'legislacao.url',
                'legislacao.order',
                'legislacao.filial_id',
                'filiais.nome_filial',
                'legislacao.id'
            )->whereNull('legislacao.deleted_at')
            
            ->get();
    }

    public function getById($id)
    {
        return DB::table('legislacao')
            ->join('filiais', 'legislacao.filial_id', '=', 'filiais.id')
            ->select(
                'legislacao.title',
                'legislacao.url',
                'legislacao.order',
                'legislacao.filial_id',
                'filiais.nome_filial',
                'legislacao.id'
            )->where('legislacao.id', $id)
            
            ->first();
    }
}
