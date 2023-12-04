function sponsorChild(childId) {
    // Use AJAX to send the child ID to the PHP script for sponsorship handling
    $.ajax({
        type: 'POST',
        url: 'sponsorship.php',
        data: { childId: childId },
        dataType: 'json',
        success: function (response) {
            // Display a confirmation message (replace with your own UI logic)
            alert(response.message);
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
}
