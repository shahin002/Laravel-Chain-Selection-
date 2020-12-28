<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/bootstrap-5/css/bootstrap.min.css')}}">
</head>
<body>
<div class="container">
    <div class="row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Division</label>
        <select name="division" id="division" class="form-select" aria-label="Default select example" required>
            <option value="">Select Division</option>
            @foreach($divisions as $division)
                <option value="{{$division->id}}">{{$division->name}}</option>
            @endforeach

        </select>
    </div>
    <div class="row">
        <label for="staticEmail" class="col-sm-2 col-form-label">District</label>
        <select name="district" id="district" class="form-select" aria-label="Default select example" required>
            <option>Select District</option>
        </select>
    </div>
    <div class="row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Upazilla</label>
        <select name="upazilla" id="upazilla" class="form-select" aria-label="Default select example" required>
            <option>Select Upazilla</option>
        </select>
    </div>
    <div class="row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Union</label>
        <select name="union" id="union" class="form-select" aria-label="Default select example" required>
            <option>Select Union</option>
        </select>

    </div>
</div>

<script src="{{asset("assets/bootstrap-5/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("assets/bootstrap-5/js/jquery-3.5.1.min.js")}}"></script>
<script>


    $(document).ready(function () {
        $(document).on('change', '#division', function () {
            var divisionId = $(this).val();
            $('#district').empty();
            $('#district').append($("<option></option>").text("Select District")).trigger('change');
            if (divisionId) {
                $.ajax({
                    url: '{{route('ajax.get-districts')}}',
                    type: 'GET',
                    data: {division_id: divisionId},
                    success: function (data, status) {

                        // console.log('1' in data)
                        $.each(data, function (key, value) {
                            $('#district')
                                .append($("<option></option>")
                                    .attr("value", key)
                                    .text(value));
                        });
                    },
                    error: function (xhr, desc, err) {
                        console.log("error");
                    },
                    complete: function () {

                    }
                });
            }
        });
        $(document).on('change', '#district', function () {
            var districtId = $(this).val();
            $('#upazilla').empty();
            $('#upazilla').append($("<option></option>").text("Select Upazilla")).trigger('change');
            if (districtId) {
                $.ajax({
                    url: '{{route('ajax.get-upazillas')}}',
                    type: 'GET',
                    data: {district_id: districtId},
                    success: function (data, status) {

                        // console.log('1' in data)
                        $.each(data, function (key, value) {
                            $('#upazilla')
                                .append($("<option></option>")
                                    .attr("value", key)
                                    .text(value));
                        });
                    },
                    error: function (xhr, desc, err) {
                        console.log("error");
                    },
                    complete: function () {

                    }
                });
            }
        });
        $(document).on('change', '#upazilla', function () {
            var upazillaId = $(this).val();
            $('#union').empty();
            $('#union').append($("<option></option>").text("Select Union")).trigger('change');
            if (upazillaId) {
                $.ajax({
                    url: '{{route('ajax.get-unions')}}',
                    type: 'GET',
                    data: {upazilla_id: upazillaId},
                    success: function (data, status) {

                        // console.log('1' in data)
                        $.each(data, function (key, value) {
                            $('#union')
                                .append($("<option></option>")
                                    .attr("value", key)
                                    .text(value));
                        });
                    },
                    error: function (xhr, desc, err) {
                        console.log("error");
                    },
                    complete: function () {

                    }
                });
            }
        });


    });
</script>
</body>
</html>
