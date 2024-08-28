{{ $notification->name }}

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        id:{{ $notification->id }} {{ __('Notification') }} <b>{{ $notification->name }}</b>
                    </div>
                    <div>
                        {{ $notification->created_at }}
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tbody>

                        @foreach($notification->payload as $key => $value)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $value }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
