<form id="" class="form" method="POST" action="{{ route('user.update',$user->id) }}" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <!--begin::Scroll-->
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">First Name</label>
            <input type="text" value="{{$user->first_name}}"  name="first_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your First Name here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Last Name</label>
            <input type="text" value="{{$user->last_name}}" name="last_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Last Name here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Email Address</label>
            <input type="email"  value="{{$user->email}}" name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Email Address here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Mobile phone</label>
            <input type="number" value="{{$user->contact_no}}" min="0" name="contact_no" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Mobile phone here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Password</label>
            <input type="password"  value="" name="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your password here."  />
        </div>
        @if(Auth::user()->user_type == '2')
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Company Name</label>
            <select name="parent_id"  class="form-control form-control-solid mb-3 mb-lg-0"  required>
                <option value="0">Select Company</option>
                @for($i=0; $i < count($company); $i++)
                <option value="{{$company[$i]->id}}" {{$user->parent_id == $company[$i]->id ? 'selected' : ''}}>{{$company[$i]->company_name}}</option>
                @endfor
            </select>
        </div>
        @endif
    </div>
    <!--end::Scroll-->
    <!--begin::Actions-->
    <div class="text-center pt-15">
        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">Discard</button>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <!--end::Actions-->
</form>