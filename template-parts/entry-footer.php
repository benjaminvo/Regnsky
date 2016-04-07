<!-- Bottom of entry - Share, comment and read more -->
<div class="entry-actions flex">
    
    <!-- Share -->
    <!-- <div class="entry-share col col-xs-12 col-sm-2 offset-sm-1 col-md-2 offset-md-0"> -->
    <div class="entry-share col col-xs-12 col-sm-10 offset-sm-1 col-md-2 offset-md-0 col-lg-2 col-xl-3">

        <!-- Display first header on extra small screens, second header on larger -->
        <h4 class="entry-actions-header hidden-md-up">Del og kommentér</h4>
        <h4 class="entry-actions-header hidden-sm-down">Del</h4>

        <div class="share-buttons">
            <div class="share-button fb">
                
                <div class="fb-share-button" 
                    data-href="<?php echo the_permalink(); ?>" 
                    data-layout="button">
                </div>

                <!-- <a href="#" onclick="return false;">
                    <img class="icon-fb" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-fb.svg" alt="Facebook share"><span class="h6">Del (12) <?php echo get_permalink(); ?></span>
                </a> -->
            </div>
            
            <div class="share-button twitter">
                
                <a href="https://twitter.com/share" class="twitter-share-button"{count}>Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                <!-- <a href="#" onclick="return false;">
                    <img class="icon-twitter" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-twitter.svg" alt="Twitter share"><span class="h6">Tweet (1)</span>
                </a> -->
            </div>
        </div>
    </div>

    <!-- Comment -->
    <div id="comment-section" class="entry-comment col col-xs-12 col-sm-10 offset-sm-1 col-md-8 offset-md-0 col-lg-6 col-xl-6">
        <!-- Do not display this header on extra small screens -->
        <h4 class="entry-actions-header hidden-sm-down">Kommentér</h4>
        
        <?php 
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() && get_comments_number()==0 ) : ?>
            
            <div id="no-comments" class="no-comments-yet">
                
                <!-- Små skærmstørrelsen: To linjer -->
                <h5 class="no-comments-cta hidden-md-up">Ingen kommentarer endnu.<br>Vil du være den første?</h5>
                <!-- Store skærmstørrelsen: Én linje -->
                <h5 class="no-comments-cta hidden-sm-down">Ingen kommentarer endnu. Vil du være den første?</h5>

                <button id="btn-comment" class="btn-neutral">Skriv kommentar</button>
            </div>

            <div id="comments-area_no-comments">
                <?php comments_template(); ?>
            </div>
        <?php endif; ?>

        <?php 
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() && get_comments_number() > 0 ) : ?>

            <div id="comments-area_comments">
                <?php comments_template(); ?>
            </div>
        <?php endif; ?>

    </div>
</div>