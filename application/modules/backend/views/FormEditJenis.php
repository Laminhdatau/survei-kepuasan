

<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Form Edit Jenis</h3>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Edit</h2>
									
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<br />
									<form method="post" action="<?= base_url('backend/fungsiEditjenis_quisioner'); ?>/<?= $jenis->id_jenis_quisioner; ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="kuis">Kuis<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
                                                <input type="hidden" id="kuis" name="id_jenis_quisioner"  class="form-control " value="<?= $jenis->id_jenis_quisioner; ?>">
												<input type="text" id="kuis" name="jenis_quisioner" required="required" class="form-control " value="<?= $jenis->jenis_quisioner; ?>">
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="<?= base_url('backend/getJenis'); ?>" class="btn btn-primary" type="button">Cancel</a>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>

