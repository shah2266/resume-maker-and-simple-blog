$(function () {
    'use strict';

    $('#tagForm').trigger("reset");
    $('#tag-header').html('Tag');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('#tag-data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'slug', name: 'slug'},
            {data: 'description', name: 'description'},
            {data: 'action', action: 'Action', orderable: false, searchable: false},
        ]
    });


    $('#create-new-tag').click(function () {
        $('#btn-save').val("create-tag");
        $('#tagForm').trigger("reset");
    });

    $('#tag-table').on('click', '#edit-tag', function () {
        $('#error_slug').css('display','none');
        var tag_id = $(this).data('id');
        $.get("" +'/control/blog/tag/' + tag_id +'/edit', function (data) {
            $('#tag-header').html("Edit tag");
            $('#btn-save').val("edit-tag");
            $('#tag_id').val(data.id);
            $('#name').val(data.name);
            $('#slug').val(data.slug);
            $('#description').val(data.description);
            $('#btn-save').html('Update');
            $('#cancel').css('display','inline-block');
        });
    });

    $('#cancel').on('click', function (){
        $('#tagForm').trigger("reset");
        $('#tag_id').val('');
        $('#btn-save').val("create");
        $('#cancel').css('display','none');
        $('#btn-save').html("Save");
        $('#tag-header').html("Tag");
        $('#error_slug').css('display','none');
        //location.reload();
    });


    $('#tag-table').on('click', '.delete-tag', function () {
        var tag_id = $(this).data("id");
        //confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            url: ""+'/control/blog/tag/'+tag_id,
            success: function () {
                $("#tag_id_" + tag_id).remove();
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

    if ($("#tagForm").length > 0) {

        $("#tagForm").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 50
                },

                slug: {
                    required: true
                },

                description: {
                    required: false
                }
            },

            messages: {
                name: {
                    required: 'Name field is required',
                    maxlength: 'Name should not be more than 50 character'
                },

                slug: {
                    required: 'Slug field is required'
                }
            },

            submitHandler: function() {
                $('#btn-save').html('Sending..');
                $.ajax({
                    data: $('#tagForm').serialize(),
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
                            $('#tagForm').trigger("reset");
                            $('#tag_id').val('');
                            $('#tag-header').html("Tag");
                            $('#cancel').css('display','none');
                            $('#btn-save').html('Save');
                            $('#error_slug').css('display','none');
                            $('#btn-save').val("create");
                        }
                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#tagForm').trigger("reset");
                        $('#btn-save').html('Save');
                    }
                });
            }
        });
    }
});
