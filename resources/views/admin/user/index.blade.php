@extends('layouts.app')
@section('title', 'User List')
@section('style')
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">') }} ">
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">User List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <a name="" id="" class="btn btn-primary float-right" href="{{ route('admin.user.create') }}" role="button">Add New</a>

        </div>

        <div class="card-body">
            @if ($users->count()>0)
    
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sl. No.</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key=>$item)                        
                        <tr>
                            <th>{{ $key+1 }}</th>
                            <th>{{ $item->username }}</th>
                            <th>{{ $item->name }}</th>
                            <th>{{ $item->email }}</th>
                            <th>{{ $item->role->role_name }}</th>
                            <th>
                            <a href="{{ route('admin.user.edit',$item->id) }}" class="btn btn-primary">Edit</a>
                            <a href="{{ route('admin.user.destroy',$item->id) }}" class="btn btn-danger" onclick="return confirm('Do you want to delete this??')">Delete</a>
                            
                            </th>

                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sl. No.</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
                @else

                <h1 class="d-flex justify-content-center text-danger">No data found</h1>

                @endif
        </div>

    </div>
</div>
@endsection
@section('script')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js ')}}"></script>
    <script src="{{ asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js ')}}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/dataTables.buttons.min.js ')}}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js ')}}"></script>
    <script src="{{ asset('/plugins/jszip/jszip.min.js ')}}"></script>
    <script src="{{ asset('/plugins/pdfmake/pdfmake.min.js ')}}"></script>
    <script src="{{ asset('/plugins/pdfmake/vfs_fonts.js ')}}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/buttons.html5.min.js ')}}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/buttons.print.min.js ')}}"></script>
    <script src="{{ asset('/plugins/datatables-buttons/js/buttons.colVis.min.js ')}}"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true, 
                "autoWidth": false, 
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>
    @if(session('success'))
        <script>
           Swal.fire(
  'Good job!',
  '{{ session('success') }}',
  'success'
)
        </script>
        
    @endif
@endsection