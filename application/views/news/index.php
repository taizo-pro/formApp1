<h2><?php echo $title; ?></h2>

<!-- 繰り返し処理の記述 -->
<?php foreach ($news as $news_item) : ?>

    <h3><?php echo $news_item['$title']; ?></h3>
    <div class="main">
        <?php echo $news_item['text']; ?>
    </div>
    <!-- URLヘルパー使用 -->
    <p><a href="<?php echo site_url('news/' . $news_item['slug']); ?>">View article</a></p>

<?php endforeach; ?>