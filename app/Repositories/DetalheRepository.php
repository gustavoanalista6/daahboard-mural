<?php

namespace App\Repositories;

use App\Models\Detalhe;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;

/**
 * Class DetalheRepository
 * @package App\Repositories
 * @version January 27, 2026, 7:39 pm UTC
*/

class DetalheRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'filial_id',
        'curso_id'
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
        return Detalhe::class;
    }

    public function getAll(){
        return DB::table('detalhe_curso')
        ->join('filiais', 'filiais.id', '=', 'detalhe_curso.filial_id')
        ->join('cursos', 'cursos.id', '=', 'detalhe_curso.curso_id')
        ->select(
            'detalhe_curso.title',
            'detalhe_curso.icon',
            'detalhe_curso.url_pdf',
            'detalhe_curso.filial_id',
            'filiais.nome_filial',
            'cursos.title as curso',
            'detalhe_curso.id'
        )->whereNull('detalhe_curso.deleted_at')
        ->get();
    }

    public function getById($id){
        return DB::table('detalhe_curso')
        ->join('filiais', 'filiais.id', '=', 'detalhe_curso.filial_id')
        ->join('cursos', 'cursos.id', '=', 'detalhe_curso.curso_id')
        ->select(
            'detalhe_curso.title',
            'detalhe_curso.icon',
            'detalhe_curso.url_pdf',
            'detalhe_curso.filial_id',
            'filiais.nome_filial',
            'cursos.title as curso',
            'detalhe_curso.id'
        )->where('detalhe_curso.id','=', $id)
        ->first();
    }
}
