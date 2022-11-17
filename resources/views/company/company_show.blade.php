@extends('layouts.main')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">


                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body">
                            <!--begin::Summary-->
                            <!--begin::User Info-->
                            <div class="d-flex flex-center flex-column py-5">
                                <!--begin::Avatar-->
                                <!-- <div class="symbol symbol-100px symbol-circle mb-7">
									<img src="assets/media/avatars/300-3.jpg" alt="image" />
								</div> -->
                                <!--end::Avatar-->
                                <!--begin::Name-->
                                <div class="fw-bolder mt-5 fs-9">Company Name</div>
                                <a class="fs-1 text-gray-800 text-hover-primary fw-bolder mb-3" style="text-align: center;">{{ucwords($company->company_name)}}</a>
                                <!--end::Name-->
                                <!--begin::Position-->
                                <div class="mb-9">
                                    <!--begin::Badge-->
                                    <div class="badge badge-lg badge-light-primary d-inline">Company</div>
                                    <!--begin::Badge-->
                                </div>
                                <!--end::Position-->
                            </div>
                            <!--end::User Info-->
                            <!--end::Summary-->
                            <!--begin::Details toggle-->
                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">Details
                                    <span class="ms-2 rotate-180">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit customer details">
                                    <a href="#" class="btn btn-sm btn-light-primary"onclick="editCompany('{{$company->id}}')">Edit</a>
                                </span>
                            </div>
                            <!--end::Details toggle-->
                            <div class="separator"></div>
                            <!--begin::Details content-->
                            <div id="kt_user_view_details" class="collapse show">
                                <div class="pb-5 fs-6">
                                    <div class="fw-bolder mt-5">Email</div>
                                    <div class="text-gray-600 text-hover-primary">{{ucwords($company->email)}}</div>

                                    <div class="fw-bolder mt-5">Street/ Address</div>
                                    <div class="text-gray-600 text-hover-primary">{{ucwords($company->street_address)}}</div>

                                    <div class="fw-bolder mt-5">City</div>
                                    <div class="text-gray-600 text-hover-primary">{{ucwords($company->city)}}</div>

                                    <div class="fw-bolder mt-5">State</div>
                                    <div class="text-gray-600 text-hover-primary">{{ucwords($company->state)}}</div>

                                    <div class="fw-bolder mt-5">Zip Code</div>
                                    <div class="text-gray-600 text-hover-primary">{{ucwords($company->zip_code)}}</div>

                                    <div class="fw-bolder mt-5">Country</div>
                                    <div class="text-gray-600 text-hover-primary">{{ucwords($company->country)}}</div>

                                    <div class="fw-bolder mt-5">Creation Date</div>
                                    <div class="text-gray-600 text-hover-primary">{{date("Y-m-d",strtotime($company->created_at))}}</div>
                                </div>
                            </div>
                            <!--end::Details content-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Sidebar-->

                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-15">
                    <!--begin:::Tabs-->
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8 mt-5">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_tab_contacts">Users</a>
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade show active" id="kt_tab_contacts" role="tabpanel">
                            <div class="card card-flush mb-6 mb-xl-9">
                                <div class="card-header mt-6">
                                    <div class="card-title flex-column">
                                        <h2 class="mb-1">Users Listing</h2>
                                        <div class="fs-6 fw-bold text-muted">Total {{count($users)}} Users in this company</div>
                                    </div>
                                    {{-- <div class="card-toolbar">
                                        <button type="button" class="btn btn-light-primary btn-sm"  onclick="addTaskContact('{{$contact->id}}')">
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 13.5L12.5 13V10C12.5 9.4 12.6 9.5 12 9.5C11.4 9.5 11.5 9.4 11.5 10L11 13L8 13.5C7.4 13.5 7 13.4 7 14C7 14.6 7.4 14.5 8 14.5H11V18C11 18.6 11.4 19 12 19C12.6 19 12.5 18.6 12.5 18V14.5L16 14C16.6 14 17 14.6 17 14C17 13.4 16.6 13.5 16 13.5Z" fill="black" />
                                                    <rect x="11" y="19" width="10" height="2" rx="1" transform="rotate(-90 11 19)" fill="black" />
                                                    <rect x="7" y="13" width="10" height="2" rx="1" fill="black" />
                                                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                                                </svg>
                                            </span>
                                            Add Tasks
                                        </button>
                                    </div> --}}
                                </div>
                                <div class="card-body d-flex flex-column">
                                    <table class="kt_datatable_example_1 table table-row-bordered gy-5">
                                        <thead>
                                            <tr class="fw-bold fs-6 text-muted">
                                                <th class="min-w-30px">ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Mobile Phone</th>
                                                <th>Role</th>
                                                <th>Creation Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="fw-bold text-gray-600">
                                            @for ($i = 0; $i < count($users); $i++) @php $a=$i; $a++; @endphp 
                                            <tr>
                                                <td><a href="{{route('user_show',$users[$i]->id)}}" class="fw-bolder text-gray-800 text-hover-primary mb-1">{{$a}}</a></td>
                                                <td><a href="{{route('user_show',$users[$i]->id)}}" class="fw-bolder text-gray-800 text-hover-primary mb-1">{{ucwords($users[$i]->first_name)}}</a></td>
                                                <td>{{ucwords($users[$i]->last_name)}}</td>
                                                <td>{{$users[$i]->email}}</td>
                                                <td>{{$users[$i]->contact_no}}</td>
                                                <td>
                                                    <span class="badge badge-light-success fw-bolder fs-7 px-2 py-1">User</span>
                                                </td>
                                                <td>{{DATE("Y-m-d",strtotime($users[$i]->created_at))}}</td>
                                                <td>
                                                <button onclick="editUser('{{$users[$i]->id}}')" class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-primary me-2"  data-bs-original-title="Edit user">
                                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </button>
                                                <form  style="display: inline-block" method="POST" action="{{ route('user.destroy', $users[$i]->id) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                <button type="submit" class="btn btn-icon btn-sm btn-color-gray-400 btn-active-icon-danger me-2" data-bs-toggle="tooltip" data-bs-original-title="Delete user">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                    <span class="svg-icon svg-icon-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </button>
                                                </form>
                                            </td>
                                            </tr>
                                            @endfor
                                        </tbody>
                                    </table>
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
<script>
        function editCompany(id) {
        url = "{{route('company.edit',':id')}}";
        url = url.replace(':id', id);
        $.ajax({
            type: 'GET',
            url: url,
            success: function(result) {
                $('#myModalLgHeading').html('Edit Company');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    }
    function editUser(id) {
        url = "{{route('user.edit',':id')}}";
        url = url.replace(':id', id);
        $.ajax({
            type: 'GET',
            url: url,
            success: function(result) {
                $('#myModalLgHeading').html('Edit User');
                $('#modalBodyLarge').html(result);
                $('#myModalLg').modal('show');
            }
        });
    }
</script>
@endsection('content')