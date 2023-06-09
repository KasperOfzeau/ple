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

        // Array of image URLs
        let examples = [
            parsedData.example_image1,
            parsedData.example_image2,
            parsedData.example_image3,
            parsedData.example_image4
        ];

        // Create and display image elements
        let container = document.querySelector('.examples');
        examples.forEach(function(imageUrl) {
            let img = document.createElement('img');
            img.src = "/ple/gfx/objectives/examples/" + imageUrl;
            img.className = "example_image";
            container.appendChild(img);
        });

        $(".objective_id").val(parsedData.id);

        $("#loading-overlay").hide();
    });

    // Get the modal
    let modal = document.getElementById("uploadModal");

    // Get the button that opens the modal
    let btn = document.getElementById("hero-button");

    // Get the <span> element that closes the modal
    let span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    let host = "http://localhost/ple/";
    let dataResult;

    $(document).on('click', '#btn-add', function(e) {
        e.preventDefault();
        let form = $('#photo_form')[0];
        console.log(form)
        let formData = new FormData(form);
        $.ajax({
            data: formData,
            type: "post",
            url: host + "backend/objectiveUpload.php",
            contentType: false,
            processData: false,
            success: function(dataResult) {
                dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    alert('Photo added successfully!');
                    location.reload();
                } else if (dataResult.statusCode == 201) {
                    alert(dataResult);
                }
            }
        });
    });
});
