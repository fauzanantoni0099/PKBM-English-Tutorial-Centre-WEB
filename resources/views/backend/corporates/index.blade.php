@extends('home')
@can('index corporate')
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
                    @can('input corporate')
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
                    <th>Nama</th>
                    <th>Ketua</th>
                    <th>Logo</th>
                    <th>MOU</th>
                    <th>Laporan</th>
                    <th>Aksi</th>
                    </thead>
                    <tbody>
                    @forelse($corporates as $corporate)
                        <tr>
                            <td>{{$loop->iteration +$startIndex}}</td>
                            <td>{{\Carbon\Carbon::parse($corporate->date)->isoFormat('D MMM Y')}}</td>
                            <td>{{$corporate->employee->name}}</td>
                            <td>{{$corporate->program_name}}</td>
                            <td>{{$corporate->program_head}}</td>
                            <td>
                                <a href="/{{$corporate->logo}}"><img src="/{{$corporate->logo}}" alt="" style="width: 100px"></a>
                            </td>
                            <td>    <a href="{{ asset($corporate->mou) }}" target="_blank"><img src="/assets/images/pdf.png" style="width: 50px"></a></td>
                            <td>
                                @forelse($corporate->images as $image)
                                    <a href="/{{$image->name_path}}" target="_blank"><img src="/assets/images/pdf.png" style="width: 50px"></a>
                                @empty
                                    <img src="/assets/images/file kosong.png" class="card-img h-100" alt="Card image" style="width: 50px">
                                @endforelse
                            </td>
                            <td>
                                <div class="form-group">
                                    @can('edit corporate')
                                    <a href="" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal-{{$corporate->id}}"
                                       id="#myBtn" ><i class="feather icon-edit-2"></i></a>
                                    @endcan
                                    @can('delete corporate')
                                    <form action="{{route('corporate.destroy',$corporate)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"><i class="feather icon-trash"></i></button>
                                    </form>
                                    @endcan
                                        @can('edit corporate')
                                    <a href="" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal-{{$corporate->id}}"
                                       id="#myBtn">Report</a>
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
                        <div class="form-group col-md-3">
                            <label>Logo : </label>
                            <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" >
                            @error('logo')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>MOU : </label>
                            <input type="file" name="mou" class="form-control @error('mou') is-invalid @enderror" >
                            @error('mou')
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
{{--        @include('backend.corporates.edit')--}}
{{--        @include('backend.corporates.show')--}}
        @include('backend.corporates.report')
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
@endcan

