<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ContactController extends Controller
{
    protected $BASE_URL = 'https://webservices16.autotask.net/ATServicesRest/V1.0/Contacts';
    protected $COMPANY_URL = 'https://webservices16.autotask.net/ATServicesRest/V1.0/Companies/';
    protected $items = array();

    /**
     * Query using params
     *
     * @return array
     * */
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
                "field" => "FirstName",
                "value" => $requestData['FirstName']
            ),
            array(
                "op" => "eq",
                "field" => "CompanyID",
                "value" => $requestData['CompanyID']
            ),
            array(
                "op" => "contains",
                "field" => "EMailAddress",
                "value" => $requestData['EMailAddress']
            ),
            array(
                "op" => "eq",
                "field" => "isPrimary",
                "value" => $requestData['isPrimary']
            ),
            array(
                "op" => "contains",
                "field" => "LastName",
                "value" => $requestData['LastName']
            ),
            array(
                "op" => "eq",
                "field" => "CountryID",
                "value" => $requestData['CountryID']
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
        //Contact Landing Control
        $requestArray = $request->all();
        if (empty($requestArray) && empty($this->items)) {
            $this->initialQuery();
        } else if (empty($this->items)) {
            $this->searchQuery($requestArray);
        }

        return view('contact/contact_query') -> with('items', $this->items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        //Contact Create Control
        $companyData = array();
        foreach ($this->companyQuery() as $item) {
            array_push($companyData, array($item->id, $item->companyName));
        }
        return view('contact/contact_create')->with('companyItems', $companyData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        //Store new Contact to api
        $contactData = json_encode(
            array(
                "Id" => '0',
                "AdditionalAddressInformation" => $request->get('AdditionalAddressInformation'),
                "AddressLine" => $request->get('AddressLine'),
                "AddressLine1" => $request->get('AddressLine1'),
                "AlternatePhone" => $request->get('AlternatePhone'),
                "City" => $request->get('City'),
                "CompanyID" => $request->get('CompanyID'),
                "CompanyLocationID" => $request->get('CompanyLocationID'),
                "CountryID" => $request->get('CountryID'),
                "EmailAddress" => $request->get('EmailAddress'),
                "EmailAddress2" => $request->get('EmailAddress2'),
                "EmailAddress3" => $request->get('EmailAddress3'),
                "Extension" => $request->get('Extension'),
                "ExternalID" => $request->get('ExternalID'),
                "FacebookUrl" => $request->get('FacebookUrl'),
                "FaxNumber" => $request->get('FaxNumber'),
                "FirstName" => $request->get('FirstName'),
                "IsActive" => $request->get('IsActive'),
                "IsOptedOutFromBulkEmail" => $request->get('IsOptedOutFromBulkEmail'),
                "LastName" => $request->get('LastName'),
                "LinkedInUrl" => $request->get('LinkedInUrl'),
                "MiddleInitial" => $request->get('MiddleInitial'),
                "MobilePhone" => $request->get('MobilePhone'),
                "NamePrefix" => $request->get('NamePrefix'),
                "NameSuffix" => $request->get('NameSuffix'),
                "Note" => $request->get('Note'),
                "ReceivesEmailNotifications" => $request->get('ReceivesEmailNotifications'),
                "Phone" => $request->get('Phone'),
                "PrimaryContact" => $request->get('PrimaryContact'),
                "RoomNumber" => $request->get('RoomNumber'),
                "State" => $request->get('State'),
                "Title" => $request->get('Title'),
                "TwitterUrl" => $request->get('TwitterUrl'),
                "ZipCode" => $request->get('ZipCode'),
                "UserDefinedFields" => $request->get('UserDefinedFields')
            )
        );

        $parentURL = "$this->COMPANY_URL/{$request->get('CompanyID')}/Contacts";
        $this->CURL_Request($parentURL, $contactData, 'POST');
        return redirect('contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function show($id)
    {
        //Contact Update Control
        if(empty($this->items)) {
            $this->initialQuery();
        }

        return view('contact/contact_update') -> with('items', $this->items);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View
     */
    public function edit($id)
    {
        //Contact Edit Control for updating
        $editRecord = $this->getEditRecord($this->BASE_URL, $id);
        $companyIdData = $this->companyQuery();
        return view('contact/contact_update') -> with(array('editRecord'=>$editRecord, 'companyIdData'=>$companyIdData));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //Update Contact
        $updateData = json_encode(
            array(
                "Id" => $request->get('Id'),
                "AdditionalAddressInformation" => $request->get('AdditionalAddressInformation'),
                "AddressLine" => $request->get('AddressLine'),
                "AddressLine1" => $request->get('AddressLine1'),
                "AlternatePhone" => $request->get('AlternatePhone'),
                "City" => $request->get('City'),
                "CompanyID" => $request->get('CompanyID'),
                "CompanyLocationID" => $request->get('CompanyLocationID'),
                "CountryID" => $request->get('CountryID'),
                "EmailAddress" => $request->get('EmailAddress'),
                "EmailAddress2" => $request->get('EmailAddress2'),
                "EmailAddress3" => $request->get('EmailAddress3'),
                "Extension" => $request->get('Extension'),
                "ExternalID" => $request->get('ExternalID'),
                "FacebookUrl" => $request->get('FacebookUrl'),
                "FaxNumber" => $request->get('FaxNumber'),
                "FirstName" => $request->get('FirstName'),
                "IsActive" => $request->get('IsActive'),
                "IsOptedOutFromBulkEmail" => $request->get('IsOptedOutFromBulkEmail'),
                "LastName" => $request->get('LastName'),
                "LinkedInUrl" => $request->get('LinkedInUrl'),
                "MiddleInitial" => $request->get('MiddleInitial'),
                "MobilePhone" => $request->get('MobilePhone'),
                "NamePrefix" => $request->get('NamePrefix'),
                "NameSuffix" => $request->get('NameSuffix'),
                "Note" => $request->get('Note'),
                "ReceivesEmailNotifications" => $request->get('ReceivesEmailNotifications'),
                "Phone" => $request->get('Phone'),
                "PrimaryContact" => $request->get('PrimaryContact'),
                "RoomNumber" => $request->get('RoomNumber'),
                "State" => $request->get('State'),
                "Title" => $request->get('Title'),
                "TwitterUrl" => $request->get('TwitterUrl'),
                "ZipCode" => $request->get('ZipCode'),
                "UserDefinedFields" => $request->get('UserDefinedFields')
            )
        );

        $updateURL = "$this->COMPANY_URL{$request->get('CompanyID')}/Contacts";
        $this->CURL_Request($updateURL, $updateData, 'PUT');
        return redirect('contact/update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function destroy(Request $request, $id)
    {
        //Delete Contact
        $companyID = $request->get('CompanyID');
        $deleteURL = "$this->COMPANY_URL$companyID/Contacts/$id";
        $this->CURL_Request($deleteURL, "", 'DELETE');
        return redirect('contact/delete');
    }
}
