@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                       <div class="h4">
                           {{ __('Posts') }}
                       </div>

                        <a href="{{ route('dashboard.posts.create') }}" type="button" class="btn btn-success">{{ __('Create') }}</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">{{ __('Id') }}</th>
                                <th scope="col">{{ __('Title') }}</th>
                                <th scope="col">{{ __('Slug') }}</th>
                                <th scope="col">{{ __('Created At') }}</th>
                                <th scope="col">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th class="text-center" scope="row">{{ $post->id }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->slug }}</td>
                                    <td class="text-center">{{ $post->created_at }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('dashboard.posts.edit', $post->id) }}" type="button" class="btn btn-sm btn-warning">{{ __('Edit') }}</a>
                                        <button type="button" class="btn btn-sm btn-danger">{{ __('Delete') }}</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
