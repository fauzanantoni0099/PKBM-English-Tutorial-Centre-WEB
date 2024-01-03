@foreach($mistakes as $mistake)
<div class="modal fade" id="exampleModal-{{$mistake->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Mistake</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('mistake.update',$mistake->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Tanggal</label>
                            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" value="{{$mistake->date}}">
                            @error('date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label>Petugas/CRE</label>
                            <select name="employee_id" class="form-control @error('employee_id') is-invalid @enderror" >
                                <option value="">--Pilih--</option>
                                @foreach($employees as $employee)
                                    <option value="{{$employee->id}}" @if($mistake->employee_id == $employee->id) selected @endif>{{$employee->name}}</option>
                                @endforeach
                            </select>
                            @error('employee_id')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Kesalahan</label>
                            <input type="text" name="mistake" class="form-control @error('mistake') is-invalid @enderror" value="{{$mistake->mistake}}">
                            @error('mistake')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" >{{value($mistake->description)}}</textarea>
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
