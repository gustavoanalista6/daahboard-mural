<?php

namespace App\Repositories;

use App\Models\MapaSala;
use App\Repositories\BaseRepository;

/**
 * Class MapaSalaRepository
 * @package App\Repositories
 * @version January 27, 2026, 7:39 pm UTC
*/

class MapaSalaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'titulo',
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
        return MapaSala::class;
    }
}
