function searchRecords() {
    var searchValue = $('#searchInput').val();

    $.ajax({
        type: 'POST',
        url: 'controllers/search.php',
        data: { searchValue: searchValue },
        dataType: 'json',
        success: function (data) {
            displaySearchResults(data);
        },
        error: function (error) {
            console.log('Error:', error);
        }
    });
}

function displaySearchResults(data) {
    var searchResults = $('.search');
    var searchResultstr = $('.search tr:not(.heading)');
    var searchResultsdiv = $('.search div');
    searchResultstr.remove();
    searchResultsdiv.remove();

    $('.search').css('display','table');
    $('.defaul').css('display','none');

    if (data.length > 0) {
        for (var i = 0; i < data.length; i++) {
            var result = data[i];
            var fullName = result.fname + ' ' + result.lname;
            var email = result.email;
            var gender = result.gender;
            var id = result.id;

            var recordDiv = 
            '        <tr>    \n' +
            '            <td>'+ result.fname +'</td>\n' +
            '            <td>'+ result.lname +'</td>\n' +
            '            <td>'+ result.email +'</td>\n' +
            '            <td>'+ result.gender +'</td>\n' +
            '            <td><a href="index.php?action=edit&id='+ id +'">Edit</a></td>\n' +
            '            <td><a href="index.php?action=delete&id='+ id +'">Delete</a></td>\n' +
            '        </tr>\n'
            ;

            searchResults.append(recordDiv);

        }
    } else {

        searchResults.append('<div>No results found.</div>');
        // $('table:not(.search)').css({'display','none'});

    }
}
function isPasswordMatch() {
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();

    if (password != confirmPassword){
      $("#divCheckPassword").html("Passwords do not match!");  
      $('#add_employee_submit').attr('disabled','')
      $('#update_employee_submit').attr('disabled','')
    }else{
        $("#divCheckPassword").html("Passwords match.");
        $("#add_employee_submit").removeAttr('disabled');
        $("#update_employee_submit").removeAttr('disabled');
    }
}

$(document).ready(function () {
    $("#txtConfirmPassword").keyup(isPasswordMatch);
});
