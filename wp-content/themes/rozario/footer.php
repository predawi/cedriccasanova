<?php 
    get_template_part('layouts/footer', 'defualt');
?>
<?php wp_footer(); ?>
</div>
 <!-- Overlay Search -->
    <div id="overlay-search">
        <form method="get" action="./">
            <input type="text" name="s" placeholder="Search..." autocomplete="off">
            <button type="submit">
                <i class="fa fa-search"></i>
            </button>
            <p>Begin typing and hit enter to search...</p>
        </form>
        <a href="javascript:;" class="close-search"></a>
    </div>
</body>
</html>