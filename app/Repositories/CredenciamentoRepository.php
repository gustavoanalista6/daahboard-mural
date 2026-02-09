<?php

namespace App\Repositories;

use App\Models\Credenciamento;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;

/**
 * Class CredenciamentoRepository
 * @package App\Repositories
 * @version January 27, 2026, 7:21 pm UTC
*/

class CredenciamentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'url',
        'filial_id',
        'title'
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
        return Credenciamento::class;
    }
    
    public function getAll(){
        return DB::table('credenciamentos')
        ->join('filiais', 'credenciamentos.filial_id', '=', 'filiais.id')
        ->select(
            'credenciamentos.url',
            'filiais.nome_filial',
            'credenciamentos.title',
            'credenciamentos.filial_id',
            'credenciamentos.id'
        )->whereNull('credenciamentos.deleted_at')
        ->get();
    }

    public function getById($id){
        return DB::table('credenciamentos')
        ->join('filiais', 'credenciamentos.filial_id', '=', 'filiais.id')
        ->select(
            'credenciamentos.url',
            'filiais.nome_filial',
            'credenciamentos.title',
            'credenciamentos.filial_id',
            'credenciamentos.id'
        )->where('credenciamentos.id', '=', $id)
        ->first();
    }
}
