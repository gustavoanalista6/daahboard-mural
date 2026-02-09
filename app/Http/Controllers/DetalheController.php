<?php

namespace App\Http\Controllers;


use Response;
use App\Models\Filial;
use App\Models\Detalhe;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Repositories\DetalheRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateDetalheRequest;
use App\Http\Requests\UpdateDetalheRequest;
use Illuminate\Support\Facades\DB;

class DetalheController extends AppBaseController
{
    /** @var DetalheRepository $detalheRepository*/
    private $detalheRepository;

    public function __construct(DetalheRepository $detalheRepo)
    {
        
        $this->detalheRepository = $detalheRepo;
    }

    /**
     * Display a listing of the Detalhe.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $detalhes = $this->detalheRepository->getAll();

        return view('detalhes.index')
            ->with('detalhes', $detalhes);
    }

    /**
     * Show the form for creating a new Detalhe.
     *
     * @return Response
     */
    public function create()
    {
        $filiais = Filial::pluck('nome_filial', 'id');

        $cursos = DB::table('cursos')
            ->join('filiais', 'filiais.id', '=', 'cursos.filial_id')
            ->select(
                'cursos.id',
                DB::raw("CONCAT(cursos.title, ' - ', UPPER(SUBSTRING(filiais.nome_filial, 1))) as curso")
            )
            ->pluck('curso', 'id')
            ->toArray();

        return view('detalhes.create')->with('filiais', $filiais)->with('cursos', $cursos);
    }

    /**
     * Store a newly created Detalhe in storage.
     *
     * @param CreateDetalheRequest $request
     *
     * @return Response
     */
    public function store(CreateDetalheRequest $request)
    {
        $input = $request->all();
  
        $detalhe = $this->detalheRepository->create($input);

        Flash::success('Detalhe saved successfully.');

        return redirect(route('detalhes.index'));
    }

    /**
     * Display the specified Detalhe.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $detalhe = $this->detalheRepository->getById($id);

        if (empty($detalhe)) {
            Flash::error('Detalhe not found');

            return redirect(route('detalhes.index'));
        }

        return view('detalhes.show')->with('detalhe', $detalhe);
    }

    /**
     * Show the form for editing the specified Detalhe.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $detalhe = $this->detalheRepository->getById($id);
        $filiais = Filial::pluck('nome_filial', 'id');
        $cursos = DB::table('cursos')
            ->join('filiais', 'filiais.id', '=', 'cursos.filial_id')
            ->select(
                'cursos.id',
                DB::raw("CONCAT(cursos.title, ' - ', UPPER(SUBSTRING(filiais.nome_filial, 1))) as curso")
            )
            ->pluck('curso', 'id')
            ->toArray();

        if (empty($detalhe)) {
            Flash::error('Detalhe not found');

            return redirect(route('detalhes.index'));
        }

        return view('detalhes.edit')->with('detalhe', $detalhe)->with('filiais', $filiais)->with('cursos', $cursos);
    }

    /**
     * Update the specified Detalhe in storage.
     *
     * @param int $id
     * @param UpdateDetalheRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDetalheRequest $request)
    {
        $detalhe = $this->detalheRepository->getById($id);

        if (empty($detalhe)) {
            Flash::error('Detalhe not found');

            return redirect(route('detalhes.index'));
        }

        $detalhe = $this->detalheRepository->update($request->all(), $id);

        Flash::success('Detalhe updated successfully.');

        return redirect(route('detalhes.index'));
    }

    /**
     * Remove the specified Detalhe from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $detalhe = $this->detalheRepository->getById($id);

        if (empty($detalhe)) {
            Flash::error('Detalhe not found');

            return redirect(route('detalhes.index'));
        }

        $this->detalheRepository->delete($id);

        Flash::success('Detalhe deleted successfully.');

        return redirect(route('detalhes.index'));
    }
}
