<?php

namespace App\Http\Controllers\Membership;

use illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Member;
use Illuminate\Http\Request;

class MembersController extends Controller
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
            $members = Member::where('first_name', 'LIKE', "%$keyword%")
                ->orWhere('surname', 'LIKE', "%$keyword%")
                ->orWhere('idnumber', 'LIKE', "%$keyword%")
                ->orWhere('gender', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('telephone', 'LIKE', "%$keyword%")
                ->orWhere('registration_day', 'LIKE', "%$keyword%")
                ->orWhere('modeofpayment', 'LIKE', "%$keyword%")
                ->orWhere('membership_type', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $members = Member::latest()->paginate($perPage);
        }

        return view('membership.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $member= new Member();
        return view('membership.members.create',compact('member'));
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
        
       // $requestData = $request->all();
        
       // Member::create($requestData);
       
       $member = new Member;

        $member->user_id = Auth::user()->id;

        $member->First_Name = $request->first_name;
        $member->Surname = $request->surname;
        $member->Idnumber = $request->idnumber;
        $member->Gender = $request->gender;
        $member->Address = $request->address;
        $member->Telephone = $request->telephone;
        $member->Registration_day = $request->registration_day;
        $member->Modeofpayment = $request->modeofpayment;
        $member->Membership_type = $request->membership_type;


        $member->save();

        return redirect('membership/members')->with('flash_message', 'Member added!');
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
        $member = Member::findOrFail($id);

        return view('membership.members.show', compact('member'));
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
        $member = Member::findOrFail($id);

        return view('membership.members.edit', compact('member'));
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
        
        $member = Member::findOrFail($id);
        $member->update($requestData);

        return redirect('membership/members')->with('flash_message', 'Member updated!');
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
        Member::destroy($id);

        return redirect('membership/members')->with('flash_message', 'Member deleted!');
    }
}
