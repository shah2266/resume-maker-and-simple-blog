$(function () {
    'use strict';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('#data-table').DataTable({
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
    //console.log(table);

    $('#tag_id').val('');
    $('#tagForm').trigger("reset");
    $('#modelHeading').html("Create New Tag");

    $('#createNewTag').click(function () {
        //$('#saveBtn').val("create-tag");
        $('#tag_id').val('');
        $('#tagForm').trigger("reset");
        $('#modelHeading').html("Create New Tag");
        $('#tagModal').modal('show');
    });

    $('#tag').on('click', '.editTag', function () {
        var tag_id = $(this).data('id');
        $.get("" +'/control/blog/tag/' + tag_id +'/edit', function (data) {
            $('#modelHeading').html("Edit tag");
            //$('#saveBtn').val("edit-tag");
            $('#tagModal').modal('show');
            $('#tag_id').val(data.id);
            $('#name').val(data.name);
            $('#slug').val(data.slug);
            $('#description').val(data.description);
        });
    });

    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');

        $.ajax({
            data: $('#tagForm').serialize(),
            url: "",
            type: "POST",
            dataType: 'json',
            success: function (data) {

                $('#tagForm').trigger("reset");
                $('#tagModal').modal('hide');
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
                $('#saveBtn').html('Save Changes');
            }
        });
    });

    $('#tag').on('click', '.deleteTag', function () {

        var tag_id = $(this).data("id");
        confirm("Are You sure want to delete !");

        $.ajax({
            type: "DELETE",
            url: ""+'/control/blog/tag/'+tag_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });

});
