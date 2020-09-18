<?php

namespace App\Http\Controllers\trschedule;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Trainschedule;
use Illuminate\Http\Request;

class TrainscheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $trainschedule = Trainschedule::where('First_name', 'LIKE', "%$keyword%")
                ->orWhere('surname', 'LIKE', "%$keyword%")
                ->orWhere('Daysactive', 'LIKE', "%$keyword%")
                ->orWhere('Time_in', 'LIKE', "%$keyword%")
                ->orWhere('Time_out', 'LIKE', "%$keyword%")
                ->orWhere('Day1', 'LIKE', "%$keyword%")
                ->orWhere('Day2', 'LIKE', "%$keyword%")
                ->orWhere('Day3', 'LIKE', "%$keyword%")
                ->orWhere('Day4', 'LIKE', "%$keyword%")
                ->orWhere('Daysoffweekly', 'LIKE', "%$keyword%")
                ->orWhere('Day_off_1', 'LIKE', "%$keyword%")
                ->orWhere('Day_off_2', 'LIKE', "%$keyword%")
                ->orWhere('Day_off_3', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $trainschedule = Trainschedule::latest()->paginate($perPage);
        }

        return view('trschedule.trainschedule.index', compact('trainschedule'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('trschedule.trainschedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Trainschedule::create($requestData);

        return redirect('trschedule/trainschedule')->with('flash_message', 'Trainschedule added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $trainschedule = Trainschedule::findOrFail($id);

        return view('trschedule.trainschedule.show', compact('trainschedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $trainschedule = Trainschedule::findOrFail($id);

        return view('trschedule.trainschedule.edit', compact('trainschedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $trainschedule = Trainschedule::findOrFail($id);
        $trainschedule->update($requestData);

        return redirect('trschedule/trainschedule')->with('flash_message', 'Trainschedule updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Trainschedule::destroy($id);

        return redirect('trschedule/trainschedule')->with('flash_message', 'Trainschedule deleted!');
    }
}
