<title>Alamat instansi</title>
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
								Alamat Instansi
								<!-- <span class="d-block text-muted pt-2 font-size-sm">Datatable initialized
												from HTML table</span> -->
							</h3>
						</div>

					</div>
					<div class="card-body">
						<!--begin: Search Form-->
						<!--begin::Search Form-->
						<div class="mb-12">
							<div class="row align-items-center">
								<div class="col-lg-9 col-xl-8">
									<div class="row align-items-center">
										<div class="col-md-4 my-2 my-md-0">
											<div class="input-icon">
												<input type="text" class="form-control" placeholder="Search..."
													id="kt_datatable_search_query" />
												<span><i class="flaticon2-search-1 text-muted"></i></span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end::Search Form-->
						<!--end: Search Form-->

						<!--begin: Datatable-->
						<div class="card-body">
                        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Instansi</th>
                                    <th>Alamat</th>
									<th>Telp</th>
									<th>Email</th>

                                    
                                </tr>
                            </thead>
                            <tbody>
                               
                                <tr>
                                    <td>1</td>
                                    <td>Wintddddddddddddddddddddssssssssssers</td>
                                    <td>Accountasdddsssssssssssssssssssssssant</td>
                                    <td>Winasdddddddddddddddddddddddddddddddddters</td>
                                    <td>Accountant</td>
                                   
                                </tr>

                            </tbody>
                        </table>
                    </div>
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