<h2><?php echo $title; ?></h2>

<!-- フォームバリデーションを行う。戻されたすべてのエラーメッセージを返す。 -->
<?php echo validation_errors(); ?>

<!-- フォームのアクション先のURLを設定 -->
<?php echo form_open('news/create'); ?>

<label for="title">Title</label>
<input type="text" name="title" /><br />

<label for="title">Text</label>
<textarea name="text"></textarea><br />

<input type="submit" name="submit" value="Create news item" />

</form>