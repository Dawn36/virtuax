<form id="" class="form" method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
    @csrf
    <!--begin::Scroll-->
    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">First Name</label>
            <input type="text"  name="first_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your First Name here." required />
        </div>
        <input hidden name="role_id" value="1" />
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Last Name</label>
            <input type="text" name="last_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Last Name here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Email Address</label>
            <input type="email"  name="email" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Email Address here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Mobile phone</label>
            <input type="number" min="0" name="contact_no" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your Mobile phone here." required />
        </div>
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Password</label>
            <input type="password"  name="password" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Please Enter your password here." required />
        </div>
        @if(Auth::user()->user_type == '2')
        <div class="fv-row mb-7">
            <label class="required fw-bold fs-6 mb-2">Company Name</label>
            <select name="parent_id"  class="form-control form-control-solid mb-3 mb-lg-0"  required>
                <option value="0">Select Company</option>
                @for($i=0; $i < count($company); $i++)
                <option value="{{$company[$i]->id}}" >{{$company[$i]->company_name}}</option>
                @endfor
            </select>
        </div>
        @else
        <input hidden name="parent_id" value="{{Auth::user()->id}}" />
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