@extends('home')
@can('index employee')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Karyawan</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Karyawan
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
                        <form action="{{ route('employee.index') }}" method="GET">
                            <div class="input-group">
                                <input
                                    type="search"
                                    name="query"
                                    class="form-control"
                                    placeholder="Search"
                                    aria-label="Search"
                                    aria-describedby="button-addon2"
                                    value="{{request('query')}}"
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
                    @can('input employee')
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
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Tanggal Masuk</th>
                    <th>No.Hp</th>
                    <th>Aksi</th>
                    </thead>
                    <tbody>
                    @forelse($employees as $employee)
                        <tr>
                            <td>{{$loop->iteration +$startIndex}}</td>
                            <td>{{$employee->name}}</td>
                            <td>{{$employee->position}}</td>
                            <td>{{\Carbon\Carbon::parse($employee->entered_date)->isoFormat('D MMM Y')}}</td>
                            <td>{{$employee->phone}}</td>
                            <td>
                                <div class="form-group">
                                    @can('edit employee')
                                    <a href="" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal-{{$employee->id}}"
                                       id="#myBtn" ><i class="feather icon-edit-2"></i></a>
                                    @endcan
                                    <a href="" class="btn btn-outline-secondary" data-toggle="modal" data-target="#showModal-{{$employee->id}}"
                                       id="#myBtn" ><i class="feather icon-eye"></i></a>
                                    @can('delete employee')
                                    <form action="{{route('employee.destroy',$employee)}}" method="POST" class="d-inline">
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
                <div class="card-footer">
                    {!!$employees->links()!!}
                </div>
            </div>

        </div>
    </div>
{{--modal input--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama">
                            @error('name')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Jenis Kelamin</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror" >
                                <option value="">--Jenis Kelamin--</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror" placeholder="Tanggal Lahir">
                            @error('birth_date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Agama</label>
                            <input type="text" name="religion" class="form-control @error('religion') is-invalid @enderror">
                            @error('religion')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Jabatan</label>
                            <input type="text" name="position" class="form-control @error('position') is-invalid @enderror" placeholder="Jabatan">
                            @error('position')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tanggal Masuk</label>
                            <input type="date" name="entered_date" class="form-control @error('entered_date') is-invalid @enderror" placeholder="Tanggal Masuk">
                            @error('entered_date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>No.Hp</label>
                            <input type="number" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="8xxxxxxx">
                            @error('phone')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Instagram</label>
                            <input type="text" name="sosmed" class="form-control @error('sosmed') is-invalid @enderror" placeholder="username">
                            @error('sosmed')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Upload Foto</label>
                            <input type="file" name="name_path" class="form-control @error('name_path') is-invalid @enderror">
                            @error('name_path')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label>Kata-kata Motivasi</label>
                            <textarea type="text" name="kata" class="form-control @error('kata') is-invalid @enderror" placeholder="Kata-kata Motivasi"></textarea>
                            @error('kata')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label>Alamat</label>
                            <textarea type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat"></textarea>
                            @error('address')
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
        @include('backend.employees.edit')
        @include('backend.employees.show')
@endsection
@endcan
