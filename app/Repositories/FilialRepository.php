<?php

namespace App\Repositories;

use App\Models\Filial;
use App\Repositories\BaseRepository;

/**
 * Class FilialRepository
 * @package App\Repositories
 * @version January 27, 2026, 6:24 pm UTC
*/

class FilialRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome_filial',
        'foto_url_filial'
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
        return Filial::class;
    }
}
