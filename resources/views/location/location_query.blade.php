@extends('./../base/base')

@section('content')
	<div class="page-content">
		<form action="/location" method="GET">
			@csrf
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
						<label class="control-label" for="Name">Name</label>
					  	<input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Name">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="City">City</label>
					  	<input type="text" class="form-control" id="City" name="City" placeholder="Enter City">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="IsTaxExempt">IsTaxExempt</label>
						<select class="form-control" id="IsTaxExempt" name="IsTaxExempt">
							<option value=""></option>
							<option value="True" title="Yes">Yes</option>
							<option value="False" title="No">No</option>
						</select>
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
						<label class="control-label" for="City">City</label>
					  	<input type="text" class="form-control" id="City" name="City" placeholder="Enter Last Name">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="PostalCode">PostalCode</label>
					  	<input type="text" class="form-control" id="PostalCode" name="PostalCode" placeholder="Enter PostalCode">
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