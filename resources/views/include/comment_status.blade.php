@if($comment->status === "update")
    <div class="complete">
@endif
@if($comment->status === "bug")
    <div class="unpaid">
@endif
@if($comment->status === "complete")
    <div class="complete">
@endif
@if($comment->status === "cost-adjustment")
    <div class="urgent">
@endif
@if($comment->status === "extension")
    <div class="late">
@endif
{{ strToUpper($comment->status) }}
