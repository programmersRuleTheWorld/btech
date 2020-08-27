@if($clientApplication->project_status === "follow-up")
    <td class="follow-up">
@endif
@if($clientApplication->project_status === "unpaid")
    <td class="unpaid">
@endif
@if($clientApplication->project_status === "complete")
    <td class="complete">
@endif
@if($clientApplication->project_status === "urgent")
    <td class="urgent">
@endif
@if($clientApplication->project_status === "late")
    <td class="late">
@endif
@if($clientApplication->project_status === "on-time")
    <td class="on-time">
@endif
@if($clientApplication->project_status === "refund")
    <td class="refund">
@endif
{{ strToUpper($clientApplication->project_status) }}
    </td>