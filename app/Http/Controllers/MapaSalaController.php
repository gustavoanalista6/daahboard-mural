<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMapaSalaRequest;
use App\Http\Requests\UpdateMapaSalaRequest;
use App\Repositories\MapaSalaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MapaSalaController extends AppBaseController
{
    /** @var MapaSalaRepository $mapaSalaRepository*/
    private $mapaSalaRepository;

    public function __construct(MapaSalaRepository $mapaSalaRepo)
    {
        
        $this->mapaSalaRepository = $mapaSalaRepo;
    }

    /**
     * Display a listing of the MapaSala.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $mapaSalas = $this->mapaSalaRepository->all();

        return view('mapa_salas.index')
            ->with('mapaSalas', $mapaSalas);
    }

    /**
     * Show the form for creating a new MapaSala.
     *
     * @return Response
     */
    public function create()
    {
        return view('mapa_salas.create');
    }

    /**
     * Store a newly created MapaSala in storage.
     *
     * @param CreateMapaSalaRequest $request
     *
     * @return Response
     */
    public function store(CreateMapaSalaRequest $request)
    {
        $input = $request->all();

        $mapaSala = $this->mapaSalaRepository->create($input);

        Flash::success('Mapa Sala saved successfully.');

        return redirect(route('mapaSalas.index'));
    }

    /**
     * Display the specified MapaSala.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mapaSala = $this->mapaSalaRepository->find($id);

        if (empty($mapaSala)) {
            Flash::error('Mapa Sala not found');

            return redirect(route('mapaSalas.index'));
        }

        return view('mapa_salas.show')->with('mapaSala', $mapaSala);
    }

    /**
     * Show the form for editing the specified MapaSala.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mapaSala = $this->mapaSalaRepository->find($id);

        if (empty($mapaSala)) {
            Flash::error('Mapa Sala not found');

            return redirect(route('mapaSalas.index'));
        }

        return view('mapa_salas.edit')->with('mapaSala', $mapaSala);
    }

    /**
     * Update the specified MapaSala in storage.
     *
     * @param int $id
     * @param UpdateMapaSalaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMapaSalaRequest $request)
    {
        $mapaSala = $this->mapaSalaRepository->find($id);

        if (empty($mapaSala)) {
            Flash::error('Mapa Sala not found');

            return redirect(route('mapaSalas.index'));
        }

        $mapaSala = $this->mapaSalaRepository->update($request->all(), $id);

        Flash::success('Mapa Sala updated successfully.');

        return redirect(route('mapaSalas.index'));
    }

    /**
     * Remove the specified MapaSala from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mapaSala = $this->mapaSalaRepository->find($id);

        if (empty($mapaSala)) {
            Flash::error('Mapa Sala not found');

            return redirect(route('mapaSalas.index'));
        }

        $this->mapaSalaRepository->delete($id);

        Flash::success('Mapa Sala deleted successfully.');

        return redirect(route('mapaSalas.index'));
    }
}
