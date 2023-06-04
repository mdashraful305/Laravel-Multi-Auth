@extends('layouts.app')
@section('title', 'Admin Profile')
@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">') }} ">
<style>
#upload {
    opacity: 0;
}

#upload-label {
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);
}

.image-area {
    border: 2px dashed rgba(122, 122, 122, 0.7);
    padding: 1rem;
    position: relative;
}

.image-area::before {
    content: 'Uploaded image result';
    color: #838383;
    font-weight: bold;
    text-transform: uppercase;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 0.8rem;
    z-index: 1;
}

.image-area img {
    z-index: 2;
    position: relative;
}



</style>
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Admin Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<!-- Main content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-md-3">

            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset(Auth::user()->image) }}"
                            alt="User profile picture">
                    </div>
                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
                    <p class="text-muted text-center">{{ $user->email }}</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Role</b> <a class="float-right">{{ $user->role->role_name }}</a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

        <div class="col-md-9">

            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        {{-- <li class="nav-item"><a class="nav-link active" href="#info" data-toggle="tab">User Info</a>
                        </li> --}}
                        <li class="nav-item"><a class="nav-link active" href="#profile" data-toggle="tab">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Pricacy</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        {{-- <div class="active tab-pane" id="info">



                        </div> --}}

                        <div class="tab-pane active" id="profile">
                            <form method="POST" action="{{ route('admin.profile.update' ,$user->id ) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="container py-5">

                                    <!-- For demo purpose -->
                                    <header class="text-dark text-center">
                                            <!-- Uploaded image area-->
                                            <p class="font-italic text-dark text-center">The image uploaded will be rendered inside the box below.</p>
                                            <div class="image-area mt-4"><img id="imageResult" class="img-fluid rounded shadow-sm mx-auto d-block" width="250px"></div>
                                    </header>

                                    <div class="row py-4">
                                        <div class="col-lg-6 mx-auto">
                                            <!-- Upload image input-->
                                            <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                                <input id="upload" type="file" onchange="readURL(this)" class="form-control"  name="image">
                                                <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                                                <div class="input-group-append">
                                                    <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i class="fa fa-cloud-upload mr-2 text-muted"></i><small class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary float-right">Upload</button>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal" method="POST" action="{{ route('admin.user.update' ,$user->id ) }}">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Name <span class="text-red">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ $user->username }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $user->email }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Password </label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Password </label>
                                    <div class="col-sm-10">
                                        <input id="password" type="password" class="form-control" name="password_confirmation" placeholder="Re-type Password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection
@section('script')
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error('{{ $error }}')
        </script>
    @endforeach

@endif
@if (session('success'))
    <script>
        toastr.success('{{ session('success') }}')
    </script>
@endif
<script>

/*  ==========================================
    SHOW UPLOADED IMAGE
* ========================================== */
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function () {
    $('#upload').on('change', function () {
        readURL(input);
    });
});

/*  ==========================================
    SHOW UPLOADED IMAGE NAME
* ========================================== */
var input = document.getElementById( 'upload' );
var infoArea = document.getElementById( 'upload-label' );

input.addEventListener( 'change', showFileName );
function showFileName( event ) {
  var input = event.srcElement;
  var fileName = input.files[0].name;
  infoArea.textContent = 'File name: ' + fileName;
}

</script>
@endsection
