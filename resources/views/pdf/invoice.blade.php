<!DOCTYPE html>
<html  style="font-size:.7em; text-align: center;" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<table>
    <tr>
    <td style="font-size:.75em; text-align:left;">
        New York Department of State ID #: 5659795
        </td>

        <td style="font-size:.75em; text-align:center;">
            WORK WILL NOT BEGIN UNLESS YOU READ AND SIGN SIGNATURE PAGE (LAST PAGE) AND SCAN/EMAIL TO CONTRACTS@BERTRAMTECHNOLOGIES.COM
        </td>
    </tr>
    <tr>
        <td>
            Thank you for choosing Bertram Technologies. The following Reference Identification number, herein called "Reference ID", identifies the project with which this Service Contract is associated; the Reference ID next to the Control Number should match the corresponding Reference ID within the project details. The Control Number identifies this unique contract, which was generated at precisely {{ $serviceContract->getCreatedAt() }}. Any Service Contract which supersedes another shall display the Control Number of the contract which has been superseded to the right of the current Control Number.
        </td>
        <td>
            All Breakdown Lists and their corresponding Breakdown Items and related transactions to follow are grouped together in sequential order.
        </td>
    </tr>
    <tr>
        <td>
            Control Number: {{ $serviceContract->control_number }}
            @if($serviceContract->clientApplication->serviceContracts->count() > 1)
                supersedes {{ $activeControlNumber }}
            @endif

            Reference ID: {{ $serviceContract->clientApplication->ref_id }}
        </td>
    </tr>
    ************************ Contract details will follow ************************
</table>
Client Application Details: [NOT ALL FIELDS MAY BE APPLICABLE TO YOUR PROJECT]
<table>
    <tr>
        <td>
            Reference ID: {{ $serviceContract->clientApplication->ref_id }}
        </td>
        <td>
            Project Name: {{ $serviceContract->clientApplication->project_name }}
        </td>
        <td>
            First Name: {{ $serviceContract->clientApplication->first_name }}
        </td>
        <td>
            Last Name: {{ $serviceContract->clientApplication->last_name }}
        </td>
    </tr>
    <tr>
        <td>
            Company Name: {{ $serviceContract->clientApplication->company_name }}
        </td>
        <td>
            Contact Email: {{ $serviceContract->clientApplication->email }}
        </td>
        <td>
            Contact Phone Number: {{ $serviceContract->clientApplication->phone_number }}
        </td>
        <td>
            Project Type: {{ $serviceContract->clientApplication->project_type }}
        </td>
    </tr>
    <tr>
        <td>
            Existing Site: {{ $serviceContract->clientApplication->existing_site }}
        </td>
        <td>
            Site Type: {{ $serviceContract->clientApplication->site_type }}
        </td>
        <td>
            Government Contract: {{ $serviceContract->clientApplication->gov_contract }}
        </td>
        <td>
            Desired Domain Name: {{ $serviceContract->clientApplication->domain_name }}
        </td>
    </tr>
    <tr>
        <td>
            Where Hosted: {{ $serviceContract->clientApplication->where_hosted }}
        </td>
        <td>
            Site URL: {{ $serviceContract->clientApplication->site_url }}
        </td>
        <td>
            Backend Type: {{ $serviceContract->clientApplication->backend_type }}
        </td>
        <td>
            Backend Framework: {{ $serviceContract->clientApplication->backend_framework }}
        </td>
    </tr>
    <tr>
        <td>
            Backend Framework Type: {{ $serviceContract->clientApplication->backend_framework_type }}
        </td>
        <td>
            Frontend Framework: {{ $serviceContract->clientApplication->frontend_framework }}
        </td>
        <td>
            Frontend Framework Type: {{ $serviceContract->clientApplication->frontend_framework_type }}
        </td>
        <td>
            Used a Site Builder/Platform: {{ $serviceContract->clientApplication->is_platform }}
        </td>
    </tr>
    <tr>
        <td>
            Site Builder/Platform: {{ $serviceContract->clientApplication->platform_type }}
        </td>
        <td>
            Database Type: {{ $serviceContract->clientApplication->db_type }}
        </td>
        <td>
            Test Scope: {{ $serviceContract->clientApplication->test_scope }}
        </td>
        <td>
            Security Incidents: {{ $serviceContract->clientApplication->security_incidents }}
        </td>
    </tr>
    <tr>
        <td>
            Is This a Legacy Backend?: {{ $serviceContract->clientApplication->legacy_backend_type }}
        </td>
        <td>
            New Or Existing App (for mobile apps): {{ $serviceContract->clientApplication->new_or_existing_app }}
        </td>
        <td>
            App Store: {{ $serviceContract->clientApplication->app_store }}
        </td>
        <td>
            Project Description: {{ $serviceContract->clientApplication->project_description }}
        </td>
    </tr>
    <tr>
        <td>
            Project Balance: ${{ number_format($serviceContract->clientApplication->project_balance, 2) }}
        </td>
        <td>
            Project Deposit: ${{ number_format($serviceContract->clientApplication->project_deposit, 2) }}
        </td>
        <td>
            Project Total: ${{ number_format($serviceContract->clientApplication->project_balance + $serviceContract->clientApplication->project_deposit, 2) }}
        </td>
        <td>
            Project Deposit Rate: {{ $serviceContract->clientApplication->project_deposit_rate }}
        </td>
    </tr>
    <tr>
        <td>
            Project Due Date: {{ $serviceContract->clientApplication->getDueDate() }}
        </td>
    </tr>
</table>


@foreach($breakdownLists as $breakdownList)
<hr>
<table>
    <tr>
        <th>
            Breakdown List Title
        </th>
        <th>
            Due Date
        </th>
        <th>
            Balance Payable
        </th>
        <th>
            Deposit Payable
        </th>
        <th>
            Total Payable
        </th>
        <th>
            Description
        </th>
    </tr>
        <tr>
            <td>
                {{ $breakdownList->list_title }}  
            </td>
            <td>
                {{ $breakdownList->getDueDate() }}
            </td>
            <td>
                ${{ $breakdownList->list_balance }}  
            </td>
            <td>
                ${{ $breakdownList->list_deposit }}  
            </td>    
            <td>
                ${{ number_format($breakdownList->list_balance + $breakdownList->list_deposit, 2) }}
            </td>
            <td>
                {{ $breakdownList->list_description }}
            </td>
        </tr>
        </table>
        
        @if($breakdownList->breakdownItems->count() > 0)
        <hr>
        <table>
            <tr>
                <th>
                    Breakdown Item Description
                </th>
                <th>
                    Balance Payable
                </th>
                <th>
                    Deposit Payable
                </th>
                <th>
                    Total Payable
                </th>
                <th>
                </th>
                <th>
                </th>
            </tr>
            @foreach($breakdownList->breakdownItems as $breakdownItem)
            <tr>
                <td>
                    {{ $breakdownItem->item_description }}
                </td>
                <td>
                    ${{ $breakdownItem->item_balance }}
                </td>
                <td>
                    ${{ $breakdownItem->item_deposit }}
                </td>
                <td>
                    ${{ number_format($breakdownItem->item_balance + $breakdownItem->item_deposit, 2) }}                
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>    
            @endforeach
            </table>
            @endif
            
            @if($breakdownList->transactions->count() > 0)
                <hr>
                <table>
                <tr>
                        <th>
                            Transaction Description
                        </th>
                        <th>
                            Transaction Type
                        </th>
                        <th>
                            Transaction Amount
                        </th>
                            <th>
                                Transaction DateTime
                            </th>
                        <th>
                        </th>
                        <th>
                        </th>
                    </tr>
                @foreach($breakdownList->transactions as $transaction)
                    <tr>
                        <td>
                            {{ $transaction->transaction_description }}  
                        </td>
                        <td>
                            {{ $transaction->transaction_type }}  
                        </td>
                        <td>
                            {{ number_format($transaction->transaction_amount, 2) }}
                            </td>
                            <td>
                                {{ $transaction->created_at }} 
                            </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                    
           @endforeach
        </table>        
           @endif
    @endforeach

    <table>
        <tr>
            <td>
                {!! $serviceAgreement !!}
            </td>
        </tr>
        <tr>
            <td>
                {!! $privacyPolicy !!}
            </td>
        </tr>
    </table>
    <br>
    Please sign the following affirmation: I, the undersigned, hereby attest to have read and understood the Service Agreement and Privacy Policy, the work and on which terms it is to be completed, and further attest to my agreement to such terms exactly as they are written. I further understand that this is a binding legal contract with Bertram Technologies Corporation of Albany, New York, <br><br>
                Client Name (Print): ______________________
                Client Name (Signature): ______________________
                Signed Date: ______________________<br><br>
                Contact us if you have any problems!<br>
                Mailing: PO Box 2021, Albany, NY; 12220<br>
                E-mail: contracts@bertramtechnologies.com<br>
        </body>
</html>