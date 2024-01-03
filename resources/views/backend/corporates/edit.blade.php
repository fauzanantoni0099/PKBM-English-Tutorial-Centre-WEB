@foreach($corporates as $corporate)
<div class="modal fade" id="exampleModal-{{$corporate->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('corporate.update',$corporate->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Tanggal Masuk : </label>
                            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{$corporate->date}}">
                            @error('date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Petugas/CRE : </label>
                            <select name="employee_id" class="form-control @error('employee_id') is-invalid @enderror" >
                                <option value="">--Pilih Petugas--</option>
                                @foreach($employees as $employee)
                                    <option value="{{$employee->id}}" @if($corporate->employee_id == $employee->id) selected @endif>{{$employee->name}}</option>
                                @endforeach
                            </select>
                            @error('employee_id')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Nama Corporate : </label>
                            <input type="text" name="program_name" class="form-control @error('program_name') is-invalid @enderror" value="{{$corporate->program_name}}">
                            @error('program_name')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Kepala Corporate : </label>
                            <input type="text" name="program_head" class="form-control @error('program_head') is-invalid @enderror" value="{{$corporate->program_head}}">
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
                                                    <option value="{{$customer->id}}" @if($corporate->customer_id == $customer->id) selected @endif
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
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
