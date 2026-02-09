<?php

namespace App\Repositories;

use App\Models\Informacao;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;

/**
 * Class InformacaoRepository
 * @package App\Repositories
 * @version January 27, 2026, 7:39 pm UTC
 */

class InformacaoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'icon',
        'filial_id',
        'enable',
        'route',
        'url_pdf'
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
        return Informacao::class;
    }

    public function getAll()
    {
        return DB::table('informacao')
            ->join('filiais', 'informacao.filial_id', '=', 'filiais.id')
            ->select(
                'informacao.title',
                'informacao.icon',
                'informacao.enable',
                'informacao.route',
                'informacao.url_pdf',
                'informacao.id',
                'filiais.nome_filial',
                'informacao.filial_id'
            )->whereNull('informacao.deleted_at')
            ->get();
    }

    public function getById($id)
    {
        return DB::table('informacao')
            ->join('filiais', 'informacao.filial_id', '=', 'filiais.id')
            ->select(
                'informacao.title',
                'informacao.icon',
                'informacao.enable',
                'informacao.route',
                'informacao.url_pdf',
                'informacao.id',
                'filiais.nome_filial',
                'informacao.filial_id'
            )->where('informacao.id',$id)
            ->first();
    }
}
