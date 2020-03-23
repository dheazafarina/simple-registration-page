@extends('welcome')

@section('judul_halaman', 'Registration')

@section('konten')
  <form action="/proses" method="post">
  {{ csrf_field() }}
    <div class="mt-3">
      <input type="text"
        name="phone"
        class="form-control"
        placeholder="Mobile number"
        value="{{ old('phone') }}"
        aria-describedby="basic-addon1">
        @if ($errors->has('phone'))
          <small class="form-text text-danger">{{ $errors->first('phone') }}</small>
        @endif
    </div>
    <div class="mt-3">
      <input type="text"
        name="first_name"
        class="form-control"
        placeholder="First name"
        value="{{ old('first_name') }}"
        aria-describedby="basic-addon1">
        @if ($errors->has('phone'))
          <small class="form-text text-danger">{{ $errors->first('first_name') }}</small>
        @endif
    </div>
    <div class="mt-3">
      <input type="text"
        name="last_name"
        class="form-control"
        placeholder="Last name"
        value="{{ old('last_name') }}"
        aria-describedby="basic-addon1">
        @if ($errors->has('phone'))
          <small class="form-text text-danger">{{ $errors->first('last_name') }}</small>
        @endif
    </div>
    <div class="mt-3">
      <p>Date of Birth</p>
      <div class="row">
        <div class="col-sm">
          <select class="custom-select" id="year">
            <option selected>Year</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
        <div class="col-sm">
          <select class="custom-select" id="month">
            <option selected>Month</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
        <div class="col-sm">
          <select class="custom-select" id="date">
            <option selected>Date</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-check form-check-inline mt-3">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="male" value="male">
      <label class="form-check-label" for="male">Male</label>
    </div>
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="female" value="female">
      <label class="form-check-label" for="female">Female</label>
    </div>
    <div class="mt-3 form-group">
      <input type="text"
        name="email"
        class="form-control"
        placeholder="Email"
        value="{{ old('email') }}"
        aria-describedby="basic-addon1">
        @if ($errors->has('phone'))
          <small class="form-text text-danger">{{ $errors->first('email') }}</small>
        @endif
    </div>
    <div class="mt-5">
      <input class="btn btn-primary btn-block" type="submit" value="Register">
    </div>
    <div class="mt-4">
      <button type="button" class="btn btn-success btn-block">Login</button>
    </div>
  </form>
@endsection