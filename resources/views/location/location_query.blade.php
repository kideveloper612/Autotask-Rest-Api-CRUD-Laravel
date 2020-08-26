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
					  	<input type="text" class="form-control" id="Name" name="Name" maxlength="100" placeholder="Enter Name">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="City">City</label>
					  	<input type="text" class="form-control" id="City" name="City" maxlength="50" placeholder="Enter City">
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
						<label class="control-label" for="State">State</label>
					  	<input type="text" class="form-control" id="State" name="State" maxlength="25" placeholder="Enter State">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="PostalCode">PostalCode</label>
					  	<input type="text" class="form-control" id="PostalCode" name="PostalCode" maxlength="20" placeholder="Enter PostalCode">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="Phone">Phone</label>
					  	<input type="text" class="form-control" id="Phone" name="Phone" maxlength="25" placeholder="Enter Phone">
					</div>
				</div>
				<div class="col-3">
					<div class="form-group">
						<label class="control-label" for="isActive">isActive</label>
						<select class="form-control" id="isActive" name="isActive">
							<option value=""></option>
							<option value="True" title="Active" selected="selected">Active</option>
							<option value="False" title="Inactive">Inactive</option>
						</select>
					</div>
				</div>
			</div>
		</form>

        <!-- Show CompanyLocations -->
        <div class="table-responsive mt-4">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Company Location</th>
                    <th>Company</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>PostalCode</th>
                    <th>State</th>
                    <th>isActive</th>
                    <th>isPrimary</th>
                    <th>isTaxExempt</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{$item -> name}}</td>
                        <td>{{$item -> companyID}}</td>
                        <td>{{$item -> city}}</td>
                        <td>{{$item -> phone}}</td>
                        <td>{{$item -> postalCode}}</td>
                        <td>{{$item -> state}}</td>
                        <td>{{$item -> isActive}}</td>
                        <td>{{$item -> isPrimary}}</td>
                        <td>{{$item -> isTaxExempt}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Return to Landing Page -->
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-12">
                <button type="button" class="btn btn-warning" onclick="toLanding();">Return</button>
            </div>
        </div>
	</div>
@endsection
