<?php

namespace App\Http\Controllers;

use Response;
use App\Models\Filial;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Models\CalendarioEscolar;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CalendarioEscolarRepository;
use App\Http\Requests\CreateCalendarioEscolarRequest;
use App\Http\Requests\UpdateCalendarioEscolarRequest;

class CalendarioEscolarController extends AppBaseController
{
    /** @var CalendarioEscolarRepository $calendarioEscolarRepository*/
    private $calendarioEscolarRepository;

    public function __construct(CalendarioEscolarRepository $calendarioEscolarRepo)
    {
        
        $this->calendarioEscolarRepository = $calendarioEscolarRepo;
    }

    /**
     * Display a listing of the CalendarioEscolar.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        //$calendarioEscolars = $this->calendarioEscolarRepository->all();
        $calendarioEscolars = $this->calendarioEscolarRepository->getAll();
 
        return view('calendario_escolars.index')
            ->with('calendarioEscolars', $calendarioEscolars);
    }

    /**
     * Show the form for creating a new CalendarioEscolar.
     *
     * @return Response
     */
    public function create()
    {
        $filiais = Filial::pluck('nome_filial', 'id');
        return view('calendario_escolars.create')->with('filiais', $filiais);
    }

    /**
     * Store a newly created CalendarioEscolar in storage.
     *
     * @param CreateCalendarioEscolarRequest $request
     *
     * @return Response
     */
    public function store(CreateCalendarioEscolarRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'required|file|mimes:pdf,jpg,png,jpeg|max:12000', 
            ]);

            $file = $request->file('file');
            $fileName = $file->hashName();
            $path = $file->storeAs('calendario-escolar', $fileName, 'public'); 
     
            $input['url'] = 'https://www.atenas.edu.br/storage/' . $path;
        }
        $calendarioEscolar = $this->calendarioEscolarRepository->create($input);

        Flash::success('Calendario Escolar saved successfully.');

        return redirect(route('calendarioEscolars.index'));
    }

    /**
     * Display the specified CalendarioEscolar.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $calendarioEscolar = $this->calendarioEscolarRepository->getById($id);

        if (empty($calendarioEscolar)) {
            Flash::error('Calendario Escolar not found');

            return redirect(route('calendarioEscolars.index'));
        }

        return view('calendario_escolars.show')->with('calendarioEscolars', $calendarioEscolar);
    }

    /**
     * Show the form for editing the specified CalendarioEscolar.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $calendarioEscolar = $this->calendarioEscolarRepository->getById($id);
          $filiais = Filial::pluck('nome_filial', 'id');
        if (empty($calendarioEscolar)) {
            Flash::error('Calendario Escolar not found');

            return redirect(route('calendarioEscolars.index'));
        }

        return view('calendario_escolars.edit')->with('calendarioEscolar', $calendarioEscolar)->with('filiais', $filiais);
    }

    /**
     * Update the specified CalendarioEscolar in storage.
     *
     * @param int $id
     * @param UpdateCalendarioEscolarRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCalendarioEscolarRequest $request)
    {
        $calendarioEscolar = $this->calendarioEscolarRepository->find($id);
        if ($request->hasFile('file')) {
            if (!empty($calendarioEscolar->url)) {
                $relativeOldPath = str_replace(['https://www.atenas.edu.br/storage/', 'http://localhost:8000/storage/'], '', $calendarioEscolar->url);
                if (Storage::disk('public')->exists($relativeOldPath)) {
                    Storage::disk('public')->delete($relativeOldPath);
                }
            }
            $file = $request->file('file');
            $fileName = $file->hashName();
            $path = $file->storeAs('calendario-escolar', $fileName, 'public');
            $input['url'] = 'https://www.atenas.edu.br' . Storage::url($path);
        }
        if (empty($calendarioEscolar)) {
            Flash::error('Calendario Escolar not found');

            return redirect(route('calendarioEscolars.index'));
        }

        $calendarioEscolar = $this->calendarioEscolarRepository->update($request->all(), $id);

        Flash::success('Calendario Escolar updated successfully.');

        return redirect(route('calendarioEscolars.index'));
    }

    /**
     * Remove the specified CalendarioEscolar from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $calendarioEscolar = $this->calendarioEscolarRepository->find($id);

        if (empty($calendarioEscolar)) {
            Flash::error('Calendario Escolar not found');

            return redirect(route('calendarioEscolars.index'));
        }

        $this->calendarioEscolarRepository->delete($id);

        Flash::success('Calendario Escolar deleted successfully.');

        return redirect(route('calendarioEscolars.index'));
    }


}
