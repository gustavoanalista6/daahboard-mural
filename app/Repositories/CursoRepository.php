<?php

namespace App\Repositories;

use App\Models\Curso;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class CursoRepository
 * @package App\Repositories
 * @version January 27, 2026, 6:36 pm UTC
*/

class CursoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'filial',
        'filial_id',
        'icon',
        'category',
        'subtitle',
        'title',
        'route'
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
        return Curso::class;
    }


    public function getById($id){
        return DB::table('cursos')
        ->join('filiais', 'cursos.filial_id', '=', 'filiais.id')
        ->select(
            'cursos.id',
            'cursos.filial_id',
             'cursos.title',
            'filiais.nome_filial',
            'cursos.subtitle',
            'cursos.category',
            'cursos.route',
            'cursos.icon'
        )->where('cursos.id', '=', $id)->first();
    }

    public function getAll(){
        return  DB::table('cursos')
        ->join('filiais', 'cursos.filial_id', '=', 'filiais.id')
        ->select(
            'cursos.id',
            'cursos.filial_id',
             'cursos.title',
            'filiais.nome_filial',
            'cursos.subtitle',
            'cursos.category',
            'cursos.route',
            'cursos.icon'
        )->whereNull('cursos.deleted_at')
        ->get();
    }
}
