@if($comment->comment_status === "update")
    <td class="complete">
@endif
@if($comment->comment_status === "bug")
    <td class="unpaid">
@endif
@if($comment->comment_status === "complete")
    <td class="complete">
@endif
@if($comment->comment_status === "cost-adjustment")
    <td class="urgent">
@endif
@if($comment->comment_status === "extension")
    <td class="late">
@endif
{{ strToUpper($comment->comment_status) }}
    </td>