@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Trainschedule {{ $trainschedule->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/trschedule/trainschedule') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/trschedule/trainschedule/' . $trainschedule->id . '/edit') }}" title="Edit Trainschedule"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('trschedule/trainschedule' . '/' . $trainschedule->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Trainschedule" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $trainschedule->id }}</td>
                                    </tr>
                                    <tr><th> First Name </th><td> {{ $trainschedule->First_name }} </td></tr><tr><th> Surname </th><td> {{ $trainschedule->surname }} </td></tr><tr><th> Daysactive </th><td> {{ $trainschedule->Daysactive }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
