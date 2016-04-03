/**
 * main.js
 *
 */

$(document).ready(function() {

    // Navigation - toggle body class when menu is active
    // $('.menu-toggle').on("click", function() {
    //     $('body').toggleClass("nav-toggled");
    // });
   
    // Hide and display comments
    var btn_comment, no_comments, comments;
    btn_comment = document.getElementById( 'btn-comment' );
    no_comments = document.getElementById( 'no-comments' );
    comments = document.getElementById( 'comments-area_no-comments' );

    btn_comment.onclick = function() {
        no_comments.style.display = "none";
        comments.style.display = "block";
    };

});
