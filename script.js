
    $(document).ready(function() {
    $('#countryForm').on('submit', function(e) {
        e.preventDefault();
        var country = $('#countryInput').val().trim();
        if (country) {
            $.ajax({
                url: 'process.php',
                type: 'POST',
                data: { country: country },
                success: function(response) {
                    if (response) {
                        $('#countrySelect').html(response);
                    } else {
                        alert('Country already exists or is invalid.');
                    }
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