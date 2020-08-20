@extends('./../base/base')

@section('content')
	<div class="page-content">
		<div class="table-responsive mt-4">
			<table class="table table-bordered table-hover">
			    <thead>
			        <tr>
			            <th>Company</th>
			            <th>Parent Account</th>
			            <th>Territory</th>
			            <th>Phone</th>
			            <th>Web</th>
			            <th>State</th>
			            <th>Total Opportunity Amount</th>
			            <th>Last Activity</th>
			            <th>Company Type</th>
			            <th>Update </th>
			        </tr>
			    </thead>
			    <tbody>
			        <tr>
			            <td>John</td>
			            <td>Doe</td>
			            <td>john@example.com</td>
			            <td>john@example.com</td>
			            <td>john@example.com</td>
			            <td>john@example.com</td>
			            <td>john@example.com</td>
			            <td>john@example.com</td>
			            <td>john@example.com</td>
			            <td>
			            	<a href="/location/update/edit">
			            		<button class="btn btn-secondary">Edit</button>
			            	</a>
			            	<form action="/location/delete" method="DELETE" class="ml-2">
			            		<input type="hidden" name="contactId">
			            		<button class="btn btn-danger">Delete</button>
			            	</form>
			            </td>
			        </tr>
			    </tbody>
			</table>
		</div>

		<!-- Update Form -->
		@if ($updateData ?? '')
		<form class="form-horizontal" action="/location/update" method="PUT">
			@csrf
			<div class="form-group">
				<label class="control-label col-sm-2" for="Address1">Address1</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Address1" name="Address1" placeholder="Enter Address1">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Address2">Address2</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Address2" name="Address2" placeholder="Enter Address2">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="AlternatePhone1">AlternatePhone1</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="AlternatePhone1" name="AlternatePhone1" placeholder="Enter AlternatePhone1">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="AlternatePhone2">AlternatePhone2</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="AlternatePhone2" name="AlternatePhone2" placeholder="Enter AlternatePhone2">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="City">City</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="City" name="City" placeholder="Enter City">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CompanyID">CompanyID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CompanyID" name="CompanyID" placeholder="Enter CompanyID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CountryID">CountryID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CountryID" name="CountryID" placeholder="Enter CountryID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Description">Description</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Description" name="Description" placeholder="Enter Description">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Fax">Fax</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Fax" name="Fax" placeholder="Enter Fax">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Id">Id</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Id" name="Id" placeholder="Enter Id">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="IsActive">IsActive</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="IsActive" name="IsActive" placeholder="Enter IsActive">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="IsPrimary">IsPrimary</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="IsPrimary" name="IsPrimary" placeholder="Enter IsPrimary">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="IsTaxExempt">IsTaxExempt</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="IsTaxExempt" name="IsTaxExempt" placeholder="Enter IsTaxExempt">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Name">Name</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Name">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="OverrideCompanyTaxSettings">OverrideCompanyTaxSettings</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="OverrideCompanyTaxSettings" name="OverrideCompanyTaxSettings" placeholder="Enter OverrideCompanyTaxSettings">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Phone">Phone</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Phone" name="Phone" placeholder="Enter Phone">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="PostalCode">PostalCode</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="PostalCode" name="PostalCode" placeholder="Enter PostalCode">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="RoundtripDistance">RoundtripDistance</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="RoundtripDistance" name="RoundtripDistance" placeholder="Enter RoundtripDistance">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="State">State</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="State" name="State" placeholder="Enter State">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="TaxRegionID">TaxRegionID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="TaxRegionID" name="TaxRegionID" placeholder="Enter TaxRegionID">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
				  	<button type="submit" class="btn btn-success">Submit</button>
				  	<button type="button" class="btn btn-warning" onclick="toLanding();">Return</button>
				</div>
			</div>
		</form>
		@endif
	</div>
@endsection