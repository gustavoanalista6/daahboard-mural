<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Filial;
use App\Models\Informacao;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Repositories\InformacaoRepository;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateInformacaoRequest;
use App\Http\Requests\UpdateInformacaoRequest;

class InformacaoController extends AppBaseController
{
    /** @var InformacaoRepository $informacaoRepository*/
    private $informacaoRepository;

    public function __construct(InformacaoRepository $informacaoRepo)
    {
        
        $this->informacaoRepository = $informacaoRepo;
    }

    /**
     * Display a listing of the Informacao.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $informacaos = $this->informacaoRepository->getAll();

        return view('informacaos.index')
            ->with('informacaos', $informacaos);
    }

    /**
     * Show the form for creating a new Informacao.
     *
     * @return Response
     */
    public function create()
    {
         $filiais = Filial::pluck('nome_filial', 'id');
        return view('informacaos.create')->with('filiais', $filiais);
    }

    /**
     * Store a newly created Informacao in storage.
     *
     * @param CreateInformacaoRequest $request
     *
     * @return Response
     */
    public function store(CreateInformacaoRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|file|mimes:pdf,jpg,png,jpeg|max:12000',
            ]);

            $file = $request->file('file');
            $fileName = $file->hashName();
            $path = $file->storeAs('informacao', $fileName, 'public');
            $input['url_pdf'] = 'https://www.atenas.edu.br/storage/' . $path;
        }
        $informacao = $this->informacaoRepository->create($input);

        Flash::success('Informacao saved successfully.');

        return redirect(route('informacaos.index'));
    }

    /**
     * Display the specified Informacao.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $informacao = $this->informacaoRepository->getById($id);

       
        if (empty($informacao)) {
            Flash::error('Informacao not found');

            return redirect(route('informacaos.index'));
        }

        return view('informacaos.show')->with('informacao', $informacao);
    }

    /**
     * Show the form for editing the specified Informacao.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $informacao = $this->informacaoRepository->getById($id);
        $filiais = Filial::pluck('nome_filial', 'id');
        if (empty($informacao)) {
            Flash::error('Informacao not found');

            return redirect(route('informacaos.index'));
        }

        return view('informacaos.edit')->with('informacao', $informacao)->with('filiais', $filiais);
    }

    /**
     * Update the specified Informacao in storage.
     *
     * @param int $id
     * @param UpdateInformacaoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInformacaoRequest $request)
    {
        $input = $request->all();   
        
        $informacao = $this->informacaoRepository->getById($id);
  
        if ($request->hasFile('file')) {
            if (!empty($informacao->url_pdf)) {
                $relativeOldPath = str_replace(['https://www.atenas.edu.br/storage/', 'http://localhost:8000/storage/'], '', $informacao->url_pdf);
                if (Storage::disk('public')->exists($relativeOldPath)) {
                    Storage::disk('public')->delete($relativeOldPath);
                }
            
            }

            $file = $request->file('file');
            $fileName = $file->hashName();
            $path = $file->storeAs('informacao', $fileName, 'public');
            $input['url_pdf'] = 'https://www.atenas.edu.br/storage/' . $path;
        }
        
        if (empty($informacao)) {
            Flash::error('Informacao not found');

            return redirect(route('informacaos.index'));
        }

        $informacao = $this->informacaoRepository->update($input, $id);

        Flash::success('Informacao updated successfully.');

        return redirect(route('informacaos.index'));
    }

    /**
     * Remove the specified Informacao from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $informacao = $this->informacaoRepository->getById($id);

        if (empty($informacao)) {
            Flash::error('Informacao not found');

            return redirect(route('informacaos.index'));
        }

        $this->informacaoRepository->delete($id);

        Flash::success('Informacao deleted successfully.');

        return redirect(route('informacaos.index'));
    }
}
