<!-- Bottom of entry - Share, comment and read more -->
<div class="entry-actions row">
    
    <!-- Share -->
    <div class="entry-share col-sm-3">
        <!-- Display first header on extra small screens, second header on larger -->
        <h4 class="entry-actions-header visible-xs">Del og kommentér</h4>
        <h4 class="entry-actions-header hidden-xs">Del</h4>

        <div class="share-buttons">
            <div class="fb">
                
                <div class="fb-share-button" 
                    data-href="<?php echo the_permalink(); ?>" 
                    data-layout="button">
                </div>

                <!-- <a href="#" onclick="return false;">
                    <img class="icon-fb" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-fb.svg" alt="Facebook share"><span class="h6">Del (12) <?php echo get_permalink(); ?></span>
                </a> -->
            </div>
            
            <div class="twitter">
                
                <a href="https://twitter.com/share" class="twitter-share-button"{count}>Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                <!-- <a href="#" onclick="return false;">
                    <img class="icon-twitter" src="<?php echo get_stylesheet_directory_uri(); ?>/img/icon-twitter.svg" alt="Twitter share"><span class="h6">Tweet (1)</span>
                </a> -->
            </div>
        </div>
    </div>

    <!-- Comment -->
    <div id="comment-section" class="entry-comment col-sm-9">
        <!-- Do not display this header on extra small screens -->
        <h4 class="entry-actions-header hidden-xs">Kommentér</h4>
        
        <?php 
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() && get_comments_number()==0 ) : ?>
            
            <div id="no-comments" class="no-comments-yet">
                <p class="text-sub text-mute">Ingen kommentarer endnu. Vil du være den første?</p>

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