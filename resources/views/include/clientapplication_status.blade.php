@if($clientapplication->status === "follow-up")
    <td class="follow-up">
@endif
@if($clientapplication->status === "unpaid")
    <td class="unpaid">
@endif
@if($clientapplication->status === "complete")
    <td class="complete">
@endif
@if($clientapplication->status === "urgent")
    <td class="urgent">
@endif
@if($clientapplication->status === "late")
    <td class="late">
@endif
@if($clientapplication->status === "on-time")
    <td class="on-time">
@endif
{{ strToUpper($clientapplication->status) }}