@foreach($newclasses as $newclass)
<div class="modal fade" id="exampleModal-{{$newclass->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Mistake</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('newclass.update',$newclass->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <input type="text" name="name_class" class="form-control @error('name_class') is-invalid @enderror" value="{{$newclass->name_class}}">
                            @error('name_class')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <select name="customer_id" class="form-control @error('customer_id') is-invalid @enderror" >
                                <option value="">--Pilih Siswa--</option>
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id}}"@if($newclass->customer_id == $customer->id) selected @endif>{{$customer->name}}</option>
                                @endforeach
                            </select>
                            @error('customer_id')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tanggal Masuk</label>
                            <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{$newclass->start_date}}">
                            @error('start_date')
                            <span class="invalid-feedback text-capitalize">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" >{{value($newclass->description)}}</textarea>
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
@endforeach
