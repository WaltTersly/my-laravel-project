<?php

namespace App\Http\Controllers\Training;

use illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Trainer;
use Illuminate\Http\Request;

class TrainersController extends Controller
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
            $trainers = Trainer::where('First_name', 'LIKE', "%$keyword%")
                ->orWhere('surname', 'LIKE', "%$keyword%")
                ->orWhere('Gender', 'LIKE', "%$keyword%")
                ->orWhere('Address', 'LIKE', "%$keyword%")
                ->orWhere('Telephone', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $trainers = Trainer::latest()->paginate($perPage);
        }

        return view('training.trainers.index', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $trainer = new Trainer;
        return view('training.trainers.create', compact('trainer'));
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
        $trainer = new Trainer;

        $trainer->user_id = Auth::user()->id;

        $trainer->First_Name = $request->First_name;
        $trainer->Surname = $request->surname;
        $trainer->Gender = $request->Gender;
        $trainer->Address = $request->Address;
        $trainer->Telephone = $request->Telephone;


        $trainer->save();

        //Session::flash('success', 'Your complain was sent to the operator, please wait for feedback.');

        //return redirect::back();
        
       // $requestData = $request->all();

       // $post = Trainer::create(['user_id' => Auth::user()->id]);
        
        //Trainer::create($requestData, ['user_id' => Auth::user()->id]);
        //$trainer = Trainer::create(['user_id' => Auth::user()->id]);

        return redirect('training/trainers')->with('flash_message', 'Trainer added!');
        
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
        $trainer = Trainer::findOrFail($id);

        return view('training.trainers.show', compact('trainer'));
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
        $trainer = Trainer::findOrFail($id);

        return view('training.trainers.edit', compact('trainer'));
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
        
        $trainer = Trainer::findOrFail($id);
        $trainer->update($requestData);

        return redirect('training/trainers')->with('flash_message', 'Trainer updated!');
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
        Trainer::destroy($id);

        return redirect('training/trainers')->with('flash_message', 'Trainer deleted!');
    }
}
