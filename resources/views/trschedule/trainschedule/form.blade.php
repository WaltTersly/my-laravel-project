<div class="form-group {{ $errors->has('First_name') ? 'has-error' : ''}}">
    <label for="First_name" class="control-label">{{ 'First Name' }}</label>
    <input class="form-control" name="First_name" type="text" id="First_name" value="{{ isset($trainschedule->First_name) ? $trainschedule->First_name : ''}}" >
    {!! $errors->first('First_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
    <label for="surname" class="control-label">{{ 'Surname' }}</label>
    <input class="form-control" name="surname" type="text" id="surname" value="{{ isset($trainschedule->surname) ? $trainschedule->surname : ''}}" >
    {!! $errors->first('surname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Daysactive') ? 'has-error' : ''}}">
    <label for="Daysactive" class="control-label">{{ 'Daysactive' }}</label>
    <input class="form-control" name="Daysactive" type="number" id="Daysactive" value="{{ isset($trainschedule->Daysactive) ? $trainschedule->Daysactive : ''}}" >
    {!! $errors->first('Daysactive', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Time_in') ? 'has-error' : ''}}">
    <label for="Time_in" class="control-label">{{ 'Time In' }}</label>
    <input class="form-control" name="Time_in" type="time" id="Time_in" value="{{ isset($trainschedule->Time_in) ? $trainschedule->Time_in : ''}}" >
    {!! $errors->first('Time_in', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Time_out') ? 'has-error' : ''}}">
    <label for="Time_out" class="control-label">{{ 'Time Out' }}</label>
    <input class="form-control" name="Time_out" type="time" id="Time_out" value="{{ isset($trainschedule->Time_out) ? $trainschedule->Time_out : ''}}" >
    {!! $errors->first('Time_out', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Day1') ? 'has-error' : ''}}">
    <label for="Day1" class="control-label">{{ 'Day1' }}</label>
    <input class="form-control" name="Day1" type="date" id="Day1" value="{{ isset($trainschedule->Day1) ? $trainschedule->Day1 : ''}}" >
    {!! $errors->first('Day1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Day2') ? 'has-error' : ''}}">
    <label for="Day2" class="control-label">{{ 'Day2' }}</label>
    <input class="form-control" name="Day2" type="date" id="Day2" value="{{ isset($trainschedule->Day2) ? $trainschedule->Day2 : ''}}" >
    {!! $errors->first('Day2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Day3') ? 'has-error' : ''}}">
    <label for="Day3" class="control-label">{{ 'Day3' }}</label>
    <input class="form-control" name="Day3" type="date" id="Day3" value="{{ isset($trainschedule->Day3) ? $trainschedule->Day3 : ''}}" >
    {!! $errors->first('Day3', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Day4') ? 'has-error' : ''}}">
    <label for="Day4" class="control-label">{{ 'Day4' }}</label>
    <input class="form-control" name="Day4" type="date" id="Day4" value="{{ isset($trainschedule->Day4) ? $trainschedule->Day4 : ''}}" >
    {!! $errors->first('Day4', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Daysoffweekly') ? 'has-error' : ''}}">
    <label for="Daysoffweekly" class="control-label">{{ 'Daysoffweekly' }}</label>
    <input class="form-control" name="Daysoffweekly" type="number" id="Daysoffweekly" value="{{ isset($trainschedule->Daysoffweekly) ? $trainschedule->Daysoffweekly : ''}}" >
    {!! $errors->first('Daysoffweekly', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Day_off_1') ? 'has-error' : ''}}">
    <label for="Day_off_1" class="control-label">{{ 'Day Off 1' }}</label>
    <input class="form-control" name="Day_off_1" type="date" id="Day_off_1" value="{{ isset($trainschedule->Day_off_1) ? $trainschedule->Day_off_1 : ''}}" >
    {!! $errors->first('Day_off_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Day_off_2') ? 'has-error' : ''}}">
    <label for="Day_off_2" class="control-label">{{ 'Day Off 2' }}</label>
    <input class="form-control" name="Day_off_2" type="date" id="Day_off_2" value="{{ isset($trainschedule->Day_off_2) ? $trainschedule->Day_off_2 : ''}}" >
    {!! $errors->first('Day_off_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Day_off_3') ? 'has-error' : ''}}">
    <label for="Day_off_3" class="control-label">{{ 'Day Off 3' }}</label>
    <input class="form-control" name="Day_off_3" type="date" id="Day_off_3" value="{{ isset($trainschedule->Day_off_3) ? $trainschedule->Day_off_3 : ''}}" >
    {!! $errors->first('Day_off_3', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
