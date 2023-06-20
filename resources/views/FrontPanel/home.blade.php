@extends('layouts.front_panel')
@section('content')


    <div class="container-fluid bg-white">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">

                <div class="text-center fw-bold h4 text_color_7 mt-5">Chip Marking Tool</div>


                <form id="craving_tool_form">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4 mb-xl-0">
                            <div class="my-4 d-flex justify-content-center justify-content-xl-end align-items-xl-center">
                                <div class="pe-3">
                                    <div class="form-control border-0 text_color_default">Package Type</div>
                                    <div class="form-control border-0 invisible small">Error Message</div>
                                    <div class="form-control border-0 text_color_default">Chip Text</div>
                                    <div class="form-control border-0 invisible small">Error Message</div>
{{--                                    <div class="form-control border-0 text_color_default">X-Coordinate</div>--}}
{{--                                    <div class="form-control border-0 invisible small">Error Message</div>--}}
{{--                                    <div class="form-control border-0 text_color_default">Y-Coordinate</div>--}}
{{--                                    <div class="form-control border-0 invisible small">Error Message</div>--}}
{{--                                    <div class="form-control border-0 text_color_default">Angle in Degree</div>--}}
{{--                                    <div class="form-control border-0 invisible small">Error Message</div>--}}
{{--                                    <div class="form-control border-0 text_color_default">Text Color</div>--}}
{{--                                    <div class="form-control border-0 invisible small">Error Message</div>--}}
{{--                                    <div class="form-control border-0 text_color_default">Font Family</div>--}}
{{--                                    <div class="form-control border-0 invisible small">Error Message</div>--}}
                                    <div class="form-control border-0 text_color_default">Font Size</div>
                                    <div class="form-control border-0 invisible small">Error Message</div>
                                    <div class="form-control border-0 invisible">Error Message</div>
                                </div>
                                <div class="ps-3" style="width: 250px;">
                                    <select class="form-select" name="package_type_id" id="package_type_id">
                                        <option value="">Select a Package Type</option>
                                        @foreach($packageTypes as $packageType)
                                            <option
                                                value="{{ $packageType->id }}">{{ $packageType->package_type }}</option>
                                        @endforeach
                                    </select>
                                    <div class="form-control border-0 invisible small" id="package_type_id_error_message">Error Message</div>
                                    <input class="form-control" type="text" name="chip_text" id="chip_text">
                                    <div class="form-control border-0 invisible small" id="chip_text_error_message">Error Message</div>
{{--                                    <input class="form-control" type="text" name="x_coordinate" id="x_coordinate">--}}
{{--                                    <div class="form-control border-0 invisible small" id="x_coordinate_error_message">Error Message</div>--}}
{{--                                    <input class="form-control" type="text" name="y_coordinate" id="y_coordinate">--}}
{{--                                    <div class="form-control border-0 invisible small" id="y_coordinate_error_message">Error Message</div>--}}
{{--                                    <input class="form-control" type="text" name="text_angle" id="text_angle">--}}
{{--                                    <div class="form-control border-0 invisible small" id="text_angle_error_message">Error Message</div>--}}
{{--                                    <input class="form-control" type="color" name="text_color" id="text_color">--}}
{{--                                    <div class="form-control border-0 invisible small" id="text_color_error_message">Error Message</div>--}}
{{--                                    <select class="form-select" name="font_family" id="font_family">--}}
{{--                                        <option value="">Select a Font Family</option>--}}
{{--                                        <option value="Roboto">Roboto</option>--}}
{{--                                        <option value="Open Sans">Open Sans</option>--}}
{{--                                        <option value="Prompt">Prompt</option>--}}
{{--                                    </select>--}}
{{--                                    <div class="form-control border-0 invisible small" id="font_family_error_message">Error Message</div>--}}
                                    <input class="form-control" type="text" name="text_size" id="text_size">
                                    <div class="form-control border-0 invisible small" id="text_size_error_message">Error Message</div>
                                    <div class="text-end">
                                        <button type="submit" id="microchip_form_submit_btn"
                                                class="btn btn_default border-0 rounded-0 p1-2 px-3">Mark on Chip
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                            <div class="d-flex align-items-center h-100" id="craving_image_container">
                                <div>Selecting Package Type will load the respective image...</div>

                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>

    <div style="height: 25px;"></div>
    <script type="text/javascript">

        $(document).on('change', '#package_type_id', function () {
            $('#craving_image_container').empty();
            $.ajax({
                method: 'get',
                url: '{{ url('/get/craving/image') }}',
                data: {
                    package_type_id: $(this).val()
                },
                success: function (result) {
                    console.log(result)
                    if (result.payload !== null) {
                        let imagePath = '{{ asset('/storage') }}/' + result.payload.path;
                        $('#craving_image_container').append(`
                            <div><img src="` + imagePath + `"></div>
                        `);
                    } else {
                        $('#craving_image_container').append(`
                            <div>Selecting Package Type will load the respective image...</div>
                        `);
                    }
                },
                error: function (xhr) {
                    console.log(xhr)
                    $('#craving_image_container').append(`
                        <div>Selecting Package Type will load the respective image...</div>
                    `);
                }
            });
        });

        $(document).on('submit', '#craving_tool_form', function (event) {
            event.preventDefault();
            //$('#craving_image_container').empty();
            $('#package_type_id_error_message').empty().append('Error Message').addClass('invisible').removeClass('text-danger');
            $('#chip_text_error_message').empty().append('Error Message').addClass('invisible').removeClass('text-danger');
            // $('#x_coordinate_error_message').empty().append('Error Message').addClass('invisible').removeClass('text-danger');
            // $('#y_coordinate_error_message').empty().append('Error Message').addClass('invisible').removeClass('text-danger');
            // $('#text_angle_error_message').empty().append('Error Message').addClass('invisible').removeClass('text-danger');
            // $('#text_color_error_message').empty().append('Error Message').addClass('invisible').removeClass('text-danger');
            // $('#font_family_error_message').empty().append('Error Message').addClass('invisible').removeClass('text-danger');
            $('#text_size_error_message').empty().append('Error Message').addClass('invisible').removeClass('text-danger');
            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('/crave/on/image') }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function (result) {
                    console.log(result)
                    let imagePath = '{{ asset('/storage/images/craving') }}/' + result.payload.file;
                    $('#craving_image_container').empty().append(`
                        <div><img src="` + imagePath + `"></div>
                    `);
                },
                error: function (xhr) {
                    console.log(xhr)
                    if (xhr.status === 422) {
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            $('#' + key + '_error_message').empty().append(value).removeClass('invisible').addClass('text-danger');
                        });
                    }
                    // $('#craving_image_container').append(`
                    //     <div>Selecting Package Type will load the respective image...</div>
                    // `);
                }
            });
        });

    </script>


@endsection
