<!DOCTYPE html>
<html lang="en">

<head>
    <base href="">
    <title>Virtuax</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset('theme/assets/media/logos/favicon.png')}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('theme/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('theme/assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="bg-light">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-center position-x-center bgi-no-repeat bgi-size-cover bgi-attachment-fixed" style="background-image: url({{ asset('theme/assets/media/logos/WavesBack.png')}})">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
                <a href="#" class="mb-12">
                    <img alt="Logo" src="{{ asset('theme/assets/media/logos/icon.png')}}" class="w-auto h-100px" />
                </a>
                <div class="w-lg-900px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                    <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="#">
                        <div class="mb-5">
                            <h1 class="text-dark mb-3">User Information</h1>
                        </div>
                        <div class=" row">
                            <div class="fv-row mb-7 fv-plugins-icon-container col-lg-6">
                                <label class=" fs-6 fw-bold mb-2">First Name</label>
                                <input type="text" class="form-control form-control-solid" value="{{$userDetails->first_name}}" placeholder="" readonly>
                            </div>
                            <div class="fv-row mb-7 fv-plugins-icon-container col-lg-6">
                                <label class=" fs-6 fw-bold mb-2">Last Name</label>
                                <input type="text" class="form-control form-control-solid" value="{{$userDetails->last_name}}" placeholder="" readonly>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="fv-row mb-7 fv-plugins-icon-container col-lg-6">
                                <label class=" fs-6 fw-bold mb-2">Contact No</label>
                                <input type="text" class="form-control form-control-solid" value="{{$userDetails->contact_no}}" placeholder="" readonly>
                            </div>
                            <div class="fv-row mb-7 fv-plugins-icon-container col-lg-6">
                                <label class=" fs-6 fw-bold mb-2">Email</label>
                                <input type="text" class="form-control form-control-solid" value="{{$userDetails->email}}" placeholder="" readonly>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="fv-row mb-7 fv-plugins-icon-container col-lg-6">
                                <label class=" fs-6 fw-bold mb-2">Street</label>
                                <input type="text" class="form-control form-control-solid" value="{{$userDetails->street_address}}" placeholder="" readonly>
                            </div>
                            <div class="fv-row mb-7 fv-plugins-icon-container col-lg-6">
                                <label class=" fs-6 fw-bold mb-2">City</label>
                                <input type="text" class="form-control form-control-solid" value="{{$userDetails->city}}" placeholder="" readonly>
                            </div>
                        </div>
                        <div class=" row">
                            <div class="fv-row mb-7 fv-plugins-icon-container col-lg-6">
                                <label class=" fs-6 fw-bold mb-2">Country</label>
                                <input type="text" class="form-control form-control-solid" value="{{$userDetails->country}}" placeholder="" readonly>
                            </div>
                            <div class="fv-row mb-7 fv-plugins-icon-container col-lg-6">
                                <label class=" fs-6 fw-bold mb-2">Post Code</label>
                                <input type="text" class="form-control form-control-solid" value="{{$userDetails->zip_code}}" placeholder="" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{ asset('theme/assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{ asset('theme/assets/js/scripts.bundle.js')}}"></script>
</body>

</html>