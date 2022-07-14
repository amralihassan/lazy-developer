<script>
    var cols = [];
    $(function() {
        var dataTable,
            orderable = true,
            route = "{{ route($route, $id) }}",
            columns_names_string = '{!! $columns !!}',
            columns_names_array = columns_names_string.split(',');


        for (const key of columns_names_array) {
            orderable = key === 'check' || key === 'action' ? false : true;
            cols.push({
                data: key,
                orderable: orderable,
                searchable: true,
                name: key
            });
        }

        // datatable initialization
        if ($(".dynamic-table").length > 0) {
            dataTable = $(".dynamic-table").DataTable({
                ajax: route,
                columns: cols,
                @include('vendor.bakerysoft.template.config')

            });
        };

    });

    $("#checkbox0").click(function() {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    function deleteRow(id) {
        swal({
            title: "Delete",
            text: "Are you sure you want to delete this record?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#D15B47",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            closeOnConfirm: false,
        }).then(function() {
            $.ajax({
                    url: "{{ route($data['route_destroy']) }}",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        _method: 'DELETE',
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    // display succees message
                    success: function(data) {
                        $('#list-datatable').DataTable().ajax.reload();
                    }
                })
                // display success confirm message
                .done(function(data) {
                    if (data.status == true) {
                        swal("Delete",
                            "Your record has been deleted successfully",
                            "success");
                    } else {
                        swal("Delete", data.msg, "error");
                    }
                });
        });

    }

    function multipleDelete() {
        var itemChecked = $(".custom-control-input:checked").length;
        if (itemChecked > 0) {
            var id = $('#formData').serializeArray();

            swal({
                title: "Delete",
                text: "Are you sure you want to delete these records?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#D15B47",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
            }).then(function() {
                $.ajax({
                        url: "{{ route($data['route_destroy']) }}",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            _method: 'DELETE',
                            _token: '{{ csrf_token() }}',
                            id: id
                        },
                        // display succees message
                        success: function(data) {
                            console.log(data);
                        },
                        complete: function() {
                            $('#list-datatable').DataTable().ajax.reload();
                        }
                    })
                    // display success confirm message
                    .done(function(data) {
                        if (data.status == true) {
                            swal("Delete",
                                "Your records have been deleted successfully",
                                "success");
                        } else {
                            swal("Delete", data.msg, "error");
                        }
                    });
            });
        } else {
            swal("Delete",
                "No records selected", "info");
        }

    }

    $('.keywords').each(function() {
        $(this).selectize({
            delimiter: ', ',
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input
                }
            }
        });
    });
</script>
@isset($script_path)
    @includeIf($script_path)
@endisset
