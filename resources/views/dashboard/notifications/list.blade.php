@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="h4">
                            {{ __('Notifications') }}
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">{{ __('Id') }}</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Status') }}</th>
                                <th scope="col">{{ __('Created At') }}</th>
                                <th scope="col">{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($notifications as $item)
                                <tr>
                                    <th class="text-center" scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('dashboard.notifications.show', $item->id) }}" type="button"
                                           class="btn btn-sm btn-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                            </svg>
                                            {{ __('Show') }}
                                        </a>
                                        <a href="{{ route('dashboard.notifications.destroy', $item->id) }}" type="button"
                                           class="btn btn-sm btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                            </svg>
                                            {{ __('Delete') }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{ $notifications->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

