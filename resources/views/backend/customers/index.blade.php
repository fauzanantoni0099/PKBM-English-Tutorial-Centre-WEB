@extends('home')
@can('index customer')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Customer</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Customer
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
                        <form action="{{route('customer.index')}}" method="get">
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
                    @can('input customer')
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
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Program</th>
                    <th>Harga</th>
                    <th>Status Customer</th>
                    <th>Status</th>
                    <th>Status Pembayaran</th>
                    <th>Aksi</th>
                    </thead>
                    <tbody>
                    @forelse($customers as $customer)
                        <tr>
                            <td>{{$loop->iteration +$startIndex}}</td>
                            <td>{{\Carbon\Carbon::parse($customer->date)->isoFormat('D MMM Y')}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->class_room}}</td>
                            <td>{{$customer->program->name}}</td>
                            <td>Rp.{{number_format($customer->price_class,0,',',',')}}</td>
                            <td>{{$customer->status_customer}}</td>
                            <td>{{$customer->status}}</td>
                            <td>{{$customer->payment_status}}</td>
                            <td>
                                <div class="form-group">
                                    @can('edit customer')
                                    <a href="" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal-{{$customer->id}}"
                                       id="#myBtn" ><i class="feather icon-edit-2"></i></a>
                                    @endcan
                                    <a href="" class="btn btn-outline-secondary" data-toggle="modal" data-target="#showModal-{{$customer->id}}"
                                       id="#myBtn" ><i class="feather icon-eye"></i></a>
                                        @can('delete customer')
                                    <form action="{{route('customer.destroy',$customer)}}" method="POST" class="d-inline">
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
                {!!$customers->links()!!}
            </div>
        </div>
    </div>
{{--modal input--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('customer.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Tanggal Masuk : </label>
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
                            <label>Tanggal Lahir</label>
                            <input type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror" placeholder="Tanggal Lahir">
                            @error('birth_date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <select name="class_room" class="form-control @error('class_room') is-invalid @enderror" >
                                <option value="">--Pilih Kelas--</option>
                                <option value="-">Tidak Ada</option>
                                <option value="Reguler">Reguler</option>
                                <option value="Privat">Privat</option>
                                <option value="One to one">One to one</option>
                            </select>
                            @error('class_room')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <select name="program_id" class="form-control @error('program_id') is-invalid @enderror" >
                                <option value="">--Pilih Program--</option>
                                @foreach($programs as $program)
                                    <option value="{{$program->id}}">{{$program->name}}</option>
                                @endforeach
                            </select>
                            @error('program_id')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <input type="number" name="price_class" class="form-control @error('price_class') is-invalid @enderror" placeholder="Harga">
                            @error('price_class')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama">
                            @error('name')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
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
                            <input type="text" name="school" class="form-control @error('school') is-invalid @enderror" placeholder="Sekolah/pekerjaan">
                            @error('school')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="No.Hp">
                            @error('phone')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <select name="status_customer" class="form-control @error('status_customer') is-invalid @enderror" >
                                <option value="">--Status Customer--</option>
                                <option value="Siswa">Siswa</option>
                                <option value="Non Siswa">Non Siswa</option>
                            </select>
                            @error('status_customer')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <select name="book_id" class="form-control @error('book_id') is-invalid @enderror" >
                                <option value="">--Pilih Buku--</option>
                                @foreach($books as $book)
                                    <option value="{{$book->id}}">{{$book->name}}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <textarea type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Alamat"></textarea>
                            @error('address')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <select name="status" class="form-control @error('status') is-invalid @enderror" >
                                <option value="">--Status Client--</option>
                                <option value="-">None</option>
                                <option value="Baru">Baru</option>
                                <option value="Menunggu">Menunggu</option>
                                <option value="Mulai">Mulai</option>
                                <option value="Berhenti">Berhenti</option>
                                <option value="Pospone">Pospone</option>
                            </select>
                            @error('payment_status')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <input type="number" name="register" class="form-control @error('register') is-invalid @enderror" placeholder="Jumlah registrasi">
                            @error('register')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <input type="number" name="payment_price" class="form-control @error('payment_price') is-invalid @enderror" placeholder="Jumlah Pembayaran">
                            @error('payment_price')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <select name="payment_status" class="form-control @error('payment_status') is-invalid @enderror" >
                                <option value="">--Status Pembayaran--</option>
                                <option value="lunas">Lunas</option>
                                <option value="belum dibayar">Belum Dibayar</option>
                                <option value="Down Payment">Down Payment</option>
                            </select>
                            @error('payment_status')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label>Upload Foto</label>
                            <input type="file" name="name_path" class="form-control">
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
        @include('backend.customers.edit')
        @include('backend.customers.show')
@endsection
@endcan
