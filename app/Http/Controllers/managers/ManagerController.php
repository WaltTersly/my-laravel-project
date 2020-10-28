<?php

namespace App\Http\Controllers\managers;

use illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Manager;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $manager = Manager::where('First_name', 'LIKE', "%$keyword%")
                ->orWhere('First_name', 'LIKE', "%$keyword%")
                ->orWhere('surname', 'LIKE', "%$keyword%")
                ->orWhere('ID_No', 'LIKE', "%$keyword%")
                ->orWhere('Gender', 'LIKE', "%$keyword%")
                ->orWhere('Address', 'LIKE', "%$keyword%")
                ->orWhere('Telephone', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $manager = Manager::latest()->paginate($perPage);
        }

        return view('managers.manager.index', compact('manager'));


        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $manager= new Manager();
        return view('managers.manager.create',compact('manager'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $manager = new Manager;

        $manager->user_id = Auth::user()->id;

        $manager->First_Name = $request->First_name;
        $manager->Surname = $request->surname;
        $manager->Idnumber = $request->ID_No;
        $manager->Gender = $request->Gender;
        $manager->Address = $request->Address;
        $manager->Telephone = $request->Telephone;
    


        $manager->save();

        return redirect('managers/manager')->with('flash_message', 'Manager added successfully!');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $manager = Manager::findOrFail($id);

        return view('managers.manager.show', compact('manager'));

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manager = Manager::findOrFail($id);

        return view('managers.manager.edit', compact('manager'));

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        
        $manager = Manager::findOrFail($id);
        $manager->update($requestData);

        return redirect('managers/manager')->with('flash_message', 'Manager updated!');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Manager::destroy($id);

        return redirect('managers/manager')->with('flash_message', 'Manager deleted!');

        //
    }
}
