<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Filial;
use App\Models\Servico;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;

use App\Repositories\ServicoRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateServicoRequest;
use App\Http\Requests\UpdateServicoRequest;

class ServicoController extends AppBaseController
{
    /** @var ServicoRepository $servicoRepository*/
    private $servicoRepository;

    public function __construct(ServicoRepository $servicoRepo)
    {
        
        $this->servicoRepository = $servicoRepo;
    }

    /**
     * Display a listing of the Servico.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $servicos = $this->servicoRepository->getAll();

        return view('servicos.index')
            ->with('servicos', $servicos);
    }

    /**
     * Show the form for creating a new Servico.
     *
     * @return Response
     */
    public function create()
    {
        $filiais = Filial::pluck('nome_filial', 'id');
        return view('servicos.create')->with('filiais', $filiais);
    }

    /**
     * Store a newly created Servico in storage.
     *
     * @param CreateServicoRequest $request
     *
     * @return Response
     */
    public function store(CreateServicoRequest $request)
    {
        $input = $request->all();

        $servico = $this->servicoRepository->create($input);

        Flash::success('Servico saved successfully.');

        return redirect(route('servicos.index'));
    }

    /**
     * Display the specified Servico.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $servico = $this->servicoRepository->getById($id);

        $filiais = Filial::pluck('nome_filial', 'id');
        if (empty($servico)) {
            Flash::error('Servico not found');

            return redirect(route('servicos.index'));
        }

        return view('servicos.show')->with('servico', $servico)->with('filiais', $filiais);
    }

    /**
     * Show the form for editing the specified Servico.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $servico = $this->servicoRepository->getById($id);
        $filiais = Filial::pluck('nome_filial', 'id');
        if (empty($servico)) {
            Flash::error('Servico not found');

            return redirect(route('servicos.index'));
        }

        return view('servicos.edit')->with('servico', $servico)->with('filiais', $filiais);
    }

    /**
     * Update the specified Servico in storage.
     *
     * @param int $id
     * @param UpdateServicoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateServicoRequest $request)
    {
        $servico = $this->servicoRepository->getById($id);

        if (empty($servico)) {
            Flash::error('Servico not found');

            return redirect(route('servicos.index'));
        }

        $servico = $this->servicoRepository->update($request->all(), $id);

        Flash::success('Servico updated successfully.');

        return redirect(route('servicos.index'));
    }

    /**
     * Remove the specified Servico from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $servico = $this->servicoRepository->getById($id);

        if (empty($servico)) {
            Flash::error('Servico not found');

            return redirect(route('servicos.index'));
        }

        $this->servicoRepository->delete($id);

        Flash::success('Servico deleted successfully.');

        return redirect(route('servicos.index'));
    }
}
