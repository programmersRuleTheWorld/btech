@if($clientApplication->project_status === "follow-up")
    <div class="follow-up">
@endif
@if($clientApplication->project_status === "unpaid")
    <div class="unpaid">
@endif
@if($clientApplication->project_status === "complete")
    <div class="complete">
@endif
@if($clientApplication->project_status === "urgent")
    <div class="urgent">
@endif
@if($clientApplication->project_status === "late")
    <div class="late">
@endif
@if($clientApplication->project_status === "on-time")
    <div class="on-time">
@endif
@if($clientApplication->project_status === "refund")
    <div class="refund">
@endif
{{ strToUpper($clientApplication->project_status) }}
    </div>