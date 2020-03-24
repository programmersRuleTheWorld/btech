<div class="table-responsive">
<table class="table table-borderless table-sm table-hover table-condensed">

    <div class="col-md-6 m-1 ml-auto">
        <div class="text-success text-center bg-dark">
            Project balance: ${{ $clientapplication->project_balance }}
        </div>
    </div>
        <tr>
            <td>
                <b>Status:</b>
            </td>
                @include('clientapplications.include.clientapplication_status')
        </tr>
        <tr>
                <td>
                    <b>Reference Identification Number:</b>
                </td>
                <td>
                    {{ $clientapplication->ref_id }}
                </td>
            </tr>
        <tr>
                <td>
                    <b>Client Name:</b>
                </td>
                <td>
                    {{ $clientapplication->name }}
                </td>
            </tr>
        <tr>
                <td>
                    <b>Client Company:</b>
                </td>
                <td>
                    {{ $clientapplication->company }}
                </td>
            </tr>
        <tr>
                <td>
                    <b>Email:</b>
                </td>
                <td>
                    {{ $clientapplication->email }}
                </td>
            </tr>
        <tr>
                <td>
                    <b>Client Phone Number:</b>
                </td>
                <td>
                    {{ $clientapplication->number }}
                </td>
            </tr>
        <tr>
                <td>
                    <b>Service Type:</b>
                </td>
                <td>
                    {{ $clientapplication->selection }}
                </td>
            </tr>
        <tr>
                <td>
                    <b>Project Description:</b>
                </td>
                <td>
                    {{ $clientapplication->project }}
                </td>
            </tr>
        </table>
    </div>
    <div class="row ml-2">
        <a href="/dashboard" class="btn btn-dark text-info m-1">Back</a>
        <a href="/clientapplications/{{$clientapplication->ref_id}}/edit" class="btn btn-dark text-info m-1">Edit</a>
    </div>