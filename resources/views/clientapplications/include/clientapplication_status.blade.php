@if($clientapplication->project_status === "follow-up")
    <td class="follow-up">
@endif
@if($clientapplication->project_status === "unpaid")
    <td class="unpaid">
@endif
@if($clientapplication->project_status === "complete")
    <td class="complete">
@endif
@if($clientapplication->project_status === "urgent")
    <td class="urgent">
@endif
@if($clientapplication->project_status === "late")
    <td class="late">
@endif
@if($clientapplication->project_status === "on-time")
    <td class="on-time">
@endif
{{ strToUpper($clientapplication->project_status) }}
    </td>