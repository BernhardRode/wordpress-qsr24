<div class="neutral">
  <div class="container">
    <div class="row">
      <div class="col-xs-6">
        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('templates/content', 'page'); ?>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</div>

<footer class="content-info neutral" role="contentinfo">
  <?php get_template_part('templates/footer'); ?>
  <?php wp_footer(); ?>
</footer>
