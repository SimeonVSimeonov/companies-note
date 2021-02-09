@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-body">
                <form method="POST" action="{{ route('company.update', $company->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{$company->name}}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Company Group') }}</label>

                        <div class="col-md-6">
                            <input id="group" type="radio" class="form-control @error('name') is-invalid @enderror"
                                   name="group" value="{{null}}" required autocomplete="name" autofocus>
                            <label for="none">None</label><br>
                            @foreach($groups as$group)
                                @if($company->group_id === $group->id)
                                <input id="group" type="radio" class="form-control @error('name') is-invalid @enderror"
                                       name="group" value="{{$group->id}}" required autocomplete="name" autofocus
                                checked="">
                                <label for="{{$group->name}}">{{$group->name}}</label><br>
                                @else
                                    <input id="group" type="radio" class="form-control @error('name') is-invalid @enderror"
                                           name="group" value="{{$group->id}}" required autocomplete="name" autofocus>
                                    <label for="{{$group->name}}">{{$group->name}}</label><br>
                                @endif
                            @endforeach
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

