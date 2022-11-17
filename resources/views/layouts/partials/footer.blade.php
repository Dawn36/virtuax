</div>
<!--end::Wrapper-->
</div>
<!--end::Page-->
</div>
<!--end::Root-->

<!--end::Drawers-->
<!--end::Main-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">

    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
    <span class="svg-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
        </svg>
    </span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->
<!--begin::Javascript-->

<script>
    var hostUrl = "assets/";
</script>
<script src="{{ asset('theme/assets/js/scripts.bundle.js')}}"></script>
<script src="{{ asset('theme/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('theme/assets/js/widgets.bundle.js')}}"></script>
<script src="{{ asset('theme/assets/js/custom/widgets.js')}}"></script>
<script src="{{ asset('theme/assets/js/custom/signin-methods.js')}}"></script> 

<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('theme/assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{ asset('theme/assets/js/custom/documentation/documentation.js')}}"></script>
<script src="{{ asset('theme/assets/js/custom/documentation/search.js')}}"></script>
{{-- <script src="{{ asset('theme/assets/js/custom/select2.js')}}"></script> --}}
<script src="{{ asset('theme/assets/js/custom/documentation/editors/quill/basic.js')}}"></script>
<!--end::Page Custom Javascript-->
<script>
  
    // $("#kt_datatable_example_1").DataTable();
    $(document).ready(function() {
        // Datatables
        var table = $('.kt_datatable_example_1').DataTable({
    aLengthMenu: [
        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "All"]
    ],
});

        $('#search').on('keyup', function() {
            table.search(this.value).draw();
        });
// Export buttons
        // $('.kt_datatable_example_1').DataTable({
        //     dom: 'Bfrtip',
        //     buttons: [
        //         'copy', 'csv', 'excel', 'pdf', 'print'
        //     ]
        // });
        
        var quill = new Quill('.kt_docs_quill_basic1', {
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, false]
                    }],
                    ['bold', 'italic', 'underline'],
                    ['image', 'code-block']
                ]
            },
            placeholder: 'Type your text here...',
            theme: 'snow' // or 'bubble'
        });

        // Date and Time Picker
        // -- Date Picker
        $(".kt_datepicker_2").flatpickr();

        // -- Date & Time Picker
        $(".kt_datepicker_3").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        // -- Time Picker
        $(".kt_datepicker_8").flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
        });

        // Select2
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        var count = 1;
        $("#rowAdder").click(function() {
            count++;
            newRowAdd =
                '<div id="questions"> <div class="col-md-10 py-4">' +
                '<label class="required fs-6 fw-bold mb-2">Phone Number ' + count + ':</label> <div class="input-group">' +
                '<input type="text" name="question" class="form-control form-control-solid" placeholder="123456789">' +
                '<button type="button" id="DeleteRow" class="btn btn-sm btn-light-danger fs-6 fw-bold"><i class="fas fa-trash-alt fs-4 pe-2"></i>Delete</button>' +
                '</div> </div> </div>';
            $('#newinput').append(newRowAdd);
        });

        $("body").on("click", "#DeleteRow", function() {
            $(this).parents("#questions").remove();
        })

        var url = 1;
        $("#urlAdder").click(function() {
            url++;
            newUrlAdd =
                '<div id="urls"> <div class="col-md-10 py-4">' +
                '<label class="required fs-6 fw-bold mb-2">URL ' + url + ':</label> <div class="input-group">' +
                '<input type="text" name="url" class="form-control form-control-solid" placeholder="instagram.com/test">' +
                '<button type="button" id="DeleteRow" class="btn btn-sm btn-light-danger fs-6 fw-bold"><i class="fas fa-trash-alt fs-4 pe-2"></i>Delete</button>' +
                '</div> </div> </div>';
            $('#newinputurl').append(newUrlAdd);
        });

        $("body").on("click", "#DeleteRow", function() {
            $(this).parents("#urls").remove();
        })
       
    });
</script>
<!--end::Javascript-->
</body>
<!--end::Body-->

</html>