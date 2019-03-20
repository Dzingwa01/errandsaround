@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Services') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('service.create') }}" class="btn btn-sm btn-primary">{{ __('Add Service') }}</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="table-responsive" style="padding:2em;">
                        <table id="roles-table" class="table align-items-center table-flush" style="width: 100%!important;margin-bottom: 2em;">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
            @push('custom-scripts')
            <script>
                $(document).ready(function(){
                    $('#roles-table').DataTable({
                        processing: true,
                        serverSide: true,
                        paging: true,
                        responsive: true,
                        scrollX: 640,
                        ajax: '{{route('get-services')}}',
                        columns: [
                            {data: 'service_name', name: 'service_name'},
                            {data: 'service_description', name: 'service_description'},
                            {data: 'price', name: 'price'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                    });

                });

                function confirm_delete(obj){
                    var r = confirm("Are you sure want to delete this agent. They will no longer has access to the system!");
                    if (r == true) {
                        $.get('/service/delete/'+obj.id,function(data,status){

                            if(status=='success'){
                                alert(data.message);
                                window.location.reload();
                            }

                        });
                    } else {
                        alert('Delete action cancelled');
                    }
                }
            </script>
            @endpush
        @include('layouts.footers.auth')
    </div>
@endsection