<!-- jQuery 3 -->
<script src="{{ asset('adminStyle/bower_components/jquery/dist/jquery.min.js') }}"></script>

<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('adminStyle/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Bootstrap DatePicker -->
<script src="{{ asset('adminStyle/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('adminStyle/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('adminStyle/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('adminStyle/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
<!-- InputMask -->
<script src="{{ asset('adminStyle/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('adminStyle/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('adminStyle/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('adminStyle/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminStyle/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>

<!-- iCheck 1.0.1 -->
<script src="{{ asset('adminStyle/plugins/iCheck/icheck.min.js') }}"></script>

<!-- FastClick -->
<script src="{{ asset('adminStyle/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminStyle/dist/js/adminlte.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('adminStyle/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap  -->
<script src="{{ asset('adminStyle/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('adminStyle/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('adminStyle/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- Select-2 -->
<script src="{{ asset('adminStyle/bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<!-- CK Editor -->
<script src="{{ asset('adminStyle/bower_components/ckeditor/ckeditor.js') }}"></script>

<!-- Bootstrap-toggle CDN -->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<!-- ChartJS -->
<script src="{{ asset('adminStyle/bower_components/chart.js/Chart.js') }}"></script>

<!-- ChartJS -->
<script src="{{ asset('adminStyle/bower_components/highlight/highlight.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminStyle/dist/js/demo.js') }}"></script>

<script src="{{ asset('adminStyle/dist/js/tag.js') }}"></script>
<script src="{{ asset('adminStyle/dist/js/category.js') }}"></script>
<script>
    if ( typeof oldIE === 'undefined' && Object.keys && typeof hljs !== 'undefined') {
        hljs.initHighlighting();
    }
</script>
<script>
    CKEDITOR.editorConfig = function( config ) {
        config.startupMode = 'source';
    }
</script>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
            //format: 'dd-mm-yyyy'
        });

        //Date picker
        $('#datepicker2').datepicker({
            autoclose: true,
            format: 'dd-mm-yyyy'
            //format: 'dd-mm-yyyy'
        });

    })

    //File upload
    $(document).on('click', '.browse', function () {
        var file = $(this).parent().parent().parent().find('.file');
        file.trigger('click');
    });
    $(document).on('change', '.file', function () {
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });

    /**
     *
     * Confirm Modal JS
     *
     */

    $('#confirm-company-delete').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var company_id = button.data('company-id');
        var modal = $(this);
        modal.find('.modal-body #company_id').val(company_id);
    });

    $('#confirm-banner-delete').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var banner_id = button.data('banner-id');
        var modal = $(this);
        var action_url = window.location.href;
        var getLastIndex = action_url.substring(action_url.lastIndexOf('/') + 1);
        if(Number.isInteger(parseInt(getLastIndex))) {
            modal.find('.modal-content #form-action').attr('action', action_url);
        } else {
            modal.find('.modal-content #form-action').attr('action', action_url+'/'+banner_id);
        }
        modal.find('.modal-body #banner_id').val(banner_id);
    });

    $('#confirm-contact-delete').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var contact_id = button.data('contact-id');
        var clear = button.data('contact-clear');


        var modal = $(this);
        var action_url = window.location.href;
        if(clear == 'clear') {
            modal.find('.modal-body p').text('Are you sure want to delete all items?');
        } else {
            modal.find('.modal-body p').text('Are you sure want to delete this item?');
        }
        modal.find('.modal-body #contact_id').val(contact_id);
        modal.find('.modal-content #action').attr('action', action_url+'/'+contact_id)
    });

    $('#confirm-education-delete').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var education_id = button.data('education-id');
        var modal = $(this);
        modal.find('.modal-body #education_id').val(education_id);
    });

    $('#confirm-training-delete').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var training_id = button.data('training-id');
        var modal = $(this);
        modal.find('.modal-body #training_id').val(training_id);
    });

    $('#confirm-professional-delete').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var professional_id = button.data('professional-id');
        var modal = $(this);
        modal.find('.modal-body #professional_id').val(professional_id);
    });

    $('#confirm-post-delete').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var post_id = button.data('post-id');
        var modal = $(this);
        modal.find('.modal-body #post_id').val(post_id);
    });


    //Banner Type
    $(function() {
        $(".toggle-class").change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var banner_type = $(this).prop('checked') == true ? 'slider': 'image';
            var request_id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/control/bannerType',
                data: {'status': status, 'banner_type': banner_type, 'request_id': request_id},
                success: function(data){
                    console.log(data.success)
                }
            });
        })
    })

</script>

<script>
    $(document).ready(function () {
        //$('.submint-btn').css("display", "none");
        $('.editBtn').click(function () {

            if ($('.editField').is('[readonly]')) {
                $('.editField').prop('readonly', false);
                $('.editBtn').html('<i class="fa fa-times"></i> Cancel');
                $('.editField').addClass("form-control pt-1 pb-1");
                $('.editField').removeClass("form-control-plaintext");
                $('.edit').addClass('col-md-6');
                $('.edit').removeClass('col-md-12');
                $('.editBtn').addClass("btn-danger");
                $('.editBtn').removeClass("btn-default");
                $('.submit-btn').css("display", "block");
                $('.list-item').css('display','none');
                $('.editor').css('display','block');
            } else {
                $('.editField').prop('readonly', true);
                $('.editBtn').html('<i class="fa fa-pencil"></i> Edit');
                $('.submit-btn').css("display", "none");
                $('.editBtn').addClass("btn-default");
                $('.editBtn').removeClass("btn-danger");
                $('.editField').addClass("form-control-plaintext");
                $('.editField').removeClass("form-control");
                $('.edit').addClass('col-md-12');
                $('.edit').removeClass('col-md-6');
                $('.list-item').css('display','block');
                $('.editor').css('display','none');
            }


        });

    });
</script>




