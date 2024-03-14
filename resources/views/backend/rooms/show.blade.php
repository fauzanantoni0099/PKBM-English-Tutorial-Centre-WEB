@foreach($rooms as $room)
    <div class="modal fade" id="showModal-{{$room->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table tab-content" >
                        <tbody>
                        <tr>
                            <td class="text-black">Petugas/CRE/Guru</td>
                            <td class="text-black">:</td>
                            <td class="text-capitalize text-black">{{$room->employee->name}}</td>
                        </tr>
                        <tr>
                            <td class="text-black">Nama Kelas</td>
                            <td class="text-black">:</td>
                            <td>{{$room->name}}</td>
                        </tr>
                        <tr>
                            <td class="text-black">Ruangan</td>
                            <td class="text-black">:</td>
                            <td>{{$room->room}}</td>
                        </tr>
                        <tr>
                            <td class="text-black">Tanggal Ujian</td>
                            <td class="text-black">:</td>
                            <td>{{\Carbon\Carbon::parse($room->ujian)->isoFormat('D MMMM Y')}}</td>
                        </tr>
                        <tr>
                            <td class="text-black">Tanggal Penerimaan Rapor</td>
                            <td class="text-black">:</td>
                            <td>{{\Carbon\Carbon::parse($room->rapor)->isoFormat('D MMMM Y')}}</td>
                        </tr>
                        <tr>
                            <td class="text-black">Tanggal Wisuda</td>
                            <td class="text-black">:</td>
                            <td>{{\Carbon\Carbon::parse($room->wisuda)->isoFormat('D MMMM Y')}}</td>
                        </tr>
                        <tr>
                            <td class="text-black">Keterangan</td>
                            <td class="text-black">:</td>
                            <td>{{$room->description}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endforeach
