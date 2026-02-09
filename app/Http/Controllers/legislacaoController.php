<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Filial;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Repositories\legislacaoRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreatelegislacaoRequest;
use App\Http\Requests\UpdatelegislacaoRequest;

class legislacaoController extends AppBaseController
{
    /** @var legislacaoRepository $legislacaoRepository*/
    private $legislacaoRepository;

    public function __construct(legislacaoRepository $legislacaoRepo)
    {
        
        $this->legislacaoRepository = $legislacaoRepo;
    }

    /**
     * Display a listing of the legislacao.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $legislacaos = $this->legislacaoRepository->getAll();

        return view('legislacaos.index')
            ->with('legislacaos', $legislacaos);
    }

    /**
     * Show the form for creating a new legislacao.
     *
     * @return Response
     */
    public function create()
    {
        $filiais = Filial::pluck('nome_filial', 'id');
        return view('legislacaos.create')->with('filiais', $filiais);
    }

    /**
     * Store a newly created legislacao in storage.
     *
     * @param CreatelegislacaoRequest $request
     *
     * @return Response
     */
    public function store(CreatelegislacaoRequest $request)
    {
        $input = $request->all();

        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|file|mimes:pdf,jpg,png,jpeg|max:12000',
            ]);

            $file = $request->file('file');
            $fileName = $file->hashName();
            $path = $file->storeAs('legislacao', $fileName, 'public');

            $input['url'] = 'https://www.atenas.edu.br/storage/' . $path;
        }
        $legislacao = $this->legislacaoRepository->create($input);

        Flash::success('Legislacao saved successfully.');

        return redirect(route('legislacaos.index'));
    }

    /**
     * Display the specified legislacao.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $legislacao = $this->legislacaoRepository->getById($id);
        
        if (empty($legislacao)) {
            Flash::error('Legislacao not found');

            return redirect(route('legislacaos.index'));
        }

        return view('legislacaos.show')->with('legislacao', $legislacao);
    }

    /**
     * Show the form for editing the specified legislacao.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $legislacao = $this->legislacaoRepository->getById($id);
        $filiais = Filial::pluck('nome_filial', 'id');
        if (empty($legislacao)) {
            Flash::error('Legislacao not found');

            return redirect(route('legislacaos.index'));
        }

        return view('legislacaos.edit')->with('legislacao', $legislacao)->with('filiais', $filiais);
    }

    /**
     * Update the specified legislacao in storage.
     *
     * @param int $id
     * @param UpdatelegislacaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatelegislacaoRequest $request)
    {
        $legislacao = $this->legislacaoRepository->getById($id);
        if ($request->hasFile('file')) {
            if (!empty($legislacao->url)) {
                $relativeOldPath = str_replace(['https://www.atenas.edu.br/storage/', 'http://localhost:8000/storage/'], '', $legislacao->url);
                if (Storage::disk('public')->exists($relativeOldPath)) {
                    Storage::disk('public')->delete($relativeOldPath);
                }
            }
            $file = $request->file('file');
            $fileName = $file->hashName();
            $path = $file->storeAs('legislacao', $fileName, 'public');
            $input['url'] = 'https://www.atenas.edu.br' . Storage::url($path);
        }
        
        if (empty($legislacao)) {
            Flash::error('Legislacao not found');

            return redirect(route('legislacaos.index'));
        }

        $legislacao = $this->legislacaoRepository->update($request->all(), $id);

        Flash::success('Legislacao updated successfully.');

        return redirect(route('legislacaos.index'));
    }

    /**
     * Remove the specified legislacao from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $legislacao = $this->legislacaoRepository->getById($id);

        if (empty($legislacao)) {
            Flash::error('Legislacao not found');

            return redirect(route('legislacaos.index'));
        }

        $this->legislacaoRepository->delete($id);

        Flash::success('Legislacao deleted successfully.');

        return redirect(route('legislacaos.index'));
    }
}
