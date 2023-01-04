
<?php $value = \App\Models\Websitetable::first()->footer_text; ?>

<footer class="footer">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-md-12 col-sm-12 text-center"> {{$value}} </div>
        </div>
    </div>
</footer>

<!-- JQuery min js -->
<script src="{{ asset('assets_admin/js/jquery-3.2.1.min.js') }}"></script>

<!-- JQuery Sparkline js -->
<script src="{{ asset('assets_admin/js/jquery.sparkline.min.js') }}"></script>

<!-- Selectize min js -->
<script src="{{ asset('assets_admin/js/selectize.min.js') }}"></script>

<!-- JQuery Tablesorter js -->
<script src="{{ asset('assets_admin/js/jquery.tablesorter.min.js') }}"></script>

<!-- Circle Progress js -->
<script src="{{ asset('assets_admin/js/circle-progress.min.js') }}"></script>

<!-- Star Rating js -->
<script src="{{ asset('assets_admin/plugins/rating/jquery.rating-stars.js') }}"></script>

<!--Bootstrap.min js-->
<script src="{{ asset('assets_admin/plugins/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('assets_admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Side menu js -->
<script src="{{ asset('assets_admin/plugins/side-menu/js/sidemenu.js') }}"></script>

<!-- Custom scroll bar Js-->
<script src="{{ asset('assets_admin/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

<!--Nice Select -->
<script src="{{ asset('assets_admin/plugins/nice-select/js/jquery.nice-select.js') }}"></script>

<!--Nice Select -->
<script src="{{ asset('assets_admin/plugins/nice-select/js/jquery.nice-select.js') }}"></script>

<!-- peitychart -->
<script src="{{ asset('assets_admin/plugins/peitychart/jquery.peity.min.js') }}"></script>

<!-- Data tables -->
<script src="{{ asset('assets_admin/plugins/Datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets_admin/plugins/Datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets_admin/plugins/Datatable/js/dataTables.buttons.min.js') }}"></script>                
<script src="{{ asset('assets_admin/plugins/Datatable/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets_admin/plugins/Datatable/js/jszip.min.js') }}"></script>                
<script src="{{ asset('assets_admin/plugins/Datatable/js/pdfmake.min.js') }}"></script>                
<script src="{{ asset('assets_admin/plugins/Datatable/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets_admin/plugins/Datatable/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets_admin/plugins/Datatable/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets_admin/plugins/Datatable/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets_admin/plugins/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets_admin/plugins/datatable/responsive.bootstrap4.min.js') }}"></script>

<!-- Data table js -->
<script src="{{ asset('assets_admin/js/datatable.js') }}"></script>

<!--Counters -->
<script src="{{ asset('assets_admin/plugins/counters/counterup.min.js') }}"></script>
<script src="{{ asset('assets_admin/plugins/counters/waypoints.min.js') }}"></script>

<!-- Sidebar js -->
<script src="{{ asset('assets_admin/plugins/sidebar/sidebar.js') }}"></script>

<!--Sticky js -->
<script src="{{ asset('assets_admin/js/sticky.js') }}"></script>

<!--Nice Select -->
<script src="{{ asset('assets_admin/plugins/nice-select/js/jquery.nice-select.js') }}"></script>

<!-- custom js -->
<script src="{{ asset('assets_admin/js/custom.js') }}"></script>

<!-- file uploads js -->
<script src="{{ asset('assets_admin/plugins/fileuploads/js/dropify.js') }}"></script>
<script src="{{ asset('assets_admin/plugins/fileuploads/js/dropify-demo.js') }}"></script>

<!-- Chart js -->
<script src="{{ asset('assets_admin/plugins/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets_admin/plugins/chart.js/chart.extension.js') }}"></script>

<!-- Custom-->
<script src="{{ asset('assets_admin/js/index4.js') }}"></script>

<!-- WYSIWYG Editor js -->
<script src="{{ asset('assets_admin/plugins/wysiwyag/jquery.richtext.js') }}"></script>
<script src="{{ asset('assets_admin/plugins/wysiwyag/richText1.js') }}"></script>

        
<script>
$(document).on('click', '#delete', function(){
	var result = confirm('Are you sure you want to Delete?');
    if(!result){
    	return false;
    }
})


</script>