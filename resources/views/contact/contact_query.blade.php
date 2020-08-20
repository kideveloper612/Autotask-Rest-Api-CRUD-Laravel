@extends('./../base/base')

@section('content')
	<div class="page-content">
		<form action="/contact" method="GET">
			@csfr
			<div class="row">
				<div class="col-12">
					<div class="form-group pull-right">
						<a href="/company/create"><button type="button" class="btn btn-secondary">New</button></a>
						<button type="submit" class="btn btn-info">Search</button>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="fisrtName">First Name</label>
					  	<input type="text" class="form-control" id="fisrtName" name="fisrtName" placeholder="Enter First Name">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="company">Company</label>
					  	<input type="text" class="form-control" id="company" name="company" placeholder="Enter Company">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="email">Email</label>
					  	<input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="isPrimary">Is Primary</label>
						<select class="form-control" id="isPrimary" name="isPrimary">
							<option value=""></option>
							<option value="True" title="Yes">Yes</option>
							<option value="False" title="No">No</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="lastName">Last Name</label>
					  	<input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter Last Name">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="parentAccount">Parent Account</label>
					  	<input type="text" class="form-control" id="parentAccount" name="parentAccount" placeholder="Enter Parent Account">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="phone">Phone</label>
					  	<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="active">Active</label>
						<select class="form-control" id="active" name="active">
							<option value=""></option>
							<option value="True" title="Active" selected="selected">Active</option>
							<option value="False" title="Inactive">Inactive</option>
						</select>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection