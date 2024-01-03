<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="form-group">
    <label>Provinsi</label>
    <select class="form-control" id="province">
        <option>--Pilih Provinsi--</option>
        @foreach($provinces as $province)
            <option value="{{$province->id}}">{{$province->name}}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label>Provinsi</label>
    <select class="form-control" id="regency">
        <option>--Pilih Kabupaten/Kota--</option>

    </select>
</div>
<div class="form-group">
    <label>Provinsi</label>
    <select class="form-control" id="kecematan">
        <option>--Pilih Kecamatan--</option>

    </select>
</div>
<div class="form-group">
    <label>Provinsi</label>
    <select class="form-control" id="desa">
        <option>--Pilih Desa--</option>

    </select>
</div>

<!-- Sertakan jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Script AJAX untuk Indoregion -->
<script>
    // Fungsi untuk mendapatkan data provinsi
    function getProvinces() {
        $.ajax({
            url: "{{ route('getProvinces') }}",
            method: 'GET',
            success: function(response) {
                // Mengisi dropdown provinsi dengan data yang diterima
                // Gantilah 'provinceDropdown' dengan ID dropdown provinsi Anda
                var provinceDropdown = $('#provinceDropdown');
                provinceDropdown.empty();
                provinceDropdown.append('<option value="">Pilih Provinsi</option>');

                $.each(response, function(id, name) {
                    provinceDropdown.append('<option value="' + id + '">' + name + '</option>');
                });
            }
        });
    }

    // Fungsi untuk mendapatkan data kabupaten/kota berdasarkan provinsi yang dipilih
    function getRegencies(provinceId) {
        $.ajax({
            url: "{{ route('getRegencies') }}",
            method: 'GET',
            data: { province_id: provinceId },
            success: function(response) {
                // Mengisi dropdown kabupaten/kota dengan data yang diterima
                // Gantilah 'regencyDropdown' dengan ID dropdown kabupaten/kota Anda
                var regencyDropdown = $('#regencyDropdown');
                regencyDropdown.empty();
                regencyDropdown.append('<option value="">Pilih Kabupaten/Kota</option>');

                $.each(response, function(id, name) {
                    regencyDropdown.append('<option value="' + id + '">' + name + '</option>');
                });
            }
        });
    }

    // Panggil fungsi getProvinces saat halaman dimuat
    $(document).ready(function() {
        getProvinces();

        // Panggil fungsi getRegencies saat provinsi dipilih
        $('#provinceDropdown').change(function() {
            var provinceId = $(this).val();
            if (provinceId) {
                getRegencies(provinceId);
            }
        });
    });
</script>
</body>
</html>
