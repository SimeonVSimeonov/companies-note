@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header">{{ __('Dashboard All Companies') }}</div>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <td >Company</td>
                                    <td >Category</td>
                                    <td >Added</td>
                                    <td >Edit</td>
                                    <td >Delete</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($companies as $company)
                                    <tr>
                                        <td>{{$company['name']}}</td>
                                        @if($company->group->name ?? '')
                                            <td >{{$company->group->name}}</td>
                                        @else
                                            <td >NO Group</td>
                                        @endif
                                        <td>{{$company['created_at']}}</td>
                                        <td><a href="{{route('company.edit', $company['id'])}}" >Edit</a></td>
                                        <td><form action="{{ route('company.destroy', $company->id) }}" method="POST"
                                                  id="company-destroy-{{ $company->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class='sm-12 text-center'>
                                <a class="float-right" href="{{route('group.create')}}" >Add Group</a>
                                <a class="float-left" href="{{route('company.create')}}" >Add Company</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
