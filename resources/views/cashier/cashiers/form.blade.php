<div class="form-group {{ $errors->has('First_name') ? 'has-error' : ''}}">
    <label for="First_name" class="control-label">{{ 'First Name' }}</label>
    <input class="form-control" name="First_name" type="text" id="First_name" value="{{ isset($cashier->First_name) ? $cashier->First_name : ''}}" >
    {!! $errors->first('First_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
    <label for="surname" class="control-label">{{ 'Surname' }}</label>
    <input class="form-control" name="surname" type="text" id="surname" value="{{ isset($cashier->surname) ? $cashier->surname : ''}}" >
    {!! $errors->first('surname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
    <label for="username" class="control-label">{{ 'Username' }}</label>
    <input class="form-control" name="username" type="text" id="username" value="{{ isset($cashier->username) ? $cashier->username : ''}}" >
    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Gender') ? 'has-error' : ''}}">
    <label for="Gender" class="control-label">{{ 'Gender' }}</label>
    <select name="Gender" class="form-control" id="Gender" >
    @foreach ($cashier->cashiergender() as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($cashier->Gender) && $cashier->Gender == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
    </select>
    {!! $errors->first('Gender', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Address') ? 'has-error' : ''}}">
    <label for="Address" class="control-label">{{ 'Address' }}</label>
    <input class="form-control" name="Address" type="text" id="Address" value="{{ isset($cashier->Address) ? $cashier->Address : ''}}" >
    {!! $errors->first('Address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Telephone') ? 'has-error' : ''}}">
    <label for="Telephone" class="control-label">{{ 'Telephone' }}</label>
    <input class="form-control" name="Telephone" type="number" id="Telephone" value="{{ isset($cashier->Telephone) ? $cashier->Telephone : ''}}" >
    {!! $errors->first('Telephone', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
