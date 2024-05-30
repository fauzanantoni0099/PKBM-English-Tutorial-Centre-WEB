@extends('home')
@can('index school-service-program')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">School Service Program</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            School Service Program
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
                        <form action="{{route('service.index')}}" method="get">
                            <div class="input-group">
                                <input
                                    name="query"
                                    type="search"
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
                    @can('input school-service-program')
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
                    <th>Tanggal</th>
                    <th>Petugas/CRE</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                    </thead>
                    <tbody>
                    @forelse($services as $service)
                        <tr>
                            <td>{{$loop->iteration +$startIndex}}</td>
                            <td>{{$service->date}}</td>
                            <td>{{$service->employee->name}}</td>
                            <td>{{$service->customer->name}}</td>
                            <td>{{$service->class}}</td>
                            <td>{{$service->description}}</td>
                            <td>
                                <div class="form-group">
                                    @can('edit school-service-program')
                                    <a href="" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal-{{$service->id}}"
                                       id="#myBtn" ><i class="feather icon-edit-2"></i></a>
                                    @endcan
                                    @can('delete school-service-program')
                                    <form action="{{route('service.destroy',$service)}}" method="POST" class="d-inline">
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
            </div>
        </div>
    </div>
{{--modal input--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('service.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Tanggal</label>
                            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror">
                            @error('date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
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
                        <div class="form-group col-md-4">
                            <label>Nama Kelas</label>
                            <input type="text" name="class" class="form-control @error('class') is-invalid @enderror">
                            @error('class')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Customer</label>
                            <table class="table tab-content">
                                @for($i=1; $i <= 1; $i++)
                                    <tr>
                                        <td>
                                            <select class="form-control" name="customer_id" id="customer_input_{{$i}}" onchange="setPrice(this)">
                                                <option value="">--Pilih--</option>
                                                @foreach($customers as $customer)
                                                    <option value="{{$customer->id}}"
                                                            data-gender="{{$customer->gender}}"
                                                            data-gender_id="{{$i}}"
                                                            data-birth_date="{{\Carbon\Carbon::parse($customer->birth_date)->isoFormat('D MMMM Y')}}"
                                                    >{{$customer->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td id="gender_customer_{{$i}}"></td>
                                        <td id="birth_date_customer_{{$i}}"></td>
                                    </tr>
                                @endfor
                            </table>
                        </div>
                        <div class="form-group col-md-12">
                            <textarea type="text" name="description" class="form-control" placeholder="Deskripsi"></textarea>
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
        @include('backend.services.edit')
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

