<?php 
$comments = get_comments('post_id='.get_the_ID());

foreach ($comments as $comment) {
?>
  <span class="comment-content"><?php echo $comment->comment_content; ?></span>
  <span class="comment-author"><?php echo $comment->comment_author; ?></span>
<?php
}
?>
<div id="comment-leave">
  <a href="#">Kommentoi</a>
</div>
