@extends('layouts.main')

@section('content')

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">

                <!--begin::Content-->
                <div class="flex-lg-row-fluid">
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_user_contact_form" role="tabpanel">
                            <div class="card card-flush mb-6 mb-xl-9">
                                <div class="card-header mt-6">
                                    <div class="card-title flex-column">
                                        <h2 class="mb-1">Create your VirtuaCard</h2>
                                    </div>
                                </div>
                                <form id="" class="form" method="POST" action="{{ route('user_pk_pass') }}" enctype="multipart/form-data">
                                    <!--begin::Scroll-->
                                    <input hidden name="user_id" value="{{$users->id}}" />
                                    @csrf
                                <div class="card-body d-flex flex-column pt-1">
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">First Name</label>
                                        <input type="text" class="form-control form-control-solid" value="{{$users->first_name}}" placeholder="" name="first_name">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Last Name</label>
                                        <input type="text" class="form-control form-control-solid" value="{{$users->last_name}}" placeholder="" name="last_name">
                                    </div>
                                    
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Function</label>
                                        <input type="text" class="form-control form-control-solid" value="{{$users->function}}" placeholder="" name="function">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Company</label>
                                        <input type="text" class="form-control form-control-solid" value="{{$company[0]->company_name}}" placeholder="" name="company_name">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Font Color</label>
                                        <input type="color" name="font_color" class="form-control form-control-solid w-50px h-40px p-2">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Title Color</label>
                                        <input type="color" name="title_color" class="form-control form-control-solid w-50px h-40px p-2">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Background Color</label>
                                        <input type="color" name="background_color" class="form-control form-control-solid w-50px h-40px p-2">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <input type="file" name="file" class="form-control form-control-solid" multiple>
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <select name="logo" class="form-control form-control-solid">
                                            <option value="{{ asset('logos/pass/logo/icon@2x.png')}}">Logo Black</option>
                                            <option value="{{ asset('logos/pass/whitelogo/icon@2x.png')}}">Logo White</option>
                                        </select>
                                    </div>

                                    <div class="text-left pt-10">
                                        <button type="submit" class="btn btn-primary">Create your Pass</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <!--end:::Tab pane-->
                    </div>
                    <!--end:::Tab content-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>

@endsection('content')