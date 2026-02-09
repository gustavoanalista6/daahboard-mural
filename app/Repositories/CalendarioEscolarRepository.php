<?php

namespace App\Repositories;

use App\Models\CalendarioEscolar;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;

/**
 * Class CalendarioEscolarRepository
 * @package App\Repositories
 * @version January 27, 2026, 7:15 pm UTC
 */

class CalendarioEscolarRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'url',
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
        return CalendarioEscolar::class;
    }

    public function getAll()
    {
        return DB::table('calendario_escolar')
            ->join('filiais', 'calendario_escolar.filial_id', '=', 'filiais.id')
            ->select(
                'filiais.nome_filial',
                'calendario_escolar.url',
                'calendario_escolar.id',
                'calendario_escolar.filial_id'
            )->whereNull('calendario_escolar.deleted_at')
            ->get();
    }

    public function getById($id){
        return DB::table('calendario_escolar')
            ->join('filiais', 'calendario_escolar.filial_id', '=', 'filiais.id')
            ->select(
                'filiais.nome_filial',
                'calendario_escolar.url',
                'calendario_escolar.id',
                'calendario_escolar.filial_id'
            )->where('calendario_escolar.id', '=', $id)
            ->first();
    }
}
