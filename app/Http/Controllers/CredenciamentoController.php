<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Filial;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Models\Credenciamento;

use App\Http\Controllers\AppBaseController;
use App\Repositories\CredenciamentoRepository;
use App\Http\Requests\CreateCredenciamentoRequest;
use App\Http\Requests\UpdateCredenciamentoRequest;
use Illuminate\Support\Facades\Storage;

class CredenciamentoController extends AppBaseController
{
    /** @var CredenciamentoRepository $credenciamentoRepository*/
    private $credenciamentoRepository;

    public function __construct(CredenciamentoRepository $credenciamentoRepo)
    {

        $this->credenciamentoRepository = $credenciamentoRepo;
    }

    /**
     * Display a listing of the Credenciamento.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $credenciamentos = $this->credenciamentoRepository->getAll();

        return view('credenciamentos.index')
            ->with('credenciamentos', $credenciamentos);
    }

    /**
     * Show the form for creating a new Credenciamento.
     *
     * @return Response
     */
    public function create()
    {
        $filiais = Filial::pluck('nome_filial', 'id');
        return view('credenciamentos.create')->with('filiais', $filiais);
    }

    /**
     * Store a newly created Credenciamento in storage.
     *
     * @param CreateCredenciamentoRequest $request
     *
     * @return Response
     */
    public function store(CreateCredenciamentoRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|file|mimes:pdf,jpg,png,jpeg|max:12000',
            ]);

            $file = $request->file('file');
            $fileName = $file->hashName();
            $path = $file->storeAs('credenciamentos', $fileName, 'public');

            $input['url'] = 'https://www.atenas.edu.br/storage/' . $path;
        }

        $credenciamento = $this->credenciamentoRepository->create($input);
        Flash::success('Credenciamento saved successfully.');
        return redirect(route('credenciamentos.index'));
    }

    /**
     * Display the specified Credenciamento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $credenciamento = $this->credenciamentoRepository->getById($id);
        if (empty($credenciamento)) {
            Flash::error('Credenciamento not found');

            return redirect(route('credenciamentos.index'));
        }

        return view('credenciamentos.show')->with('credenciamento', $credenciamento);
    }

    /**
     * Show the form for editing the specified Credenciamento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $credenciamento = $this->credenciamentoRepository->getById($id);
        $filiais = Filial::pluck('nome_filial', 'id');
        if (empty($credenciamento)) {
            Flash::error('Credenciamento not found');

            return redirect(route('credenciamentos.index'));
        }

        return view('credenciamentos.edit')->with('credenciamento', $credenciamento)->with('filiais', $filiais);
    }

    /**
     * Update the specified Credenciamento in storage.
     *
     * @param int $id
     * @param UpdateCredenciamentoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCredenciamentoRequest $request)
    {

        $input = $request->all();
        $credenciamento = $this->credenciamentoRepository->getById($id);
        if ($request->hasFile('file')) {
            if (!empty($credenciamento->url)) {
                $relativeOldPath = str_replace(['https://www.atenas.edu.br/storage/', 'http://localhost:8000/storage/'], '', $credenciamento->url);
                if (Storage::disk('public')->exists($relativeOldPath)) {
                    Storage::disk('public')->delete($relativeOldPath);
                }
            }
            $file = $request->file('file');
            $fileName = $file->hashName();
            $path = $file->storeAs('credenciamentos', $fileName, 'public');
            $input['url'] = 'https://www.atenas.edu.br' . Storage::url($path);
        }
        if (empty($credenciamento)) {
            Flash::error('Credenciamento not found');
            return redirect(route('credenciamentos.index'));
        }
        $credenciamento = $this->credenciamentoRepository->update($input, $id);
        Flash::success('Credenciamento updated successfully.');
        return redirect(route('credenciamentos.index'));
    }

    /**
     * Remove the specified Credenciamento from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $credenciamento = $this->credenciamentoRepository->getById($id);
        if (empty($credenciamento)) {
            Flash::error('Credenciamento not found');

            return redirect(route('credenciamentos.index'));
        }
        $this->credenciamentoRepository->delete($id);
        Flash::success('Credenciamento deleted successfully.');

        return redirect(route('credenciamentos.index'));
    }
}
