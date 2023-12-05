function sponsorChild(childId) {
  
    $.ajax({
        type: 'POST',
        url: 'sponsorship.php',
        data: { childId: childId },
        dataType: 'json',
        success: function (response) {
            
            alert(response.message);
        },
        error: function (error) {
            console.error('Error:', error);
        }
    });
}
