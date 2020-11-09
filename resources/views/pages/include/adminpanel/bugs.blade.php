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
            Bug:
        </th>
        </tr>
        @foreach($bugs as $bug)
        <tr class="text-center">
        <td>
            {{ $bug->getName() }}
        </td>
        <td>
            {{ $bug->getCompanyName() }}
        </td>
        <td>
            {{ $bug->project_type }}
        </td>
        <td>
            {{ $bug->email }}
        </td>
        @if($bug->bug == true)
        <td class="incomplete">
            <a class="text-light" href="{{ route('development_center') }}">BUG</a>
        </td>
        @elseif($bug->bug == false)
        <td class="complete">
            <a class="text-light" href="{{ route('development_center') }}">!BUG</a>
        </td>
        @endif
    </tr>
    @endforeach
    </table>
</div>