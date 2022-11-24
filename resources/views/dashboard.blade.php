@extends('layouts.main')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">

            <!--begin::Row-->
            @if(Auth::user()->user_type == '1')
            <div class="row gy-5 g-xl-10 justify-content-center">
                <div class="col-xl-3">
                    <div class="card overflow-hidden mb-5 mb-xl-10">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="black"></path>
                                    <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="black"></rect>
                                    <path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="black"></path>
                                    <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="black"></rect>
                                </svg>
                            </span>
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$profileView}}</div>
                            <div class="fw-bold text-gray-400">Profile View</div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(Auth::user()->user_type == '2')
            <div class="row gy-5 g-xl-10 justify-content-center">
                <div class="col-xl-3">
                    <div class="card overflow-hidden mb-5 mb-xl-10">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="black" />
                                    <path d="M12.0006 11.1542C13.1434 11.1542 14.0777 10.22 14.0777 9.0771C14.0777 7.93424 13.1434 7 12.0006 7C10.8577 7 9.92348 7.93424 9.92348 9.0771C9.92348 10.22 10.8577 11.1542 12.0006 11.1542Z" fill="black" />
                                    <path d="M15.5652 13.814C15.5108 13.6779 15.4382 13.551 15.3566 13.4331C14.9393 12.8163 14.2954 12.4081 13.5697 12.3083C13.479 12.2993 13.3793 12.3174 13.3067 12.3718C12.9257 12.653 12.4722 12.7981 12.0006 12.7981C11.5289 12.7981 11.0754 12.653 10.6944 12.3718C10.6219 12.3174 10.5221 12.2902 10.4314 12.3083C9.70578 12.4081 9.05272 12.8163 8.64456 13.4331C8.56293 13.551 8.49036 13.687 8.43595 13.814C8.40875 13.8684 8.41781 13.9319 8.44502 13.9864C8.51759 14.1133 8.60828 14.2403 8.68991 14.3492C8.81689 14.5215 8.95295 14.6757 9.10715 14.8208C9.23413 14.9478 9.37925 15.0657 9.52439 15.1836C10.2409 15.7188 11.1026 15.9999 11.9915 15.9999C12.8804 15.9999 13.7421 15.7188 14.4586 15.1836C14.6038 15.0748 14.7489 14.9478 14.8759 14.8208C15.021 14.6757 15.1661 14.5215 15.2931 14.3492C15.3838 14.2312 15.4655 14.1133 15.538 13.9864C15.5833 13.9319 15.5924 13.8684 15.5652 13.814Z" fill="black" />
                                </svg>
                            </span>
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$user}}</div>
                            <div class="fw-bold text-gray-400">Total Admins</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card overflow-hidden mb-5 mb-xl-10">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M20 15H4C2.9 15 2 14.1 2 13V7C2 6.4 2.4 6 3 6H21C21.6 6 22 6.4 22 7V13C22 14.1 21.1 15 20 15ZM13 12H11C10.5 12 10 12.4 10 13V16C10 16.5 10.4 17 11 17H13C13.6 17 14 16.6 14 16V13C14 12.4 13.6 12 13 12Z" fill="black"></path>
                                    <path d="M14 6V5H10V6H8V5C8 3.9 8.9 3 10 3H14C15.1 3 16 3.9 16 5V6H14ZM20 15H14V16C14 16.6 13.5 17 13 17H11C10.5 17 10 16.6 10 16V15H4C3.6 15 3.3 14.9 3 14.7V18C3 19.1 3.9 20 5 20H19C20.1 20 21 19.1 21 18V14.7C20.7 14.9 20.4 15 20 15Z" fill="black"></path>
                                </svg>
                            </span>
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$company}}</div>
                            <div class="fw-bold text-gray-400">Total Companies</div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="card overflow-hidden mb-5 mb-xl-10">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="black"></path>
                                    <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="black"></rect>
                                    <path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="black"></path>
                                    <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="black"></rect>
                                </svg>
                            </span>
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">{{$admin}}</div>
                            <div class="fw-bold text-gray-400">Total Users</div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!--end::Row-->

            <div class="row gy-5 g-xl-10 justify-content-center">
                <div class="col-md-6 col-xl-4 mb-xl-10">
                    <a href="#">
                        <div class="card h-md-100 custom_welcome_card_dashboard">
                            <div class="card-body d-flex flex-column flex-center text-center">
                                <div class="mb-2">
                                    <h1 class="fw-bold text-primary text-center lh-lg">
                                        <span class="fw-boldest">Create or Modify your Digital VirtuaCard</span>
                                    </h1>
                                    <img src="{{ asset('theme/assets/media/logos/VirtuaCard Digitale.png')}}" class="img-fluid w-150px" alt="">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-xl-4 mb-xl-10">
                    <a href="#">
                        <div class="card h-md-100 custom_welcome_card_dashboard">
                            <div class="card-body d-flex flex-column flex-center text-center">
                                <div class="mb-2">
                                    <h1 class="fw-bold text-primary text-center lh-lg">
                                        <span class="fw-boldest">Create or Modify your Contact Card</span>
                                    </h1>
                                    <img src="{{ asset('theme/assets/media/logos/Fiche Contact.png')}}" class="img-fluid w-150px" alt="">
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection('content')