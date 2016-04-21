<!-- Bottom of entry - Share, comment and read more -->
<div class="flex">
    
    <div class="entry-actions col col-xs-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-xl-6 offset-xl-3">

        <h4>Del og kommentér</h4>

        <!-- Share -->
        
        <div class="entry-share">

            <div class="share-buttons">
                <div class="share-button fb">
                    
                    <!-- <div class="fb-share-button" 
                        data-href="<?php //echo the_permalink(); ?>" 
                        data-layout="button">
                    </div> -->

                    <div class="fb-like"
                        data-href="<?php echo the_permalink(); ?>"
                        data-layout="button"
                        data-action="like"
                        data-show-faces="false"
                        data-share="false">
                    </div>
                </div>
                
                <div class="share-button twitter">
                    
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo the_permalink(); ?>" data-text="Skift denne titel">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                </div>
            </div>
        </div>

        <!-- Comment -->
        <div id="comment-section" class="entry-comment">
            <!-- Do not display this header on extra small screens -->
            <!-- <h4 class="entry-actions-header hidden-sm-down">Kommentér</h4> -->
            
            <?php 
            if ( comments_open() ) { ?>
                
                <?php
                // If comments, display comments + form above cta
                if ( get_comments_number() > 0 ) {
                    comments_template();
                } ?>

                <div id="comments-cta" class="comments-cta">
                    
                    <?php
                    // cta if no comments
                    if ( get_comments_number() == 0 ) { ?>
                        
                        <h5 class="cta">Ingen kommentarer endnu.<span class="hidden-md-up"><br></span> Vil du være den første?</h5>

                    <?php }
                    // cta if comments
                    else { ?>

                        <h5 class="cta">Har du også lyst til at sige noget?</h5>

                    <?php } ?>

                    <button id="btn-comment" class="btn-comment" onclick="displayComments('.post-<?php the_ID(); ?>')">Skriv kommentar</button>
                </div>

                <?php
                // If no comments, display form below cta
                if ( get_comments_number() == 0 ) {
                    comments_template();
                } ?>

            <?php } ?>

        </div>
    </div>
</div>