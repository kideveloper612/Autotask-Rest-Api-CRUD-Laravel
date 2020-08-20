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
			            <th>Update | Delete</th>
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
			            	<a href="/contact/update/edit">
			            		<button class="btn btn-secondary">Edit</button>
			            	</a>
			            	<form action="/contact/delete" method="DELETE" class="ml-2">
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
		<form class="form-horizontal" action="/contact/update" method="PUT">
			@csrf
			<div class="form-group">
				<label class="control-label col-sm-2" for="AdditionalAddressInformation">AdditionalAddressInformation:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="AdditionalAddressInformation" name="AdditionalAddressInformation" placeholder="Enter AdditionalAddressInformation">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="AddressLine">AddressLine</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="AddressLine" name="AddressLine" placeholder="Enter AddressLine">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="AddressLine1">AddressLine1</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="AddressLine1" name="AddressLine1" placeholder="Enter AddressLine1">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="AlternatePhone">AlternatePhone</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="AlternatePhone" name="AlternatePhone" placeholder="Enter AlternatePhone">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="AlternatePhone2">AlternatePhone2:</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="AlternatePhone2" name="AlternatePhone2" placeholder="Enter AlternatePhone2">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ApiVendorID">ApiVendorID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ApiVendorID" name="ApiVendorID" placeholder="Enter ApiVendorID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="BulkEmailOptOutTime">BulkEmailOptOutTime</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="BulkEmailOptOutTime" name="BulkEmailOptOutTime" placeholder="Enter BulkEmailOptOutTime">
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
				<label class="control-label col-sm-2" for="CompanyLocationID">CompanyLocationID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CompanyLocationID" name="CompanyLocationID" placeholder="Enter CompanyLocationID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CountryID">CountryID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CountryID" name="CountryID" placeholder="Enter CountryID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="CreateDate">CreateDate</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="CreateDate" name="CreateDate" placeholder="Enter CreateDate">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="EMailAddress">EMailAddress</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="EMailAddress" name="EMailAddress" placeholder="Enter EMailAddress">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="EMailAddress2">EMailAddress2</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="EMailAddress2" name="EMailAddress2" placeholder="Enter EMailAddress2">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="EMailAddress3">EMailAddress3</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="EMailAddress3" name="EMailAddress3" placeholder="Enter EMailAddress3">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Extension">Extension</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Extension" name="Extension" placeholder="Enter Extension">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ExternalID">ExternalID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ExternalID" name="ExternalID" placeholder="Enter ExternalID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="FacebookUrl">FacebookUrl</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="FacebookUrl" name="FacebookUrl" placeholder="Enter FacebookUrl">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="FaxNumber">FaxNumber</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="FaxNumber" name="FaxNumber" placeholder="Enter FaxNumber">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="FirstName">FirstName</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="Enter FirstName">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Id">Id</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Id" name="Id" placeholder="Enter Id">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ImpersonatorCreatorResourceID">ImpersonatorCreatorResourceID</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ImpersonatorCreatorResourceID" name="ImpersonatorCreatorResourceID" placeholder="Enter ImpersonatorCreatorResourceID">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="IsActive">IsActive</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="IsActive" name="IsActive" placeholder="Enter IsActive">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="IsOptedOutFromBulkEmail">IsOptedOutFromBulkEmail</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="IsOptedOutFromBulkEmail" name="IsOptedOutFromBulkEmail" placeholder="Enter IsOptedOutFromBulkEmail">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="LastActivityDate">LastActivityDate</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="LastActivityDate" name="LastActivityDate" placeholder="Enter LastActivityDate">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="LastModifiedDate">LastModifiedDate</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="LastModifiedDate" name="LastModifiedDate" placeholder="Enter LastModifiedDate">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="LastName">LastName</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="LastName" name="LastName" placeholder="Enter LastName">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="LinkedInUrl">LinkedInUrl</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="LinkedInUrl" name="LinkedInUrl" placeholder="Enter LinkedInUrl">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="MiddleInitial">MiddleInitial</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="MiddleInitial" name="MiddleInitial" placeholder="Enter MiddleInitial">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="MobilePhone">MobilePhone</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="MobilePhone" name="MobilePhone" placeholder="Enter MobilePhone">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="NamePrefix">NamePrefix</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="NamePrefix" name="NamePrefix" placeholder="Enter NamePrefix">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="NameSuffix">NameSuffix</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="NameSuffix" name="NameSuffix" placeholder="Enter NameSuffix">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Note">Note</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Note" name="Note" placeholder="Enter Note">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Phone">Phone</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Phone" name="Phone" placeholder="Enter Phone">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="PrimaryContact">PrimaryContact</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="PrimaryContact" name="PrimaryContact" placeholder="Enter PrimaryContact">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ReceivesEmailNotifications">ReceivesEmailNotifications</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ReceivesEmailNotifications" name="ReceivesEmailNotifications" placeholder="Enter ReceivesEmailNotifications">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="RoomNumber">RoomNumber</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="RoomNumber" name="RoomNumber" placeholder="Enter RoomNumber">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="SolicitationOptOut">SolicitationOptOut</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="SolicitationOptOut" name="SolicitationOptOut" placeholder="Enter SolicitationOptOut">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="SolicitationOptOutTime">SolicitationOptOutTime</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="SolicitationOptOutTime" name="SolicitationOptOutTime" placeholder="Enter SolicitationOptOutTime">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="StartDate">StartDate</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="StartDate" name="StartDate" placeholder="Enter StartDate">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="State">State</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="State" name="State" placeholder="Enter State">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="SurveyOptOut">SurveyOptOut</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="SurveyOptOut" name="SurveyOptOut" placeholder="Enter SurveyOptOut">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="Title">Title</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="Title" name="Title" placeholder="Enter Title">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="TwitterUrl">TwitterUrl</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="TwitterUrl" name="TwitterUrl" placeholder="Enter TwitterUrl">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="ZipCode">ZipCode</label>
				<div class="col-sm-10">
				  	<input type="text" class="form-control" id="ZipCode" name="ZipCode" placeholder="Enter ZipCode">
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