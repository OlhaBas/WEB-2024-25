$(document).ready(function()
 {

    $('#registerForm').submit(function(e) 
    {
        e.preventDefault(); 

        const username = $('#username').val();
        const email = $('#email').val();
        const password = $('#password').val();
        const confirmPassword = $('#confirm_password').val();

        if (password !== confirmPassword) 
            {
            $('#registerError').text('Паролі не співпадають!');
            return;
        }

        $.ajax({
            url: 'server/register.php',
            type: 'POST',
            data: { username, email, password },
            dataType: 'json',
            success: function(response) 
            {
                if (response.success) 
                    {
                    alert('Реєстрація успішна!');
                    window.location.href = 'login.html';
                } else 
                {
                    $('#registerError').text(response.error);
                }
            },
            error: function() 
            {
                $('#registerError').text('Помилка сервера. Спробуйте пізніше.');
            }
        });
    });
});
