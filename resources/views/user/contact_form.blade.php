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
                                        <h2 class="mb-1">Create your Contact Form</h2>
                                    </div>
                                    @if(isset($users->v_card_path))
                                    <div class="text-right pt-5">
                                        <a href="{{$users->v_card_path}}" class="btn btn-primary">Download</a>
                                    </div>
                                    @endif
                                </div>
                                <form id="" class="form" method="POST" action="{{ route('user_contact_form') }}" enctype="multipart/form-data">
                                    <!--begin::Scroll-->
                                    <input hidden name="user_id" value="{{$users->id}}" />
                                    @csrf
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
                                        <label class="required fs-6 fw-bold mb-2">Contact No</label>
                                        <input type="text" class="form-control form-control-solid" value="{{$users->contact_no}}" placeholder="" name="contact_no">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Function</label>
                                        <input type="text" class="form-control form-control-solid" value="{{$users->function}}" placeholder="" name="function">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Company</label>
                                        <input type="text" class="form-control form-control-solid"  value="{{$company[0]->company_name}}" placeholder="" name="company_name">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Email</label>
                                        <input type="email" class="form-control form-control-solid" value="{{$users->email}}" placeholder="" name="email">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Street</label>
                                        <input type="text" class="form-control form-control-solid" value="{{$users->street_address}}" placeholder="" name="street_address">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Town</label>
                                        <input type="text" class="form-control form-control-solid" value="{{$users->town}}" placeholder="" name="town">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Postal Code</label>
                                        <input type="text" class="form-control form-control-solid" value="{{$users->zip_code}}" placeholder="" name="zip_code">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fs-6 fw-bold mb-2">Country</label>
                                        <input type="text" class="form-control form-control-solid" value="{{$users->country}}" placeholder="" name="country">
                                    </div>
                                    
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <input type="file" name="file" class="form-control form-control-solid" multiple>
                                    </div>

                                    <h2 class="mb-2 mt-7">Phone numbers</h2>
                                    @if(count($usersPhone) == 0)
                                    <div id="questions">
                                        <div class="col-md-10 py-4">
                                            <label class="required fs-6 fw-bold mb-2">Phone Number</label>
                                            <div class="input-group">
                                                <input type="number" name="phone_number[]" class="form-control form-control-solid"  placeholder="123456789">
                                                <button type="button" id="DeleteRow" class="btn btn-sm btn-light-danger fs-6 fw-bold"><i class="fas fa-trash-alt fs-4 pe-2"></i>Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @for($i=0; $i < count($usersPhone); $i++)
                                    <div id="questions">
                                        <div class="col-md-10 py-4">
                                            <label class="required fs-6 fw-bold mb-2">Phone Number</label>
                                            <div class="input-group">
                                                <input type="number" name="phone_number[]" class="form-control form-control-solid" value="{{$usersPhone[$i]->phone_number}}" placeholder="123456789">
                                                <button type="button" id="DeleteRow" class="btn btn-sm btn-light-danger fs-6 fw-bold"><i class="fas fa-trash-alt fs-4 pe-2"></i>Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
                                    <div id="newinput"></div>
                                    <div class="btn-wrapper d-flex gap-2 mt-4">
                                        <button id="rowAdder" type="button" class="btn btn-sm btn-light-success fs-6 fw-bold">
                                            <i class="fas fa-plus pe-2"></i> Add Phone Number
                                        </button>
                                    </div>

                                    <h2 class="mb-2 mt-10">Your URLs</h2>
                                        @if(count($usersLink) == 0)
                                    <div id="urls" class="row">
                                        <div class="col-md-4 py-4">
                                            <label class="required fs-6 fw-bold mb-2">Type</label>
                                            <select name="type[]" class="form-control form-control-solid js-example-basic-single">
                                                <option value="Instgram" >Instgram</option>
                                                <option value="Facebook" >Facebook</option>
                                                <option value="Snapchat" >Snapchat</option>
                                                <option value="Twitter" >Twitter</option>
                                                <option value="Vinted" >Vinted</option>
                                                <option value="Website" >Website </option>
                                            </select>
                                        </div>
                                        <div class="col-md-8 py-4">
                                            <label class="required fs-6 fw-bold mb-2">Url 1:</label>
                                            <div class="input-group">
                                                <input type="text" name="link[]"  class="form-control form-control-solid" placeholder="instagram.com/test">
                                                <button type="button" id="DeleteRow" class="btn btn-sm btn-light-danger fs-6 fw-bold"><i class="fas fa-trash-alt fs-4 pe-2"></i>Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                        @endif
                                        @for($i=0; $i < count($usersLink); $i++)
                                    <div id="urls" class="row">
                                        <div class="col-md-4 py-4">
                                            <label class="required fs-6 fw-bold mb-2">Type</label>
                                            <select name="type[]" class="form-control form-control-solid js-example-basic-single">
                                                <option value="Instgram" {{$usersLink[$i]->type == 'Instgram' ? 'Selected' : ''}}>Instgram</option>
                                                <option value="Facebook" {{$usersLink[$i]->type == 'Facebook' ? 'Selected' : ''}}>Facebook</option>
                                                <option value="Snapchat" {{$usersLink[$i]->type == 'Snapchat' ? 'Selected' : ''}}>Snapchat</option>
                                                <option value="Twitter" {{$usersLink[$i]->type == 'Twitter' ? 'Selected' : ''}}>Twitter</option>
                                                <option value="Vinted" {{$usersLink[$i]->type == 'Vinted' ? 'Selected' : ''}}>Vinted</option>
                                                <option value="Website" {{$usersLink[$i]->type == 'Website' ? 'Selected' : ''}}>Website </option>
                                            </select>
                                        </div>
                                        <div class="col-md-8 py-4">
                                            <label class="required fs-6 fw-bold mb-2">Url 1:</label>
                                            <div class="input-group">
                                                <input type="text" name="link[]" value="{{$usersLink[$i]->link}}" class="form-control form-control-solid" placeholder="instagram.com/test">
                                                <button type="button" id="DeleteRow" class="btn btn-sm btn-light-danger fs-6 fw-bold"><i class="fas fa-trash-alt fs-4 pe-2"></i>Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                        @endfor
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