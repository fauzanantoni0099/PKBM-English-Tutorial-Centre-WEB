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
            <form action="{{route('corporate.report',$corporate->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <label>Report Corporate : </label>
                        <input type="file" name="name_path" class="form-control @error('name_path') is-invalid @enderror" value="{{$corporate->name_path}}">
                        @error('name_path')
                        <span class="invalid-feedback text-capitalize">{{$message}}</span>
                        @enderror
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
