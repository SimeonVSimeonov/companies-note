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

                    <div id="modal" class="modal fade" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Company Group Options</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row-sm-2 text-center">
                                        @if($company->group_id === null)
                                            <label for="none"><input id="group" type="radio"
                                                                     class="form-control @error('name') is-invalid @enderror"
                                                                     name="group_id" value="{{null}}" required autocomplete="name"
                                                                     autofocus checked>None</label>
                                        @else
                                            <label for="none"><input id="group" type="radio"
                                                                     class="form-control @error('name') is-invalid @enderror"
                                                                     name="group_id" value="{{null}}" required autocomplete="name"
                                                                     autofocus>None</label>
                                        @endif
                                        @foreach($groups as$group)
                                            @if($company->group_id === $group->id)
                                                <label for="{{$group->name}}"><input id="group" type="radio"
                                                                                     class="form-control @error('name') is-invalid @enderror"
                                                                                     name="group_id" value="{{$group->id}}" required
                                                                                     autocomplete="name" autofocus
                                                                                     checked="">{{$group->name}}</label>
                                            @else
                                                <label for="{{$group->name}}"><input id="group" type="radio"
                                                                                     class="form-control @error('name') is-invalid @enderror"
                                                                                     name="group_id" value="{{$group->id}}" required
                                                                                     autocomplete="name" autofocus>{{$group->name}}
                                                </label>
                                            @endif
                                        @endforeach
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Save changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name"
                               class="col-md-4 col-form-label text-md-right">{{ __('Company Group Options') }}</label>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
                                Show Groups
                            </button>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name"
                               class="col-md-4 col-form-label text-md-right">{{ __('Company Group Selected') }}</label>
                        <div id="selectedGroup" class="col-md-6">

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
    <script  type="application/javascript">
        window.onload = function() {
            if (window.jQuery) {
                let l = $('input[name="group_id"]:checked').closest('label').text();
                $('#selectedGroup').append(`<strong>${l}</strong>`)

                $('#modal').on('hidden.bs.modal', function (e) {
                    $('#selectedGroup').empty();
                    let l = $('input[name="group_id"]:checked').closest('label').text();
                    $('#selectedGroup').append(`<strong>${l}</strong>`)
                })
            }
        }
    </script>
@endsection

