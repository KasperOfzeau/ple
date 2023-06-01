$(document).ready(function() {

    $(document).on('click','.highlight-img',function(e) {
        let id = $(this).attr("data-id");
        let photo = $(this).attr("data-photo");
        let title = $(this).attr("data-title");
        let name = $(this).attr("data-name");
        let favorites = $(this).attr("data-favorites");
        
        $('.modal-link').attr("href", "/ple/objective.php?id=" + id);
        $('#modal-img').attr("src", "/ple/gfx/objectives/photos/" + photo);
        $('#modal-title').html(title);
        $('#modal-name').html("Made by: " + name);
        $('#modal-favorites-count').html("Favorites: " + favorites);
        $('#highlight-modal').css('display', 'block');
    });

    // When the user clicks on <span> (x), close the modal
    $('.close').click(function() {
        $('#highlight-modal').css('display', 'none');
    });
});