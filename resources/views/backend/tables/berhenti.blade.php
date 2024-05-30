@extends('home')
@can('tables')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Datatable</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Tables</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berhenti</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h6 class="card-subtitle">Data Siswa Berhenti Keseluruhan Pada ETC PKBM</h6>
                <div class="table-responsive">
                    <table id="default-datatable" class="display table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Kelas dimulai</th>
                            <th>No.Hp</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($customers as $customer)
                            <tr>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->class_room}}</td>
                                <td>{{\Carbon\Carbon::parse($customer->date)->isoFormat('D MMM Y')}}</td>
                                <td>{{$customer->phone}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Data Tidak Ada!!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {!!$customers->links()!!}
            </div>
        </div>
    </div>
    @endsection
@endcan
