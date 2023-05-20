$( document ).ready(function() {

    $("#loading-overlay").show();

    // Get ID from URL
    let url_str = window.location.href;
    let url = new URL(url_str);
    let search_params = url.searchParams; 
    let id = search_params.get('id');

    $.ajax({
        url : 'backend/getObjective.php',
        data: {id: id},
        type: 'POST'
    }).done(function(data) {
        let parsedData = JSON.parse(data);

        // Set title page
        let newTitle = "Objective | " + parsedData.title;
        if (document.title != newTitle) {
            document.title = newTitle;
        }

        // Set page content
        $('.hero-title').html(parsedData.title);   
        $('.hero-description').html(parsedData.description);
        $('.hero').css('background-image', 'linear-gradient(90deg, rgba(0, 0, 0, 0.6) 36.22%, rgba(0, 0, 0, 0) 100%),' + 'url(gfx/objectives/thumbnails/' + parsedData.thumbnail + ')');

        // Set remaining time
        const targetDateTime = new Date(parsedData.end_time);
        const currentDate = new Date();
        const timeDifference = targetDateTime.getTime() - currentDate.getTime();

        if (timeDifference <= 0) {
            $('.hero-subtitle').html("Time is over");
        } else {
            if (timeDifference < 24 * 60 * 60 * 1000) {
                // Less than 1 day remaining
                const remainingHours = Math.floor(timeDifference / (1000 * 60 * 60));
                const remainingMinutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                $('.hero-subtitle').html(`${remainingHours} hours and ${remainingMinutes} minutes left`);
            } else {
                // More than or equal to 1 day remaining
                const remainingDays = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));
                $('.hero-subtitle').html(remainingDays + " days left");
            }
        }

        $('.instructions').html(parsedData.instructions);   

        $("#loading-overlay").hide();
    });
});
