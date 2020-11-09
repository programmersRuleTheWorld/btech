<div class="table-responsive">
    <table class="table table-condensed table-borderless">
        <tr class="text-center">
        <th>
            Client Name:
        </th>
        <th>
            Company Name:
        </th>
        <th>
            Service Type:
        </th>
        <th>
            Contact E-mail:
        </th>
        <th>
            Support:
        </th>
        </tr>
        @foreach($supports as $support)
        <tr class="text-center">
        <td>
            {{ $support->getName() }}
        </td>
        <td>
            {{ $support->getCompanyName() }}
        </td>
        <td>
            {{ $support->project_type }}
        </td>
        <td>
            {{ $support->email }}
        </td>
        @if($support->support == true)
        <td class="incomplete">
            <a class="text-light" href="{{ route('development_center') }}">SUPPORT</a>
        </td>
        @elseif($support->support == false)
        <td class="complete">
            <a class="text-light" href="{{ route('development_center') }}">!SUPPORT</a>
        </td>
        @endif
    </tr>
    @endforeach
    </table>
</div>