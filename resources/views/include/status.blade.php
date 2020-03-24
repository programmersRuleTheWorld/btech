@if($job->project_status === "follow-up")
    <td class="follow-up">
@endif
@if($job->project_status === "unpaid")
    <td class="unpaid">
@endif
@if($job->project_status === "complete")
    <td class="complete">
@endif
@if($job->project_status === "urgent")
    <td class="urgent">
@endif
@if($job->project_status === "late")
    <td class="late">
@endif
@if($job->project_status === "on-time")
    <td class="on-time">
@endif
{{ strToUpper($job->project_status) }}
    </td>