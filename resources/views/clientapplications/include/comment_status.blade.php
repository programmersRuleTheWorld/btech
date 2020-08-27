@if($clientApplicationComment->comment_status === "update")
    <td class="complete">
@endif
@if($clientApplicationComment->comment_status === "bug")
    <td class="unpaid">
@endif
@if($clientApplicationComment->comment_status === "complete")
    <td class="complete">
@endif
@if($clientApplicationComment->comment_status === "cost-adjustment")
    <td class="urgent">
@endif
@if($clientApplicationComment->comment_status === "extension")
    <td class="late">
@endif
{{ strToUpper($clientApplicationComment->comment_status) }}
    </td>