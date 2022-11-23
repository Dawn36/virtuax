<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade active show" id="kt_tab_pane_1" role="tabpanel">
        <form id="" class="form" method="POST" action="#">
            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                @php
                    $domain = substr (Request::root(), 7);
                    $userId=$userId.'{{(----)}}'.$domain;
                    $userId=base64_encode($userId);
                    $url=route('user_Qr_add',$userId);
                @endphp
                <div class="fv-row mb-7">
                    <label class="fw-bold fs-4 mb-2">Link</label>
                    <input type="text" name="link" class="form-control form-control-solid mb-3 mb-lg-0" value="{{$url}}" readonly />
                </div>
                <div class="fv-row mb-7">
                    <label class="fw-bold fs-4 mb-2 d-block">QR Code</label>
                    {!! QrCode::size(150)->generate($url) !!}
                </div>
            </div>
        </form>
    </div>
</div>