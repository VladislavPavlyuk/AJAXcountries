$(document).ready(function() {
    $('#countryForm').on('submit', function(event) {
        event.preventDefault();
        var country = $('#country').val();
        if (country) {
            $.ajax({
                url: 'process.php',
                type: 'POST',
                data: { country: country },
                success: function(data) {
                    $('#countries').empty();
                    $.each(data, function(index, value) {
                        $('#countries').append('<option>' + value + '</option>');
                    });
                }
            });
        }
    });

    // Load countries on page load
    $.ajax({
        url: 'process.php',
        type: 'POST',
        success: function(data) {
            $('#countries').empty();
            $.each(data, function(index, value) {
                $('#countries').append('<option>' + value + '</option>');
            });
        }
    });
});