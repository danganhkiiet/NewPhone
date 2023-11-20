@extends('layout')
@section('content')
    
<div class="app-content main-content mt-0">
        <div class="side-app">
            <!-- CONTAINER -->
            <div class="main-container container-fluid">
                <!-- PAGE-HEADER -->
                <div class="page-header">
                    <div>
                        <h1 class="page-title">Thông số điện thoại</h1>
                    </div>
                    <div class="ms-auto pageheader-btn">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Thông số</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
                        </ol>
                    </div>
                </div>
                <!-- PAGE-HEADER END -->
						<!-- row -->
							<div class="row">
								<div class="col-lg-12 col-md-12">
									<div class="card">
										<div class="card-header border-bottom">
											<h3 class="card-title">Thêm mới</h3>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-md-10 col-lg-8 col-xl-6 mx-auto d-block">
													<div class="card card-body pd-20 pd-md-40 border shadow-none">
														<h4 class="card-title">Nhập thông tin sản phẩm</h4>
														<div class="form-group">
															<label class="form-label" for="card-name">Name on Card</label>
															<input class="form-control" id="card-name" type="text" placeholder="Enter Your Name" required>
														</div>
														<div class="form-group">
															<label class="form-label" for="ssnMask-card">Card Number</label>
															<div class="main-parent">
																<input class="form-control" id="ssnMask-card" placeholder="xxxx - xxxx - xxxx" type="text" required>
																<div class="d-flex main-child">
																	<img alt="visa" src="../assets/images/pngs/visa.png">
																	<img alt="mastercard" src="../assets/images/pngs/mastercard.png">
																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="row row-sm">
																<div class="col-sm-9">
																	<label class="form-label">Expiration Date</label>
																	<div class="row row-sm">
																		<div class="col-sm-7 mb-3">
																			<select class="form-control select2 form-select" data-placeholder="month">
																				<option label="Choose one"></option>
																				<option value="January">January</option>
																				<option value="February">February</option>
																				<option value="March">March</option>
																				<option value="April">April</option>
																				<option value="May">May</option>
																			</select>
																		</div>
																		<div class="col-sm-5 mb-3">
																			<select class="form-control select2 form-select" data-placeholder="year">
																				<option label="Choose one"></option>
																				<option value="2018">2018</option>
																				<option value="2019">2019</option>
																				<option value="2020">2020</option>
																				<option value="2021">2021</option>
																				<option value="2022">2022</option>
																			</select>
																		</div>
																	</div>
																</div>
																<div class="col-sm-3">
																	<label class="form-label" for="ssnMask-cvv">CVV</label>
																	<input class="form-control" id="ssnMask-cvv" placeholder="xxx" type="text" required>
																</div>
															</div>
														</div>
														<div class="form-group">
															<label class="ckbox"><input checked type="checkbox">
																<span>Save my card for future purchases</span>
															</label>
														</div>
														<button class="btn btn-primary btn-block">Complete Payment</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<!-- /row -->
        </div>
    </div>
</div>
@endsection
