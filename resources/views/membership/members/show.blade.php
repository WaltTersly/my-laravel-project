@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Member {{ $member->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/membership/members') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/membership/members/' . $member->id . '/edit') }}" title="Edit Member"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('membership/members' . '/' . $member->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Member" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $member->id }}</td>
                                    </tr>
                                    <tr><th> First Name </th><td> {{ $member->first_name }} </td></tr><tr><th> Surname </th><td> {{ $member->surname }} </td></tr><tr><th> Idnumber </th><td> {{ $member->idnumber }} </td></tr><tr><th> Gender </th><td> {{ $member->gender }} </td></tr><tr><th> Address </th><td> {{ $member->address }} </td></tr><tr><th> Telephone </th><td> {{ $member->telephone }} </td></tr><tr><th> Registration_day </th><td> {{$member->registration_day }} </td></tr><tr><th> Mode of Payment </th><td> {{ $member->modeofpayment }} </td></tr><tr><th> Membership Type </th><td> {{$member->membership_type }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
