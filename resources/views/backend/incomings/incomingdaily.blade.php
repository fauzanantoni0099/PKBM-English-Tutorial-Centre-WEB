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
                        <li class="breadcrumb-item active" aria-current="page">Incoming Daily</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="date" class="form-control col-sm-3" name="tanggal" id="tanggal" value="{{request('tanggal')}}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit">Report</button>
{{--                            @if($tanggal)--}}
{{--                                <a class="btn btn-outline-primary" type="button" href="{{route('order.reportPdfDaily',$tanggal)}}">Download PDF--}}
{{--                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-download" viewBox="0 0 16 16">--}}
{{--                                        <path d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>--}}
{{--                                        <path d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"/>--}}
{{--                                    </svg>--}}
{{--                                </a>--}}
{{--                            @endif--}}
                        </div>
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
