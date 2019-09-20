@if($job->status === "follow-up")
    <td class="follow-up">
@endif
@if($job->status === "unpaid")
    <td class="unpaid">
@endif
@if($job->status === "complete")
    <td class="complete">
@endif
@if($job->status === "urgent")
    <td class="urgent">
@endif
@if($job->status === "late")
    <td class="late">
@endif
@if($job->status === "on-time")
    <td class="on-time">
@endif
{{ strToUpper($job->status) }}