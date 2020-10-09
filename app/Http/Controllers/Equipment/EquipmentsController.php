<?php

namespace App\Http\Controllers\Equipment;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Equipment;
use App\Charts\EquipmentLocationChart;
use Illuminate\Http\Request;

class EquipmentsController extends Controller
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
            $equipments = Equipment::where('Equipmentname', 'LIKE', "%$keyword%")
                ->orWhere('State_of_equipment', 'LIKE', "%$keyword%")
                ->orWhere('Equipment_location', 'LIKE', "%$keyword%")
                ->orWhere('Date_servicing', 'LIKE', "%$keyword%")
                ->orWhere('Date_replacing', 'LIKE', "%$keyword%")
                ->orWhere('number_in_store', 'LIKE', "%$keyword%")
                ->orWhere('Price', 'LIKE', "%$keyword%")
                ->orWhere('Type', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $equipments = Equipment::latest()->paginate($perPage);
        }

        return view('equipment.equipments.index', compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $equipment= new Equipment();
        return view('equipment.equipments.create', compact('equipment'));
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
        
        Equipment::create($requestData);

        return redirect('equipment/equipments')->with('flash_message', 'Equipment added!');
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
        $equipment = Equipment::findOrFail($id);

        return view('equipment.equipments.show', compact('equipment'));
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
        $equipment = Equipment::findOrFail($id);

        return view('equipment.equipments.edit', compact('equipment'));
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
        
        $equipment = Equipment::findOrFail($id);
        $equipment->update($requestData);

        return redirect('equipment/equipments')->with('flash_message', 'Equipment updated!');
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
        Equipment::destroy($id);

        return redirect('equipment/equipments')->with('flash_message', 'Equipment deleted!');
    }

    public function EquipsCharts()
    {
        //setting up data to be passed to the chart via eloquent
        $data = Equipment::all()
        ->groupBy('Equipment_location')
        ->map(function($item){
            //return number of equipments in differnt location of the gym
            return count($item);
        });

        $chart = new EquipmentLocationChart;
        $chart-> labels($data->keys());
        $chart->dataset('Equipments in ', 'bar', $data->values());


        return view('/equipmentchart',['chart' => $chart]);
    }
}
