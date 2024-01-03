@extends('home')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Incoming</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Tables</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Incoming Annual</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <form action="" method="get">
                    <h7>Input Year</h7>
                    <div class="input-group mb-3">
                        <select type="year" name="tahun" id="tahun" class="col-sm-3">
                            <option>{{request('tahun')}}</option>
                            <option>2022</option>
                            <option>2023</option>
                            <option>2024</option>
                            <option>2025</option>
                            <option>2026</option>
                            <option>2027</option>
                            <option>2028</option>
                            <option>2029</option>
                            <option>2030</option>
                        </select>
                        <button class="btn btn-outline-primary" type="submit">Report</button>
                    </div>
                </form>
                <p></p>
                <table id="default-datatable" class="display table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Petugas/CRE</th>
                        <th>Nama</th>
                        <th>Program</th>
                        <th>Registrasi</th>
                        <th>Kelas</th>
                        <th>Harga</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($customers as $customer)
                        <tr>
                            <td>{{$loop->iteration +$startIndex}}</td>
                            <td>{{\Carbon\Carbon::parse($customer->created_at)->isoFormat('D MMM Y')}}</td>
                            <td>{{$customer->employee->name}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->program->name}}</td>
                            <td>Rp. {{number_format($customer->register,0,',',',')}}</td>
                            <td>{{$customer->class_room}}</td>
                            <td>Rp. {{number_format($customer->price_class,0,',',',')}}</td>
                            <td>Rp. {{number_format($customer->register+$customer->price_class,0,',',',')}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">Data Tidak Ada!!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
{{--                {!!$customers->links()!!}--}}
            </div>
        </div>
    </div>
    @endsection