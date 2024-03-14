@foreach($customers as $customer)
<div class="modal fade" id="exampleModal-{{$customer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('customer.update',$customer->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Tanggal Masuk</label>
                            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{$customer->date}}">
                            @error('date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Petugas/CRE</label>
                            <select name="employee_id" class="form-control @error('employee_id') is-invalid @enderror" >
                                <option value="">--Pilih Petugas--</option>
                                @foreach($employees as $employee)
                                    <option value="{{$employee->id}}" @if($customer->employee_id == $employee->id) selected @endif>{{$employee->name}}</option>
                                @endforeach
                            </select>
                            @error('employee_id')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tanggal Lahir</label>
                            <input type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror" value="{{$customer->birth_date}}">
                            @error('birth_date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Kelas</label>
                            <select name="class_room" class="form-control @error('class_room') is-invalid @enderror" >
                                <option value="{{$customer->class_room}}">{{$customer->class_room}}</option>
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
                            <label>Program</label>
                            <select name="program_id" class="form-control @error('program_id') is-invalid @enderror" >
                                @foreach($programs as $program)
                                    <option value="{{$program->id}}" @if($customer->program_id == $program->id) selected @endif>{{$program->name}}</option>
                                @endforeach
                            </select>
                            @error('program_id')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Harga</label>
                            <input type="number" name="price_class" class="form-control @error('price_class') is-invalid @enderror" value="{{$customer->price_class}}">
                            @error('price_class')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$customer->name}}">
                            @error('name')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Jenis Kelamin</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror" >
                                <option value="{{$customer->gender}}">{{$customer->gender}}</option>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                            @error('gender')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Sekolah/Pekerjaan</label>
                            <input type="text" name="school" class="form-control @error('school') is-invalid @enderror" value="{{$customer->school}}">
                            @error('school')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>No.Hp</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$customer->phone}}">
                            @error('phone')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Status Customer</label>
                            <select name="status_customer" class="form-control @error('status_customer') is-invalid @enderror" >
                                <option value="{{$customer->status_customer}}">{{$customer->status_customer}}</option>
                                <option value="Siswa">Siswa</option>
                                <option value="Non Siswa">Non Siswa</option>
                            </select>
                            @error('status_customer')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Buku</label>
                            <select name="book_id" class="form-control @error('book_id') is-invalid @enderror" >
                                @foreach($books as $book)
                                    <option value="{{$book->id}}" @if($customer->book_id == $book->id) selected @endif>{{$book->name}}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label>Alamat</label>
                            <textarea type="text" name="address" class="form-control @error('address') is-invalid @enderror">{{value($customer->address)}}</textarea>
                            @error('address')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" >
                                <option value="{{$customer->status}}">{{$customer->status}}</option>
                                <option value="kosong">None</option>
                                <option value="baru">Baru</option>
                                <option value="menunggu">Menunggu</option>
                                <option value="mulai">Mulai</option>
                            </select>
                            @error('payment_status')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Registrasi</label>
                            <input type="number" name="register" class="form-control @error('register') is-invalid @enderror" value="{{$customer->register}}">
                            @error('register')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Jumlah Bayar</label>
                            <input type="number" name="payment_price" class="form-control @error('payment_price') is-invalid @enderror" value="{{$customer->payment_price}}">
                            @error('payment_price')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Status Pembayaran</label>
                            <select name="payment_status" class="form-control @error('payment_status') is-invalid @enderror" >
                                <option value="{{$customer->payment_status}}">{{$customer->payment_status}}</option>
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
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
