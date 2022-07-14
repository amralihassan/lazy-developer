<!-- Jquery js-->
<script src="{{ URL::asset('assets-dashboard/js/vendors/jquery-3.5.1.min.js') }}"></script>

<script src="{{ URL::asset('app-assets/vendors/js/vendors.min.js') }}"></script>
<script src="{{ URL::asset('app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ URL::asset('app-assets/js/scripts/forms/form-repeater.js') }}"></script>

<!-- Bootstrap4 js-->
<script src="{{ URL::asset('assets-dashboard/plugins/bootstrap/popper.min.js') }}"></script>
<script src="{{ URL::asset('assets-dashboard/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!--Othercharts js-->
<script src="{{ URL::asset('assets-dashboard/plugins/othercharts/jquery.sparkline.min.js') }}"></script>

<!-- Circle-progress js-->
<script src="{{ URL::asset('assets-dashboard/js/vendors/circle-progress.min.js') }}"></script>

<!-- Jquery-rating js-->
<script src="{{ URL::asset('assets-dashboard/plugins/rating/jquery.rating-stars.js') }}"></script>

<!--Sidemenu js-->
<script src="{{ URL::asset('assets-dashboard/plugins/sidemenu/sidemenu.js') }}"></script>

<!-- P-scroll js-->
<script src="{{ URL::asset('assets-dashboard/plugins/p-scrollbar/p-scrollbar.js') }}"></script>
<script src="{{ URL::asset('assets-dashboard/plugins/p-scrollbar/p-scroll1.js') }}"></script>

<!-- ECharts js -->
<script src="{{ URL::asset('assets-dashboard/plugins/echarts/echarts.js') }}"></script>

<!-- Peitychart js-->
<script src="{{ URL::asset('assets-dashboard/plugins/peitychart/jquery.peity.min.js') }}"></script>
<script src="{{ URL::asset('assets-dashboard/plugins/peitychart/peitychart.init.js') }}"></script>

<!-- Apexchart js-->
<script src="{{ URL::asset('assets-dashboard/js/apexcharts.js') }}"></script>

<!--Moment js-->
<script src="{{ URL::asset('assets-dashboard/plugins/moment/moment.js') }}"></script>

<!-- Daterangepicker js-->
<script src="{{ URL::asset('assets-dashboard/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('assets-dashboard/js/daterange.js') }}"></script>

<!-- Index js-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>

<!-- Data tables js-->
<script src="{{ URL::asset('assets-dashboard/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets-dashboard/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
@yield('scripts')
<script src="{{ URL::asset('assets-dashboard/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets-dashboard/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>

<!--Counters -->
<script src="{{ URL::asset('assets-dashboard/plugins/counters/counterup.min.js') }}"></script>
<script src="{{ URL::asset('assets-dashboard/plugins/counters/waypoints.min.js') }}"></script>
<!--Select2 js -->
<script src="{{ URL::asset('assets-dashboard/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{ URL::asset('assets-dashboard/js/select2.js') }}"></script>

<!--Chart js -->
<script src="{{ URL::asset('assets-dashboard/plugins/chart/chart.bundle.js') }}"></script>
<script src="{{ URL::asset('assets-dashboard/plugins/chart/utils.js') }}"></script>

<!-- Custom js-->
<script src="{{ URL::asset('assets-dashboard/js/custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- Timepicker js -->
<script src="{{ URL::asset('assets-dashboard/plugins/time-picker/jquery.timepicker.js') }}"></script>
<script src="{{ URL::asset('assets-dashboard/plugins/time-picker/toggles.min.js') }}"></script>

<!-- Datepicker js -->
<script src="{{ URL::asset('assets-dashboard/plugins/date-picker/date-picker.js') }}"></script>
<script src="{{ URL::asset('assets-dashboard/plugins/date-picker/jquery-ui.js') }}"></script>
<script src="{{ URL::asset('assets-dashboard/plugins/input-mask/jquery.maskedinput.js') }}"></script>

<!-- File uploads js -->
<script src="{{ URL::asset('assets-dashboard/plugins/fileupload/js/dropify.js') }}"></script>
<script src="{{ URL::asset('assets-dashboard/js/filupload.js') }}"></script>

<!-- Form Advanced Element -->
{{-- <script src="{{ URL::asset('assets-dashboard/js/formelementadvnced.js') }}"></script> --}}
<script src="{{ URL::asset('assets-dashboard/js/form-elements.js') }}"></script>
{{-- <script src="{{ URL::asset('assets-dashboard/js/file-upload.js') }}"></script> --}}


<script>
    var count = 2;
    var limits = 4;
    "use strict";
    function addAmenity(e) {
        var keys = $("#keys").val();
        var values = $("#values").val();
        var t =
            `<td><select name="keys[]" class="form-control"><option value="" label="Choose one"></option>` + keys +`</select></td>
            <td><select name="values[]" class="form-control"><option value="" label="Choose one"></option>` + values +`</select></td>
            <td style="vertical-align: middle; width:10%; text-align: center;"><a id="add_amenity_item" class="btn btn-info btn-sm" name="amenity" value="{{ old('Amenity') }}" onClick="addAmenity(` +
            "amenity_item" +
            `)"><i class="fa fa-plus-square" aria-hidden="true"></i></a> <a class="btn btn-danger btn-sm" value="delete" onclick="deleteAmenityRow(this)" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>`;
        count == limits ? alert("You have reached the limit of adding " + count + " inputs") : $("tbody#amenity_item")
            .append("<tr>" + t + "</tr>")
        $("select.form-control:not(.dont-select-me)").select({
            placeholder: "Choose...",
            allowClear: true
        });
    }
    "use strict";

    function deleteAmenityRow(e) {
        var t = $("#amenities_table > tbody > tr").length;
        if (1 == t) alert("There only one row you can't delete.");
        else {
            var a = e.parentNode.parentNode;
            a.parentNode.removeChild(a)
        }
    }
    "use strict";
</script>
