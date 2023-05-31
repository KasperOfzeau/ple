let host = "http://localhost/ple/";

$(document).on('click', '.favorite', function(e) {
    e.preventDefault();
    let user_id = $(this).attr("data-user_id");
    let photo_id = $(this).attr("data-photo_id");

    // Store the reference to the clicked element
    let clickedElement = $(this);

    // Check if the element is already favorited
    if (clickedElement.hasClass("favorited")) {
        // Call the delete function
        deleteFavorite(user_id, photo_id, clickedElement);
    } else {
        // Call the add function
        addFavorite(user_id, photo_id, clickedElement);
    }
});

function addFavorite(user_id, photo_id, clickedElement) {
    $.ajax({
        url: host + "backend/favorite.php",
        type: "POST",
        cache: false,
        data: {
            user_id: user_id,
            photo_id: photo_id
        },
        success: function(dataResult) {
            let response = JSON.parse(dataResult);

            if (response.statusCode === 200) {
                clickedElement.addClass("favorited");
            } else {
                console.log(response);
            }
        }
    });
}

function deleteFavorite(user_id, photo_id, clickedElement) {
    $.ajax({
        url: host + "backend/delete_favorite.php",
        type: "POST",
        cache: false,
        data: {
            user_id: user_id,
            photo_id: photo_id
        },
        success: function(dataResult) {
            let response = JSON.parse(dataResult);

            if (response.statusCode === 200) {
                clickedElement.removeClass("favorited");
            } else {
                console.log(response);
            }
        }
    });
}