<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFilialRequest;
use App\Http\Requests\UpdateFilialRequest;
use App\Repositories\FilialRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FilialController extends AppBaseController
{
    /** @var FilialRepository $filialRepository*/
    private $filialRepository;

    public function __construct(FilialRepository $filialRepo)
    {
        
        $this->filialRepository = $filialRepo;
    }

    /**
     * Display a listing of the Filial.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $filials = $this->filialRepository->all();

        return view('filials.index')
            ->with('filials', $filials);
    }

    /**
     * Show the form for creating a new Filial.
     *
     * @return Response
     */
    public function create()
    {
        return view('filials.create');
    }

    /**
     * Store a newly created Filial in storage.
     *
     * @param CreateFilialRequest $request
     *
     * @return Response
     */
    public function store(CreateFilialRequest $request)
    {
        $input = $request->all();

        $filial = $this->filialRepository->create($input);

        Flash::success('Filial saved successfully.');

        return redirect(route('filials.index'));
    }

    /**
     * Display the specified Filial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $filial = $this->filialRepository->find($id);

        if (empty($filial)) {
            Flash::error('Filial not found');

            return redirect(route('filials.index'));
        }

        return view('filials.show')->with('filial', $filial);
    }

    /**
     * Show the form for editing the specified Filial.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $filial = $this->filialRepository->find($id);

        if (empty($filial)) {
            Flash::error('Filial not found');

            return redirect(route('filials.index'));
        }

        return view('filials.edit')->with('filial', $filial);
    }

    /**
     * Update the specified Filial in storage.
     *
     * @param int $id
     * @param UpdateFilialRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFilialRequest $request)
    {
        $filial = $this->filialRepository->find($id);

        if (empty($filial)) {
            Flash::error('Filial not found');

            return redirect(route('filials.index'));
        }

        $filial = $this->filialRepository->update($request->all(), $id);

        Flash::success('Filial updated successfully.');

        return redirect(route('filials.index'));
    }

    /**
     * Remove the specified Filial from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $filial = $this->filialRepository->find($id);

        if (empty($filial)) {
            Flash::error('Filial not found');

            return redirect(route('filials.index'));
        }

        $this->filialRepository->delete($id);

        Flash::success('Filial deleted successfully.');

        return redirect(route('filials.index'));
    }
}
