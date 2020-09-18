<div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''}}">
    <label for="first_name" class="control-label">{{ 'First Name' }}</label>
    <input class="form-control" name="first_name" type="text" id="first_name" value="{{ isset($member->first_name) ? $member->first_name : ''}}" >
    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
    <label for="surname" class="control-label">{{ 'Surname' }}</label>
    <input class="form-control" name="surname" type="text" id="surname" value="{{ isset($member->surname) ? $member->surname : ''}}" >
    {!! $errors->first('surname', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('idnumber') ? 'has-error' : ''}}">
    <label for="idnumber" class="control-label">{{ 'Idnumber' }}</label>
    <input class="form-control" name="idnumber" type="number" id="idnumber" value="{{ isset($member->idnumber) ? $member->idnumber : ''}}" >
    {!! $errors->first('idnumber', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
    <label for="gender" class="control-label">{{ 'Gender' }}</label>
    <select name="gender" class="form-control" id="gender" >
    @foreach ($member->membergender() as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($member->gender) && $member->gender == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ isset($member->address) ? $member->address : ''}}" >
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''}}">
    <label for="telephone" class="control-label">{{ 'Telephone' }}</label>
    <input class="form-control" name="telephone" type="number" id="telephone" value="{{ isset($member->telephone) ? $member->telephone : ''}}" >
    {!! $errors->first('telephone', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('registration_day') ? 'has-error' : ''}}">
    <label for="registration_day" class="control-label">{{ 'Registration Day' }}</label>
    <input class="form-control" name="registration_day" type="date" id="registration_day" value="{{ isset($member->registration_day) ? $member->registration_day : ''}}" >
    {!! $errors->first('registration_day', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('modeofpayment') ? 'has-error' : ''}}">
    <label for="modeofpayment" class="control-label">{{ 'Modeofpayment' }}</label>
    <select name="modeofpayment" class="form-control" id="modeofpayment" >
    @foreach ($member->modepayment() as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($member->modeofpayment) && $member->modeofpayment == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('modeofpayment', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('membership_type') ? 'has-error' : ''}}">
    <label for="membership_type" class="control-label">{{ 'Membership Type' }}</label>
    <select name="membership_type" class="form-control" id="membership_type" >
    @foreach ($member->membertype() as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($member->membership_type) && $member->membership_type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('membership_type', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
