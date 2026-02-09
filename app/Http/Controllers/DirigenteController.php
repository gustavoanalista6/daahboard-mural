<?php

namespace App\Http\Controllers;


use Response;
use App\Models\Filial;
use App\Models\Dirigente;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Repositories\DirigenteRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateDirigenteRequest;
use App\Http\Requests\UpdateDirigenteRequest;

class DirigenteController extends AppBaseController
{
    /** @var DirigenteRepository $dirigenteRepository*/
    private $dirigenteRepository;

    public function __construct(DirigenteRepository $dirigenteRepo)
    {
        
        $this->dirigenteRepository = $dirigenteRepo;
    }

    /**
     * Display a listing of the Dirigente.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $dirigentes = $this->dirigenteRepository->getAll();

        return view('dirigentes.index')
            ->with('dirigentes', $dirigentes);
    }

    /**
     * Show the form for creating a new Dirigente.
     *
     * @return Response
     */
    public function create()
    {
        $filiais = Filial::pluck('nome_filial', 'id');
        return view('dirigentes.create')->with('filiais', $filiais);
    }

    /**
     * Store a newly created Dirigente in storage.
     *
     * @param CreateDirigenteRequest $request
     *
     * @return Response
     */
    public function store(CreateDirigenteRequest $request)
    {
        $input = $request->all();

        $dirigente = $this->dirigenteRepository->create($input);

        Flash::success('Dirigente saved successfully.');

        return redirect(route('dirigentes.index'));
    }

    /**
     * Display the specified Dirigente.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $dirigente = $this->dirigenteRepository->getById($id);
       $filiais = Filial::pluck('nome_filial', 'id');
        if (empty($dirigente)) {
            Flash::error('Dirigente not found');

            return redirect(route('dirigentes.index'));
        }

        return view('dirigentes.show')->with('dirigente', $dirigente)->with('filiais', $filiais);
    }

    /**
     * Show the form for editing the specified Dirigente.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $dirigente = $this->dirigenteRepository->getById($id);
        $filiais = Filial::pluck('nome_filial', 'id');
        if (empty($dirigente)) {
            Flash::error('Dirigente not found');

            return redirect(route('dirigentes.index'));
        }

        return view('dirigentes.edit')->with('dirigente', $dirigente)->with('filiais', $filiais);
    }

    /**
     * Update the specified Dirigente in storage.
     *
     * @param int $id
     * @param UpdateDirigenteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDirigenteRequest $request)
    {
        $dirigente = $this->dirigenteRepository->getById($id);

        if (empty($dirigente)) {
            Flash::error('Dirigente not found');

            return redirect(route('dirigentes.index'));
        }

        $dirigente = $this->dirigenteRepository->update($request->all(), $id);

        Flash::success('Dirigente updated successfully.');

        return redirect(route('dirigentes.index'));
    }

    /**
     * Remove the specified Dirigente from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $dirigente = $this->dirigenteRepository->getById($id);

        if (empty($dirigente)) {
            Flash::error('Dirigente not found');

            return redirect(route('dirigentes.index'));
        }

        $this->dirigenteRepository->delete($id);

        Flash::success('Dirigente deleted successfully.');

        return redirect(route('dirigentes.index'));
    }
}
