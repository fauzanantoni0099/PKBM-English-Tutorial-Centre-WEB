@foreach($certificates as $certificate)
<div class="modal fade" id="exampleModal-{{$certificate->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Sertifikat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('certificate.update',$certificate->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Tanggal Order</label>
                            <input type="date" name="order_date" class="form-control @error('order_date') is-invalid @enderror" value="{{$certificate->order_date}}">
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
                                                @foreach($customers as $customer)
                                                    <option value="{{$customer->id}}" @if($certificate->customer_id == $customer->id) selected @endif
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
                                <option value="{{$certificate->certificate_type}}">{{value($certificate->certificate_type)}}</option>
                                <option value="toefl">Toefl</option>
                                <option value="siswa">Siswa</option>
                            </select>
                            @error('certificate_type')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tanggal Ujian</label>
                            <input type="date" name="exam_date" class="form-control @error('exam_date') is-invalid @enderror" value="{{$certificate->exam_date}}">
                            @error('exam_date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tanggal Kadaluarsa</label>
                            <input type="date" name="expired_date" class="form-control @error('expired_date') is-invalid @enderror" value="{{$certificate->expired_date}}">
                            @error('expired_date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Score</label>
                            <select name="score" class="form-control @error('score') is-invalid @enderror" >
                                <option value="{{$certificate->score}}">{{value($certificate->score)}}</option>
                                <option value="Section 1">Section 1</option>
                                <option value="Section 2">Section 2</option>
                                <option value="Section 3">Section 3</option>
                            </select>
                            @error('score')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tanggal Cetak</label>
                            <input type="date" name="print_date" class="form-control @error('print_date') is-invalid @enderror" value="{{$certificate->print_date}}">
                            @error('print_date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tanggal Pengambilan</label>
                            <input type="date" name="collection_date" class="form-control @error('collection_date') is-invalid @enderror" value="{{$certificate->collection_date}}">
                            @error('collection_date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label>Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" >
                                <option value="{{$certificate->status}}">{{value($certificate->status)}}</option>
                                <option value="Sudah bayar">Sudah bayar</option>
                                <option value="Belum bayar">Belum bayar</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" >{{value($certificate->description)}}</textarea>
                            @error('description')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
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
@endforeach
