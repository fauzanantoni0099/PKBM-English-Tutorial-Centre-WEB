@extends('home')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Corporate</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Corporate
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
                        <form>
                            <div class="input-group">
                                <input
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                            id="#myBtn">
                        Input <li class="fa fa-cloud-upload"></li>
                    </button>
                </div>
            </div>
            <div class="card-body col-md-12">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Petugas/CRE</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Program</th>
                    <th>Kepala</th>
                    <th>Aksi</th>
                    </thead>
                    <tbody>
                    @forelse($corporates as $corporate)
                        <tr>
                            <td>{{$loop->iteration +$startIndex}}</td>
                            <td>{{\Carbon\Carbon::parse($corporate->date)->isoFormat('D MMM Y')}}</td>
                            <td>{{$corporate->employee->name}}</td>
                            <td>{{$corporate->customer->name}}</td>
                            <td>{{$corporate->customer->gender}}</td>
                            <td>{{\Carbon\Carbon::parse($corporate->customer->birth_date)->isoFormat('D MMMM Y')}}</td>
                            <td>{{$corporate->program_name}}</td>
                            <td>{{$corporate->program_head}}</td>
                            <td>
                                <div class="form-group">
                                    <a href="" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal-{{$corporate->id}}"
                                       id="#myBtn" ><i class="feather icon-edit-2"></i></a>
                                    <form action="{{route('corporate.destroy',$corporate)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"><i class="feather icon-trash"></i></button>
                                    </form>
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
                {!!$corporates->links()!!}
            </div>
        </div>
    </div>
{{--modal input--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Corporate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('corporate.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Tanggal Masuk : </label>
                            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror">
                            @error('date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
                            <label>Nama Corporate : </label>
                            <input type="text" name="program_name" class="form-control @error('program_name') is-invalid @enderror">
                            @error('program_name')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Kepala Corporate : </label>
                            <input type="text" name="program_head" class="form-control @error('program_head') is-invalid @enderror" >
                            @error('program_head')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Customer</label>
                            <table class="table tab-content">
                                <thead>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Sekolah/Pekerjaan</th>
                                <th>Alamat</th>
                                <th>No.Hp</th>
                                </thead>
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
                                                            data-school="{{$customer->school}}"
                                                            data-address="{{$customer->address}}"
                                                            data-phone="{{$customer->phone}}"
                                                    >{{$customer->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td id="gender_customer_{{$i}}"></td>
                                        <td id="birth_date_customer_{{$i}}"></td>
                                        <td id="school_customer_{{$i}}"></td>
                                        <td id="address_customer_{{$i}}"></td>
                                        <td id="phone_customer_{{$i}}"></td>
                                    </tr>
                                @endfor
                            </table>
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
        @include('backend.corporates.edit')
{{--        @include('backend.corporates.show')--}}
@endsection
@section('js')
    <script>
        function setPrice(i)
        {
            var gender = $(i).find(':selected').data('gender');
            var rowId = $(i).find(':selected').data('gender_id');
            var birth_date = $(i).find(':selected').data('birth_date');
            var school = $(i).find(':selected').data('school');
            var address = $(i).find(':selected').data('address');
            var phone = $(i).find(':selected').data('phone');
            $('#gender_customer_'+rowId).text(gender);
            $('#birth_date_customer_'+rowId).text(birth_date);
            $('#school_customer_'+rowId).text(school);
            $('#address_customer_'+rowId).text(address);
            $('#phone_customer_'+rowId).text(phone);
        }
    </script>
@endsection

