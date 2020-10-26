$(function () {
    'use strict';

    $('#categoryForm').trigger("reset");
    $('#category-header').html('Category');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('#category-data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'slug', name: 'slug'},
            {data: 'description', name: 'description'},
            {data: 'status', name: 'status'},
            {data: 'action', action: 'Action', orderable: false, searchable: false},
        ],
        rowCallback: function(row, data){
            if(data.status == 'Unpublished'){
                $(row).css('background','#ffd6d6');
                //$(row).addClass('row-disabled');
            }

            var txt = $(row).find('td:eq(4)').text();

            if(txt == 'Publish') {
                $(row).find('td:eq(4)').css('color', 'green');
            } else {
                $(row).find('td:eq(4)').addClass('text-muted');
            }

        }
    });


    $('#create-new-category').click(function () {
        $('#btn-save').val("create-category");
        $('#categoryForm').trigger("reset");
    });

    $('#category-table').on('click', '#edit-category', function () {
        $('#error_slug').css('display','none');
        var category_id = $(this).data('id');



        $.get("" +'/control/blog/category/' + category_id +'/edit', function (data) {
            $('#category-header').html("Edit category");
            $('#btn-save').val("edit-category");
            $('#category_id').val(data.id);
            $('#name').val(data.name);
            $('#slug').val(data.slug.replace('-', ' '));
            $('#description').val(data.description);

            var status = "option:contains('"+data.status+"')";

            if($('select[name="status"]').find(status).text() == 'Publish') {
                $('#status option:eq(0)').attr('selected', true);
                $('#status option:eq(1)').attr('selected', false);
            } else {
                $('#status option:eq(1)').attr('selected', true);
                $('#status option:eq(0)').attr('selected', false);
            }

            $('#btn-save').html('Update');
            $('#cancel').css('display','inline-block');
        });
    });

    $('#cancel').on('click', function (){
        $('#categoryForm').trigger("reset");
        $('#category_id').val('');
        $('#btn-save').val("create");
        $('#cancel').css('display','none');
        $('#btn-save').html("Save");
        $('#category-header').html("Category");
        $('#error_slug').css('display','none');
        //location.reload();
    });


    $('#category-table').on('click', '.delete-category', function () {
        var category_id = $(this).data("id");
        var con = confirm("Are You sure want to delete !");

        if(con) {
            $.ajax({
                type: "DELETE",
                url: ""+'/control/blog/category/'+category_id,
                success: function (response) {

                    $("#category_id_" + category_id).remove();
                    $('#category-table .callout').css('display', 'block');
                    $('#category-table .callout').addClass(' callout-success');

                    if(response == true) {
                        $('#category-table .message').html('<div class="callout callout-success"><p class="message">Category deleted</p></div>');
                    } else {
                        $('#category-table .message').html('<div class="callout callout-danger"><p class="message">Delete operation doesn\'t work for active value</p></div>');
                    }
                    // Auto Message Hide
                    window.setTimeout(function() {
                        $("#category-table .callout").fadeTo(500, 0).slideUp(500, function(){
                            $(this).remove();
                        });
                    }, 4000);

                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        }
    });

    if ($("#categoryForm").length > 0) {

        $("#categoryForm").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 255
                },

                slug: {
                    required: true,
                    pattern: "[+#&a-zA-Z0-9 ]+",
                },

                description: {
                    required: false
                },

                status: {
                  required: true,
                }
            },

            messages: {
                name: {
                    required: 'Name field is required',
                    maxlength: 'Name should not be more than 50 character'
                },

                slug: {
                    required: 'Slug field is required',
                    pattern: 'Invalid slug format'
                }
            },

            submitHandler: function() {
                $('#btn-save').html('Sending..');
                $.ajax({
                    data: $('#categoryForm').serialize(),
                    url: "",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        if(data.unique > 0) {
                            $('#error_slug').css('display','block');
                            $('#error_slug').html("Value already exists. This field is unique");
                            $('#btn-save').html('Save');
                        } else {
                            table.draw();
                            $('#categoryForm').trigger("reset");
                            $('#category_id').val('');
                            $('#category-header').html("Category");
                            $('#cancel').css('display','none');
                            $('#btn-save').html('Save');
                            $('#error_slug').css('display','none');
                            $('#btn-save').val("create");
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#categoryForm').trigger("reset");
                        $('#btn-save').html('Save');
                    }
                });
            }
        });
    }
});


