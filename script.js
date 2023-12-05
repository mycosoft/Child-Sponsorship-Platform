function sponsorChild(childId) {
  
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
