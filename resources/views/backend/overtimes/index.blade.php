@extends('home')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Overtime</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Overtime
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
                        Input
                        <li class="fa fa-cloud-upload"></li>
                    </button>
                </div>
            </div>
            <div class="card-body col-md-12">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Petugas/CRE</th>
                    <th>Mulai</th>
                    <th>Berhenti</th>
                    <th>Total/Jam</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                    </thead>
                    <tbody>
                    @forelse($overtimes as $overtime)
                        <tr>
                            <td>{{$loop->iteration +$startIndex}}</td>
                            <td>{{\Carbon\Carbon::parse($overtime->date)->isoFormat('D MMM Y')}}</td>
                            <td>{{$overtime->employee->name}}</td>
                            <td>{{\Carbon\Carbon::parse($overtime->start)->isoFormat('HH:mm:ss')}}</td>
                            <td>{{\Carbon\Carbon::parse($overtime->stop)->isoFormat('HH:mm:ss')}}</td>
                            <td>{{$overtime->total}}</td>
                            <td>{{$overtime->description}}</td>
                            <td>
                                <div class="form-group">
                                    <a href="" class="btn btn-outline-warning" data-toggle="modal"
                                       data-target="#exampleModal-{{$overtime->id}}"
                                       id="#myBtn"><i class="feather icon-edit-2"></i></a>
                                    <form action="{{route('overtime.destroy',$overtime)}}" method="POST"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger"><i
                                                class="feather icon-trash"></i></button>
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
                {!!$overtimes->links()!!}
            </div>
        </div>
    </div>
    {{--modal input--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Overtime</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('overtime.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Tanggal</label>
                                <input type="date" name="date" class="form-control @error('date') is-invalid @enderror">
                                @error('date')
                                <span class="invalid-feedback text-capitalize">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label>Petugas/CRE</label>
                                <select name="employee_id"
                                        class="form-control @error('employee_id') is-invalid @enderror">
                                    <option value="">--Pilih--</option>
                                    @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                    @endforeach
                                </select>
                                @error('employee_id')
                                <span class="invalid-feedback text-capitalize">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label>Mulai</label>
                                <input type="time" name="start"
                                       class="form-control @error('start') is-invalid @enderror"
                                       placeholder="Nama Pengeluaran">
                                @error('start')
                                <span class="invalid-feedback text-capitalize">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label>Berhenti</label>
                                <input type="time" name="stop" class="form-control @error('stop') is-invalid @enderror"
                                       placeholder="Harga Pengeluaran">
                                @error('stop')
                                <span class="invalid-feedback text-capitalize">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <textarea type="text" name="description"
                                          class="form-control @error('description') is-invalid @enderror"
                                          placeholder="Catatan"></textarea>
                                @error('description')
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
    @include('backend.overtimes.edit')
@endsection

