@extends('layouts.navbar')
@section('content')

<body>
	<div id="booking" class="section">
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="booking-form">
						<form>
							<div class="row no-margin">
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">Destination</span>
										<input class="form-control" type="text" placeholder="Country, ZIP, city...">
									</div>
								</div>
								<div class="col-md-6">
									<div class="row no-margin">
										<div class="col-md-5">
											<div class="form-group">
												<span class="form-label">Check In</span>
												<input class="form-control" type="date" required>
											</div>
										</div>
										<div class="col-md-5">
											<div class="form-group">
												<span class="form-label">Check out</span>
												<input class="form-control" type="date" required>
											</div>
										</div>
										<div class="col-md-2">
											<div class="form-group">
												<span class="form-label">Guests</span>
												<select class="form-control">
													<option>1</option>
													<option>2</option>
													<option>3</option>
												</select>
												<span class="select-arrow"></span>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-btn">
										<button class="submit-btn">Check availability</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

@endsection
