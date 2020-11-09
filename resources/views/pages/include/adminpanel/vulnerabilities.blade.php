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
            Vulnerability:
        </th>
        </tr>
        @foreach($vulnerabilities as $vulnerability)
        <tr class="text-center">
        <td>
            {{ $vulnerability->getName() }}
        </td>
        <td>
            {{ $vulnerability->getCompanyName() }}
        </td>
        <td>
            {{ $vulnerability->project_type }}
        </td>
        <td>
            {{ $vulnerability->email }}
        </td>
        @if($vulnerability->vulnerability == true)
        <td class="incomplete">
            <a class="text-light" href="{{ route('development_center') }}">VULNERABILITY</a>
        </td>
        @elseif($vulnerability->vulnerability == false)
        <td class="complete">
            <a class="text-light" href="{{ route('development_center') }}">!VULNERABILITY</a>
        </td>
        @endif
    </tr>
    @endforeach
    </table>
</div>