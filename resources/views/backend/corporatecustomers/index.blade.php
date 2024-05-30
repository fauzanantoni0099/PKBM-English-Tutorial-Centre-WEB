@extends('home')
@can('index student-corporate')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Siswa Corporate</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Siswa Corporate
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <li class="list-inline-item">
                    <div class="searchbar">
                        <form action="{{ route('corporatecustomer.index') }}" method="GET">
                            <div class="input-group">
                                <input
                                    name="query"
                                    type="search"
                                    class="form-control"
                                    placeholder="Search"
                                    aria-label="Search"
                                    aria-describedby="button-addon2"
                                />
                                <div class="input-group-append">
                                    <button
                                        class="btn btn-outline-secondary"
                                        type="submit"
                                        id="button-addon2"
                                    >
                                        <li class="fa fa-search"></li>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>
                <div class="float-right">
                    @can('input student-corporate')
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                            id="#myBtn">
                        Input <li class="fa fa-cloud-upload"></li>
                    </button>
                    @endcan
                </div>
            </div>
            <div class="card-body col-md-12">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <th>No.</th>
                    <th>Petugas/CRE</th>
                    <th>Corporate</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>No.hp</th>
                    <th>Aksi</th>
                    </thead>
                    <tbody>
                    @forelse($corporatecustomers as $corporatecustomer)
                        <tr>
                            <td>{{$loop->iteration +$startIndex}}</td>
                            <td>{{$corporatecustomer->employee->name}}</td>
                            <td>{{$corporatecustomer->corporate->program_name}}</td>
                            <td>{{$corporatecustomer->name}}</td>
                            <td>{{$corporatecustomer->birth_date}}</td>
                            <td>{{$corporatecustomer->phone}}</td>
                            <td>
                                <div class="form-group">
                                    @can('edit student-coporate')
                                    <a href="" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal-{{$corporatecustomer->id}}"
                                       id="#myBtn" ><i class="feather icon-edit-2"></i></a>
                                    @endcan
                                    @can('index student-corporate')
                                    <a href="" class="btn btn-outline-secondary" data-toggle="modal" data-target="#showModal-{{$corporatecustomer->id}}"
                                       id="#myBtn" ><i class="feather icon-eye"></i></a>
                                        @endcan
                                        @can('delete student-corporate')
                                    <form action="{{route('corporatecustomer.destroy',$corporatecustomer)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"><i class="feather icon-trash"></i></button>
                                    </form>
                                        @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">Data Tidak Ada!!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {!!$corporatecustomers->links()!!}
            </div>
        </div>
    </div>
{{--modal input--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa Corporate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('corporatecustomer.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Petugas/CRE : </label>
                            <select name="employee_id" class="form-control @error('employee_id') is-invalid @enderror" >
                                <option value="">--Pilih Petugas--</option>
                                @foreach($employees as $employee)
                                    <option value="{{$employee->id}}">{{$employee->name}}</option>
                                @endforeach
                            </select>
                            @error('employee_id')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Petugas/CRE : </label>
                            <select name="corporate_id" class="form-control @error('employee_id') is-invalid @enderror" >
                                <option value="">--Pilih Corporate--</option>
                                @foreach($corporates as $corporate)
                                    <option value="{{$corporate->id}}">{{$corporate->program_name}}</option>
                                @endforeach
                            </select>
                            @error('corporate_id')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <center>
                            <label style="font-weight: bold;font-size: x-large">Customer</label>
                            </center>
                            <table class="table tab-content">
                                    <tr>
                                        <td>
                                            <label>Nama : </label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" >
                                            @error('name')
                                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                                            @enderror
                                        </td>
                                        <td>
                                            <label>Jenis Kelamin : </label>
                                            <select name="gender" class="form-control @error('gender') is-invalid @enderror" >
                                                <option value="">--Pilih--</option>
                                                <option value="laki-laki">Laki-laki</option>
                                                <option value="perempuan">Perempuan</option>
                                            </select>
                                            @error('gender')
                                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                                            @enderror
                                        </td>
                                        <td>
                                            <label>Tanggal Lahir : </label>
                                            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" >
                                            @error('date')
                                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                                            @enderror
                                        </td>
                                        <td>
                                            <label>No.Hp : </label>
                                            <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" >
                                            @error('phone')
                                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                                            @enderror
                                        </td>
                                    </tr>
                            </table>
                            <label>Alamat : </label>
                            <textarea type="text" name="name" class="form-control @error('name') is-invalid @enderror" ></textarea>
                            @error('name')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-outline-primary">Simpan</button>
                </div>
                </div>
                </form>
            </div>
        </div>
    </div>
{{--        @include('backend.corporatecustomers.edit')--}}
{{--        @include('backend.corporatecustomers.show')--}}
@endsection
@section('js')
    <script>
        function setPrice(i)
        {
            var gender = $(i).find(':selected').data('gender');
            var rowId = $(i).find(':selected').data('gender_id');;
            var birth_date = $(i).find(':selected').data('birth_date');;
            $('#gender_customer_'+rowId).text(gender);
            $('#birth_date_customer_'+rowId).text(birth_date);
        }
    </script>
@endsection
@endcan

