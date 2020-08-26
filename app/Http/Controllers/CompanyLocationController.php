<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class CompanyLocationController extends Controller
{
    protected $BASE_URL = 'https://webservices16.autotask.net/ATServicesRest/V1.0/CompanyLocations';
    protected $COMPANY_URL = 'https://webservices16.autotask.net/ATServicesRest/V1.0/Companies/';
    protected $items = array();

    /**
     * Query using params
     *
     * @param $params
     * @param null $url
     * @return array
     */
    public function Query($url){
        while (true) {
            $curlResponse = json_decode($this->CURL_Request($url, "", "GET"));
            if ($curlResponse === null) {
                break;
            }
            foreach ($curlResponse->items as $append) {
                array_push($this->items, $append);
            }
            if ($curlResponse->pageDetails->nextPageUrl === null) {
                break;
            } else {
                $url = $curlResponse->pageDetails->nextPageUrl;
            }
        }

        return $this->items;
    }

    /**
     * Loop Request
     *
     * @param $initialURL
     * @return array
     */
    public function companyLoop($initialURL) {
        $params = array(
            'search' => '{"MaxRecords":50, "filter":[{"op": "or", "items": [{"op":"eq", "field": "isActive", "value": "true"}, {"op": "noteq", "field": "isActive", "value": "false"}]}]}'
        );
        $url = $initialURL."/query?".http_build_query($params);

        return $this->Query($url);
    }

    /**
     * Query total records.
     *
     * @return array
     */
    public function initialQuery() {
        return $this->companyLoop($this->BASE_URL);
    }

    /**
     * Company List Query
     *
     * @return array
     * */
    public function companyQuery() {
        return $this->companyLoop($this->COMPANY_URL);
    }

    /**
     * Search using params
     *
     * @return void
     * */
    public function searchQuery($requestData) {
        $searchArray = array(
            array(
                "op" => "contains",
                "field" => "Name",
                "value" => $requestData['Name']
            ),
            array(
                "op" => "contains",
                "field" => "City",
                "value" => $requestData['City']
            ),
            array(
                "op" => "eq",
                "field" => "IsTaxExempt",
                "value" => $requestData['IsTaxExempt']
            ),
            array(
                "op" => "eq",
                "field" => "isPrimary",
                "value" => $requestData['isPrimary']
            ),
            array(
                "op" => "contains",
                "field" => "State",
                "value" => $requestData['State']
            ),
            array(
                "op" => "contains",
                "field" => "PostalCode",
                "value" => $requestData['PostalCode']
            ),
            array(
                "op" => "contains",
                "field" => "Phone",
                "value" => $requestData['Phone']
            ),
            array(
                "op" => "eq",
                "field" => "isActive",
                "value" => $requestData['isActive']
            )
        );

        $filter = array();
        foreach ($searchArray as $key => $value) {
            if ($value['value'] !== null) {
                array_push($filter, $value);
            }
        }

        if (empty($filter)) {
            $this->initialQuery();
        } else {
            $searchParam = array(
                'search' => json_encode(array(
                    'MaxRecords' => 50,
                    'filter' => $filter
                ))
            );
            $url = $this->BASE_URL."/query?".http_build_query($searchParam);
            $this->Query($url);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|Response|View
     */
    public function index(Request $request)
    {
        //CompanyLocation Landing Control
        $requestArray = $request->all();
        if (empty($requestArray) && empty($this->items)) {
            $this->initialQuery();
        } else if (empty($this->items)) {
            $this->searchQuery($requestArray);
        }

        return view('location/location_query') -> with('items', $this->items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        //CompanyLocation Create Control
        $companyData = array();
        foreach ($this->companyQuery() as $item) {
            array_push($companyData, array($item->id, $item->companyName));
        }
        return view('location/location_create') -> with('companyData', $companyData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        //Store New CompanyLocation Control
        $locationData = json_encode(
            array(
                "id" => '0',
                "Address1" => $request->get('Address1'),
                "Address2" => $request->get('Address2'),
                "AlternatePhone1" => $request->get('AlternatePhone1'),
                "AlternatePhone2" => $request->get('AlternatePhone2'),
                "City" => $request->get('City'),
                "CompanyID" => $request->get('CompanyID'),
                "CountryID" => $request->get('CountryID'),
                "Description" => $request->get('Description'),
                "Fax" => $request->get('Fax'),
                "Id" => $request->get('Id'),
                "IsActive" => $request->get('IsActive'),
                "IsPrimary" => $request->get('IsPrimary'),
                "IsTaxExempt" => $request->get('IsTaxExempt'),
                "Name" => $request->get('Name'),
                "OverrideCompanyTaxSettings" => $request->get('OverrideCompanyTaxSettings'),
                "Phone" => $request->get('Phone'),
                "PostalCode" => $request->get('PostalCode'),
                "RoundtripDistance" => $request->get('RoundtripDistance'),
                "State" => $request->get('State'),
                "TaxRegionID" => $request->get('TaxRegionID')
            )
        );

        $parentURL = "$this->COMPANY_URL/{$request->get('CompanyID')}/Locations";

        $this->CURL_Request($parentURL, $locationData, 'POST');
        return redirect('location');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function show($id)
    {
        //CompanyLocation Update/Delete Control
        if(empty($this->items)) {
            $this->initialQuery();
        }

        return view('location/location_update') -> with('items', $this->items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        //Company Edit Control for updating
        $editRecord = $this->getEditRecord($this->BASE_URL, $id);
        $companyIdData = $this->companyQuery();
        return view('location/location_update') -> with(array('editRecord'=>$editRecord, 'companyIdData'=>$companyIdData));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request, $id)
    {
        //Update CompanyLocation
        $updateData = json_encode(
            array(
                "Id" => $request->get('Id'),
                "Address1" => $request->get('Address1'),
                "Address2" => $request->get('Address2'),
                "AlternatePhone1" => $request->get('AlternatePhone1'),
                "AlternatePhone2" => $request->get('AlternatePhone2'),
                "City" => $request->get('City'),
                "CompanyID" => $request->get('CompanyID'),
                "CountryID" => $request->get('CountryID'),
                "Description" => $request->get('Description'),
                "Fax" => $request->get('Fax'),
                "Id" => $request->get('Id'),
                "IsActive" => $request->get('IsActive'),
                "IsPrimary" => $request->get('IsPrimary'),
                "IsTaxExempt" => $request->get('IsTaxExempt'),
                "Name" => $request->get('Name'),
                "OverrideCompanyTaxSettings" => $request->get('OverrideCompanyTaxSettings'),
                "Phone" => $request->get('Phone'),
                "PostalCode" => $request->get('PostalCode'),
                "RoundtripDistance" => $request->get('RoundtripDistance'),
                "State" => $request->get('State'),
                "TaxRegionID" => $request->get('TaxRegionID')
            )
        );

        $updateURL = "$this->COMPANY_URL/{$request->get('CompanyID')}/Locations";
        $this->CURL_Request($updateURL, $updateData, 'PUT');
        return redirect('location/update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Redirector
     */
    public function destroy(Request $request, $id)
    {
        //Delete CompanyLocation
        $companyID = $request->get('CompanyID');
        $deleteURL = "$this->COMPANY_URL$companyID/Locations/$id";
        $this->CURL_Request($deleteURL, "", 'DELETE');
        return redirect('location/delete');
    }
}
