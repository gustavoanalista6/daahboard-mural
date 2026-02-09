<?php

namespace App\Repositories;

use App\Models\Servico;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;

/**
 * Class ServicoRepository
 * @package App\Repositories
 * @version January 27, 2026, 7:38 pm UTC
 */

class ServicoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'value',
        'first_fee_exemption',
        'is_monthly',
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
        return Servico::class;
    }

    public function getById($id)
    {
        return DB::table('servicos')
            ->join('filiais', 'filiais.id', '=', 'servicos.filial_id')
            ->select(
                'servicos.title',
                'servicos.value',
                'servicos.first_fee_exemption',
                'servicos.is_monthly',
                'servicos.id',
                'filiais.nome_filial',
                'servicos.filial_id'
            )
            ->where('servicos.id','=', $id)
            ->first();
    }

    public function getAll()
    {
        return DB::table('servicos')
            ->join('filiais', 'filiais.id', '=', 'servicos.filial_id')
            ->select(
                'servicos.title',
                'servicos.value',
                'servicos.first_fee_exemption',
                'servicos.is_monthly',
                'servicos.id',
                'filiais.nome_filial',
                'servicos.filial_id'
            )->whereNull('servicos.deleted_at')->get();
    }
}
