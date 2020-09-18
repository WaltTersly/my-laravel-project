<div class="form-group {{ $errors->has('Equipmentname') ? 'has-error' : ''}}">
    <label for="Equipmentname" class="control-label">{{ 'Equipmentname' }}</label>
    <input class="form-control" name="Equipmentname" type="text" id="Equipmentname" value="{{ isset($equipment->Equipmentname) ? $equipment->Equipmentname : ''}}" >
    {!! $errors->first('Equipmentname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('State_of_equipment') ? 'has-error' : ''}}">
    <label for="State_of_equipment" class="control-label">{{ 'State Of Equipment' }}</label>
    <select name="State_of_equipment" class="form-control" id="State_of_equipment" >
    @foreach ($equipment->equipmentstate() as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($equipment->State_of_equipment) && $equipment->State_of_equipment == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('State_of_equipment', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Equipment_location') ? 'has-error' : ''}}">
    <label for="Equipment_location" class="control-label">{{ 'Equipment Location' }}</label>
    <select name="Equipment_location" class="form-control" id="Equipment_location" >
    @foreach ($equipment->equipmentlocation() as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($equipment->Equipment_location) && $equipment->Equipment_location == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('Equipment_location', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Date_servicing') ? 'has-error' : ''}}">
    <label for="Date_servicing" class="control-label">{{ 'Date Servicing' }}</label>
    <input class="form-control" name="Date_servicing" type="date" id="Date_servicing" value="{{ isset($equipment->Date_servicing) ? $equipment->Date_servicing : ''}}" >
    {!! $errors->first('Date_servicing', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Date_replacing') ? 'has-error' : ''}}">
    <label for="Date_replacing" class="control-label">{{ 'Date Replacing' }}</label>
    <input class="form-control" name="Date_replacing" type="date" id="Date_replacing" value="{{ isset($equipment->Date_replacing) ? $equipment->Date_replacing : ''}}" >
    {!! $errors->first('Date_replacing', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('number_in_store') ? 'has-error' : ''}}">
    <label for="number_in_store" class="control-label">{{ 'Number In Store' }}</label>
    <input class="form-control" name="number_in_store" type="number" id="number_in_store" value="{{ isset($equipment->number_in_store) ? $equipment->number_in_store : ''}}" >
    {!! $errors->first('number_in_store', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Price') ? 'has-error' : ''}}">
    <label for="Price" class="control-label">{{ 'Price' }}</label>
    <input class="form-control" name="Price" type="number" id="Price" value="{{ isset($equipment->Price) ? $equipment->Price : ''}}" >
    {!! $errors->first('Price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('Type') ? 'has-error' : ''}}">
    <label for="Type" class="control-label">{{ 'Type' }}</label>
    <select name="Type" class="form-control" id="Type" >
    @foreach ($equipment->equipmenttype() as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($equipment->Type) && $equipment->Type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('Type', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
