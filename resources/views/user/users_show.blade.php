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

                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8 mt-5">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_user_contact_form">Contact Form</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_user_pass">Pass (iOS)</a>
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_user_contact_form" role="tabpanel">
                            <div class="card card-flush mb-6 mb-xl-9">
                                <div class="card-header mt-6">
                                    <div class="card-title flex-column">
                                        <h2 class="mb-1">Create your Contact Form</h2>
                                    </div>
                                </div>
                                <div class="card-body d-flex flex-column pt-1">
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <div class="fv-row mb-7 fv-plugins-icon-container">
                                            <label class="required fs-6 fw-bold mb-2">First Name</label>
                                            <input type="text" class="form-control form-control-solid" value="{{$users->first_name}}" placeholder="" name="first_name">
                                        </div>
                                        <label class="required fs-6 fw-bold mb-2">Last Name</label>
                                        <input type="text" class="form-control form-control-solid" value="{{$users->last_name}}" placeholder="" name="last_name">
                                    </div>
                                   
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Function</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="" name="function">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Company</label>
                                        <input type="text" class="form-control form-control-solid"  value="{{$company[0]->company_name}}" placeholder="" name="company">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Email</label>
                                        <input type="email" class="form-control form-control-solid" value="{{$users->email}}" placeholder="" name="email">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Street</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="" name="street">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Town</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="" name="town">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Postal Code</label>
                                        <input type="text" class="form-control form-control-solid" placeholder="" name="postal_code">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Country</label>
                                        <select name="" class="form-control form-control-solid js-example-basic-single">
                                            <option value="">France</option>
                                            <option value="">Italy</option>
                                        </select>
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <input type="file" name="file" class="form-control form-control-solid" multiple>
                                    </div>

                                    <h2 class="mb-2 mt-7">Phone numbers</h2>
                                    <div id="questions">
                                        <div class="col-md-10 py-4">
                                            <label class="required fs-6 fw-bold mb-2">Phone Number 1:</label>
                                            <div class="input-group">
                                                <input type="text" name="question" class="form-control form-control-solid" value="{{$users->contact_no}}" placeholder="123456789">
                                                <button type="button" id="DeleteRow" class="btn btn-sm btn-light-danger fs-6 fw-bold"><i class="fas fa-trash-alt fs-4 pe-2"></i>Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="newinput"></div>
                                    <div class="btn-wrapper d-flex gap-2 mt-4">
                                        <button id="rowAdder" type="button" class="btn btn-sm btn-light-success fs-6 fw-bold">
                                            <i class="fas fa-plus pe-2"></i> Add Phone Number
                                        </button>
                                    </div>

                                    <h2 class="mb-2 mt-10">Your URLs</h2>
                                    <div id="urls">
                                        <div class="col-md-10 py-4">
                                            <label class="required fs-6 fw-bold mb-2">Url 1:</label>
                                            <div class="input-group">
                                                <input type="text" name="url" class="form-control form-control-solid" placeholder="instagram.com/test">
                                                <button type="button" id="DeleteRow" class="btn btn-sm btn-light-danger fs-6 fw-bold"><i class="fas fa-trash-alt fs-4 pe-2"></i>Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="newinputurl"></div>
                                    <div class="btn-wrapper d-flex gap-2 mt-4">
                                        <button id="urlAdder" type="button" class="btn btn-sm btn-light-success fs-6 fw-bold">
                                            <i class="fas fa-plus pe-2"></i> Add Url
                                        </button>
                                    </div>

                                    <div class="text-left pt-15">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end:::Tab pane-->
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade " id="kt_user_pass" role="tabpanel">
                            <div class="card card-flush mb-6 mb-xl-9">
                                <div class="card-header mt-6">
                                    <div class="card-title flex-column">
                                        <h2 class="mb-1">Create your VirtuaCard</h2>
                                    </div>
                                </div>
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
                                        <input type="text" class="form-control form-control-solid" placeholder="" name="function">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Company</label>
                                        <input type="text" class="form-control form-control-solid" value="{{$company[0]->company_name}}" placeholder="" name="company">
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
                                        <select name="" class="form-control form-control-solid">
                                            <option value="">Virtua Card Logo</option>
                                        </select>
                                    </div>

                                    <div class="text-left pt-10">
                                        <button type="submit" class="btn btn-primary">Create your Pass</button>
                                    </div>
                                </div>
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