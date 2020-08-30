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
                        <table id="tables"
                            class="table table-striped table-bordered nowrap dataTable no-footer dtr-inline collapsed"
                            style="width: 100%;" role="grid" aria-describedby="example_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        style="width: 69px;" aria-sort="ascending"
                                        aria-label="First name: activate to sort column descending">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        style="width: 68px;" aria-label="Last name: activate to sort column ascending">
                                        Tahun</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        style="width: 165px; display: none;"
                                        aria-label="Position: activate to sort column ascending">Nama</th>
                                    <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1"
                                        style="width: 0px; display: none;"
                                        aria-label="Office: activate to sort column ascending">File</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr role="row" class="odd">
                                    <td class="sorting_1 dtr-control" style="">1</td>
                                    <td>2017</td>
                                    <td >Laporan Lakip 2017</td>
                                    <td ><a href="#" class="btn btn-light-primary font-weight-bold mr-2">
                                            <img class="icon-sm"
                                                src="assets/media/svg/icons/Files/DownloadedFile.svg" /> Download PDF
                                        </a></td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="sorting_1 dtr-control" style="">2</td>
                                    <td>2018</td>
                                    <td >Laporan Lakip 2017</td>
                                    <td ><a href="#" class="btn btn-light-primary font-weight-bold mr-2">
                                            <img class="icon-sm"
                                                src="assets/media/svg/icons/Files/DownloadedFile.svg" /> Download PDF
                                        </a></td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="sorting_1 dtr-control" style="">3</td>
                                    <td>201</td>
                                    <td >Laporan Lakip 2017</td>
                                    <td ><a href="#" class="btn btn-light-primary font-weight-bold mr-2">
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
    $(document).ready(function () {
        $('#tables').DataTable({
            responsive: true
        });
    });
</script>