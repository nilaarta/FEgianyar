<title><?php echo $title;?></title>
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-9">
                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap border-0 pt-6 pb-0">
                        <div class="card-title">
                            <h3 class="card-label">
                                <?php echo $title;?>
                                <!-- <span class="d-block text-muted pt-2 font-size-sm">Datatable initialized
												from HTML table</span> -->
                            </h3>
                        </div>

                    </div>
                    <div class="card-body">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun</th>
                                    <th>Nama</th>
                                    <th>File</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Tiger</td>
                                    <td>Nixon</td>
                                    <td>System Architect</td>
                                    <td><a href="#" class="btn btn-light-primary font-weight-bold mr-2">
                                            <img class="icon-sm"
                                                src="assets/media/svg/icons/Files/DownloadedFile.svg" /> Download PDF
                                        </a></td>
                                   
                                </tr>
                                <tr>
                                    <td>Garrett</td>
                                    <td>Winters</td>
                                    <td>Accountant</td>
                                    <td><a href="#" class="btn btn-light-primary font-weight-bold mr-2">
                                            <img class="icon-sm"
                                                src="assets/media/svg/icons/Files/DownloadedFile.svg" /> Download PDF
                                        </a></td>
                                   
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
                <!--end::Card-->
            </div>
            <?php $this->load->view('layouts/partials/side.php'); ?>
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>