<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;

class SeriesController extends Controller
{
    public function __construct(private SeriesRepository $repository)
    {

    }

    public function index()
    {
        $series = Series::with(['seasons'])->get();
        $message = session('message');

        return view('series.index')->with('series', $series)->with('message', $message);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = $this->repository->add($request);

        return to_route('series.index')
            ->with('message', "Série <b>$serie->name</b> adicionada com sucesso!");
    }

    public function destroy(Series $series)
    {
        $series->delete();
        return to_route('series.index')
            ->with('message', "Série <b>$series->name</b> removida com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('series', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return to_route('series.index')
            ->withMessage("Série <b>$series->name</b> atualizada com sucesso!");
    }
}
