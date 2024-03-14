@extends('home')
@section('content')
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Sertifikat</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Sertifikat
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
                    <th>Tanggal Order</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Cetak</th>
                    <th>Pengambilan</th>
                    <th>status</th>
                    <th>Aksi</th>
                    </thead>
                    <tbody>
                    @forelse($certificates as $certificate)
                        <tr>
                            <td>{{$loop->iteration +$startIndex}}</td>
                            <td>{{\Carbon\Carbon::parse($certificate->order_date)->isoFormat('D MMM Y')}}</td>
                            <td>{{$certificate->customer->name}}</td>
                            <td>{{$certificate->certificate_type}}</td>
                            <td>{{\Carbon\Carbon::parse($certificate->print_date)->isoFormat('D MMM Y')}}</td>
                            <td>{{\Carbon\Carbon::parse($certificate->collection_date)->isoFormat('D MMM Y')}}</td>
                            <td>{{$certificate->status}}</td>
                            <td>
                                <div class="form-group">
                                    <a href="" class="btn btn-outline-warning" data-toggle="modal" data-target="#exampleModal-{{$certificate->id}}"
                                       id="#myBtn" ><i class="feather icon-edit-2"></i></a>
                                    <a href="" class="btn btn-outline-secondary" data-toggle="modal" data-target="#showModal-{{$certificate->id}}"
                                       id="#myBtn" ><i class="feather icon-eye"></i></a>
                                    <form action="{{route('certificate.destroy',$certificate)}}" method="POST" class="d-inline">
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
                {!!$certificates->links()!!}
            </div>
        </div>
    </div>
{{--modal input--}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Sertifikat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('certificate.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Tanggal Order</label>
                            <input type="date" name="order_date" class="form-control @error('order_date') is-invalid @enderror">
                            @error('order_date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-sm-8">
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
                        <div class="form-group col-md-4">
                            <label>Sertifikat</label>
                            <select name="certificate_type" class="form-control @error('certificate_type') is-invalid @enderror" >
                                <option value="">--Jenis Sertifikat--</option>
                                <option value="toefl">Toefl</option>
                                <option value="siswa">Siswa</option>
                            </select>
                            @error('certificate_type')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tanggal Ujian</label>
                            <input type="date" name="exam_date" class="form-control @error('exam_date') is-invalid @enderror" placeholder="Tanggal Lahir">
                            @error('exam_date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tanggal Kadaluarsa</label>
                            <input type="date" name="expired_date" class="form-control @error('expired_date') is-invalid @enderror" placeholder="Tanggal Lahir">
                            @error('expired_date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Score 1</label>
                            <input type="number" name="score_1" class="form-control @error('score_1') is-invalid @enderror">
                            @error('score_1')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Score 2</label>
                            <input type="number" name="score_2" class="form-control @error('score_2') is-invalid @enderror">
                            @error('score_2')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Score 3</label>
                            <input type="number" name="score_3" class="form-control @error('score_3') is-invalid @enderror">
                            @error('score_3')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" >
                                <option value="">--Status--</option>
                                <option value="Sudah bayar">Lulus</option>
                                <option value="Belum bayar">Remedial</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tanggal Cetak</label>
                            <input type="date" name="print_date" class="form-control @error('print_date') is-invalid @enderror">
                            @error('print_date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tanggal Pengambilan</label>
                            <input type="date" name="collection_date" class="form-control @error('collection_date') is-invalid @enderror">
                            @error('collection_date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Catatan"></textarea>
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
        @include('backend.certificates.edit')
        @include('backend.certificates.show')
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

