/**
 * main.js
 *
 */

( function() {
    
    // Hide and display comments
    var btn_comment, no_comments, comments;
    btn_comment = document.getElementById( 'btn-comment' );
    no_comments = document.getElementById( 'no-comments' );
    comments = document.getElementById( 'comments' );

    btn_comment.onclick = function() {
        no_comments.style.display = "none";
        comments.style.display = "block";
    };

} )();
