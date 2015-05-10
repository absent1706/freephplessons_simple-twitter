/* Код, связанный с проверкой длины поля ввода */
    function checkCredentialsLength() {
        var len    = this.value.length; // количество знаков в поле ввода
        var minLen = this.dataset.minLength; // аттрибут data-min-length поля ввода
        var hint   = document.getElementById(this.id + "-hint"); // элемент, где отображается нотификация для данного поля ввода
        if ((len != 0) && (len < minLen)) {
            hint.innerHTML = "поле " + this.id + " должно быть не короче " + minLen + " символов";
            this.classList.add("error");
        }
        else {
            hint.innerHTML = "";
            this.classList.remove("error");
        }
    }

    // Вешаем одну и ту же функцию на 2 поля ввода
    document.getElementById("username").onkeyup = checkCredentialsLength;
    document.getElementById("password").onkeyup = checkCredentialsLength;

/* Код, отменяющий отправку формы с некорректными данными */
    document.getElementById("registerSubmit").onclick = function(event) {
      var form = event.target.closest('form');
      if (form.getElementsByClassName('error').length != 0) {
        alert('Пожалуйста, введите корректные данные');
        event.preventDefault();
      }
    };

/* Код, добавляющий ajax-проверку уникальности вводимого email */
    function checkEmailUniqueness() {
        var params = 'action=check_email_uniqueness&email=' + encodeURIComponent(this.value);
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'api/authorize.php?' + params, true);
        xhr.send();

        xhr.onreadystatechange = function() {
            if (xhr.readyState != 4) return;
            if (xhr.status != 200) {
                console.log('Ajax failed with status ' + xhr.status + ': ' + xhr.statusText);
            } else {
                var hint = document.getElementById("email-hint");
                if (JSON.parse(xhr.responseText).result) {
                    hint.innerHTML = "";
                    document.getElementById("email").classList.remove("error");
                } else {
                    hint.innerHTML = "введенный email занят";
                    document.getElementById("email").classList.add("error");
                }                   
            }
        }
    }

    document.getElementById("email").onchange = checkEmailUniqueness; //событие change сгенерируется после того, как поле будет изменено и фокус с него будет убран