<?php

namespace App\Http\Controllers\Cashier;

use illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Cashier;
use Illuminate\Http\Request;

class CashiersController extends Controller
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
            $cashiers = Cashier::where('First_name', 'LIKE', "%$keyword%")
                ->orWhere('surname', 'LIKE', "%$keyword%")
                ->orWhere('username', 'LIKE', "%$keyword%")
                ->orWhere('Gender', 'LIKE', "%$keyword%")
                ->orWhere('Address', 'LIKE', "%$keyword%")
                ->orWhere('Telephone', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cashiers = Cashier::latest()->paginate($perPage);
        }

        return view('cashier.cashiers.index', compact('cashiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $cashier = new Cashier;
        return view('cashier.cashiers.create',compact('cashier'));
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
        
        $cashier = new Cashier;

        $cashier->user_id = Auth::user()->id;

        $cashier->First_Name = $request->First_name;
        $cashier->Surname = $request->surname;
        $cashier->Username = $request->username;
        $cashier->Gender = $request->Gender;
        $cashier->Address = $request->Address;
        $cashier->Telephone = $request->Telephone;
        
        $cashier->save();

        return redirect('cashier/cashiers')->with('flash_message', 'Cashier added!');
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
        $cashier = Cashier::findOrFail($id);

        return view('cashier.cashiers.show', compact('cashier'));
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
        $cashier = Cashier::findOrFail($id);

        return view('cashier.cashiers.edit', compact('cashier'));
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
        
        $cashier = Cashier::findOrFail($id);
        $cashier->update($requestData);

        return redirect('cashier/cashiers')->with('flash_message', 'Cashier updated!');
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
        Cashier::destroy($id);

        return redirect('cashier/cashiers')->with('flash_message', 'Cashier deleted!');
    }
}
