@extends('./../base/base')

@section('content')
	<div class="page-content">

        @if($items ?? '')
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
                        <th>Update | Delete</th>
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
			            <td class="ud">
			            	<a href="/location/{{$item->id}}/edit">
			            		<button class="btn btn-secondary">Edit</button>
			            	</a>
			            	<form action="/location/{{$item->id}}" method="DELETE" class="ml-2">
			            		<button class="btn btn-danger">Delete</button>
			            	</form>
			            </td>
			        </tr>
                @endforeach
			    </tbody>
			</table>
		</div>
        @endif

		<!-- Update Form -->
		@if ($editRecord ?? '')
		<form class="form-horizontal" action="/location/update" method="POST">
			@csrf
            <input name="_method" type="hidden" value="PUT">
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Address1">Address1(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->address1}}" id="Address1" name="Address1" maxlength="128" placeholder="Enter Address1">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Address2">Address2(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->address2}}" id="Address2" name="Address2" maxlength="128" placeholder="Enter Address2">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="AlternatePhone1">AlternatePhone1(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->alternatePhone1}}" id="AlternatePhone1" name="AlternatePhone1" maxlength="25" placeholder="Enter AlternatePhone1">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="AlternatePhone2">AlternatePhone2(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->alternatePhone2}}" id="AlternatePhone2" name="AlternatePhone2" maxlength="25" placeholder="Enter AlternatePhone2">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="City">City(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->city}}" id="City" name="City" maxlength="50" placeholder="Enter City">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CompanyID">CompanyID<span>*</span></label>
						<div class="col-sm-12">
                            <select class="form-control" value="{{$editRecord->companyID}}" id="CompanyID" name="CompanyID" required>
                                @foreach($companyIdData as $item)
                                    <option value="{{$item->id}}">{{$item->companyName }}</option>
                                @endforeach
                            </select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="CountryID">CountryID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->countryID}}" id="CountryID" name="CountryID" placeholder="Enter CountryID">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Description">Description(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->description}}" id="Description" name="Description" maxlength="500" placeholder="Enter Description">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Fax">Fax(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->fax}}" id="Fax" name="Fax" maxlength="25" placeholder="Enter Fax">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Id">Id<span>*</span></label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->id}}" id="Id" name="Id" placeholder="Enter Id" required>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="IsActive">IsActive(Optional)</label>
						<div class="col-sm-12">
							<select class="form-control" value="{{$editRecord->isActive}}" id="IsActive" name="IsActive">
								<option value=""></option>
								<option value="True" title="Yes">Yes</option>
								<option value="False" title="No">No</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="IsPrimary">IsPrimary(Optional)</label>
						<div class="col-sm-12">
							<select class="form-control" value="{{$editRecord->isPrimary}}" id="IsPrimary" name="IsPrimary">
								<option value=""></option>
								<option value="True" title="Yes">Yes</option>
								<option value="False" title="No">No</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="IsTaxExempt">IsTaxExempt(Optional)</label>
						<div class="col-sm-12">
							<select class="form-control" value="{{$editRecord->isTaxExempt}}" id="IsTaxExempt" name="IsTaxExempt">
								<option value=""></option>
								<option value="True" title="Yes">Yes</option>
								<option value="False" title="No">No</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Name">Name<span>*</span></label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->name}}" id="Name" name="Name" maxlength="100" placeholder="Enter Name" required>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="OverrideCompanyTaxSettings">OverrideCompanyTaxSettings(Optional)</label>
						<div class="col-sm-12">
							<select class="form-control" value="{{$editRecord->overrideCompanyTaxSettings}}" id="OverrideCompanyTaxSettings" name="OverrideCompanyTaxSettings">
								<option value=""></option>
								<option value="True" title="Yes">Yes</option>
								<option value="False" title="No">No</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="Phone">Phone(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->phone}}" id="Phone" name="Phone" maxlength="25" placeholder="Enter Phone">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="PostalCode">PostalCode(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->postalCode}}" id="PostalCode" name="PostalCode" maxlength="20" placeholder="Enter PostalCode">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="RoundtripDistance">RoundtripDistance(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->roundtripDistance}}" id="RoundtripDistance" name="RoundtripDistance" placeholder="Enter RoundtripDistance">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="State">State(Optional)</label>
						<div class="col-sm-12">
						  	<input type="text" class="form-control" value="{{$editRecord->state}}" id="State" name="State" maxlength="25" placeholder="Enter State">
						</div>
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label class="control-label col-sm-10" for="TaxRegionID">TaxRegionID(Optional)</label>
						<div class="col-sm-12">
						  	<input type="number" class="form-control" value="{{$editRecord->taxRegionID}}" id="TaxRegionID" name="TaxRegionID" placeholder="Enter TaxRegionID">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-12">
				  	<button type="submit" class="btn btn-success">Update</button>
                    <a href="/location/update"><button type="button" class="btn btn-warning">Return</button></a>
				</div>
			</div>
		</form>
        @else
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-12">
                    <button type="button" class="btn btn-warning" onclick="toLanding();">Return</button>
                </div>
            </div>
		@endif
	</div>
@endsection
