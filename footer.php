</div><!-- Row End -->
</div><!-- Container End -->


<div class="full-width footer-widget">
    <div class="row">
        <?php dynamic_sidebar("Footer"); ?>
    </div>
</div>

<footer class="full-width" role="contentinfo">
    <div class="row">
        <div class="large-12 columns">
            <?php wp_nav_menu(array('theme_location' => 'utility', 'container' => false, 'menu_class' => 'inline-list')); ?>
        </div>
    </div>
    <div class="row love-reverie">
        <div class="large-12 columns">
            <p>&copy; <?php echo date('Y'); ?> <a href="http://uthsc.edu" rel="nofollow" title="University of Tennessee Health Science Center">University of Tennessee Health Science Center</a>.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<a class="exit-off-canvas"></a>
</div><!-- Inner Wrap End -->
</div><!-- Off Canvas Wrap End -->


<script>
    (function($) {
        $(document).foundation();
    })(jQuery);
</script>

</body>
</html>