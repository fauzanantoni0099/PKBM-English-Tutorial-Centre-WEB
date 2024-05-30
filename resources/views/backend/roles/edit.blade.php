@foreach($roles as $role)
<div class="modal fade" id="exampleModal-{{$role->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('role.update',$role->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <table class="table" id="table_permission">
                            <thead class="table-dark">
                            <tr>
                                <th width="5%">
                                    <input type="checkbox" id="select-all-checkbox">
                                </th>
                                <th width="35%">No.</th>
                                <th width="35%">Nama</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>
                                        <input class="form-check-input permission-checkbox" style="width: 5%" type="checkbox" value="{{$permission->id}}" name="permission_id[]" id="flexCheckDefault"
                                               @if($role->permissions->contains($permission)) checked @endif>
                                    </td>
                                    <td>{{$loop->iteration +$startIndex}}</td>
                                    <td>{{$permission->name}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var selectAllCheckbox = document.getElementById('select-all-checkbox');
        var permissionCheckboxes = document.querySelectorAll('.permission-checkbox');

        selectAllCheckbox.addEventListener('change', function () {
            permissionCheckboxes.forEach(function (checkbox) {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });

        permissionCheckboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                if (!this.checked) {
                    selectAllCheckbox.checked = false;
                } else {
                    selectAllCheckbox.checked = [...permissionCheckboxes].every(function (checkbox) {
                        return checkbox.checked;
                    });
                }
            });
        });
    });
</script>

@endforeach


