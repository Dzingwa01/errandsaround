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
                                <h3 class="mb-0">{{ __('Users') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Add user') }}</a>
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
                        <table id="users-table" class="table align-items-center table-flush" style="width: 100%!important;margin-bottom: 2em;">
                            <thead class="thead-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Surname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>System Role</th>
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
                    $('#users-table').DataTable({
                        processing: true,
                        serverSide: true,
                        paging: true,
                        responsive: true,
                        scrollX: 640,
                        ajax: '{{route('get-users')}}',
                        columns: [
                            {data: 'name', name: 'name'},
                            {data: 'surname', name: 'surname'},
                            {data: 'email', name: 'email'},
                            {data: 'contact_number', name: 'contact_number'},
                            {data:'roles[0].name',name:'roles[0].name'},
                            {data: 'action', name: 'action', orderable: false, searchable: false}
                        ]
                    });

                });

                function confirm_delete(obj){
                    var r = confirm("Are you sure want to delete this agent. They will no longer has access to the system!");
                    if (r == true) {
                        $.get('/user/delete/'+obj.id,function(data,status){
                            console.log('Data',data);
                            console.log('Status',status);
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