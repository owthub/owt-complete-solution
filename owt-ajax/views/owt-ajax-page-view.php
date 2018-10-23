<h3>Welcome to Online Ajax View</h3>

<button id="btn-get-all-posts">Click to get All Posts</button>

<script>
    jQuery(function () {

        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";

        jQuery("#btn-get-all-posts").on("click", function () {

            var postdata = "action=owt_ajax_lib&param=get_all_posts";
            jQuery.post(ajaxurl, postdata, function (response) {

                console.log(response);
            });

        });

    });
</script>