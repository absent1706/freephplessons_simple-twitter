/* Код, связанный с проверкой длины поля ввода */
    function checkCredentialsLength() {
        var len    = $(this).val().length; // количество знаков в поле ввода
        var minLen = $(this).data('min-length'); // аттрибут data-min-length поля ввода
        var hint   = $("#" + $(this).attr('id') + "-hint"); // $(this).attr('id') , конечно, длинее, чем this.id, но здесь так написано чисто для демонстрации. Да и потом, надо везде одинаково обращаться к this
        if ((len != 0) && (len < minLen)) {
            hint.html("поле " + $(this).attr('id') + " должно быть не короче " + minLen + " символов");
            $(this).addClass("error");
        }
        else {
            hint.html("");
            $(this).removeClass("error");
        }
    }

    // Вешаем одну и ту же функцию на 2 поля ввода
    $("#username,#password").keyup(checkCredentialsLength);

/* Код, отменяющий отправку формы с некорректными данными */
    $("#registerSubmit").click(function(event) {
      var form = event.target.closest('form');
      if ($(form).find('.error').length != 0) {
        alert('Пожалуйста, введите корректные данные');
        event.preventDefault();
      }
    });

/* Код, добавляющий ajax-проверку уникальности вводимого email */
    function checkEmailUniqueness() {
        $("#email-hint").html(""); // вначале убираем сообщение об ошибке, если оно было. Чтобы человек, введя новое мыло вместо занятого, не видел сообщения об ошибке, если мыло окажется свободным.
        $("#email").removeClass("error");
        $.ajax({
            url: '/api/authorize.php',
            data: { action: "check_email_uniqueness", email: $(this).val() }, // указываем параметры в красивом виде. добрый jQuery закодирует их сам
            dataType: 'json', // благодаря этой строчке jQuery автоматически распарсит JSON ответа
            success: function (data) {
                var hint = $("#email-hint");
                if (data.result === false) { // data хранит уже распарсенный json
                    $("#email-hint").html("введенный email занят");
                    $("#email").addClass("error");                    
                }                   
            },
            error: function(xhr, status, text) {
                console.log('Ajax failed with status ' + status + '(code ' + xhr.status + '): ' + text);
            }        
        });        
    }

    $("#email").change(checkEmailUniqueness); //событие change сгенерируется после того, как поле будет изменено и фокус с него будет убран
