<?php
/* Осуществляем проверку вводимых данных и их защиту от враждебных 
скриптов */
$your_name = htmlspecialchars($_POST["name"]);
$phone = htmlspecialchars($_POST["tel"]);
$email = htmlspecialchars($_POST["mail"]);
$message = htmlspecialchars($_POST["text"]);
/* Устанавливаем e-mail адресата */
$myemail = "serega.lypnik@gmail.com";
/* Проверяем заполнены ли обязательные поля ввода, используя check_input 
функцию */
$your_name = check_input($_POST["name"], "Введите ваше имя!");
$email = check_input($_POST["mail"], "Введите ваш e-mail!");
$message = check_input($_POST["text"], "Вы забыли написать сообщение!");
/* Проверяем правильно ли записан e-mail */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("<br /> Е-mail адрес не существует");
}
/* Создаем новую переменную, присвоив ей значение */
$message_to_myemail = "Сообщение с первой формы. 
Имя отправителя: $your_name 
Телефон: $phone
E-mail: $email 
Текст сообщения: $message 
Конец";
/* Отправляем сообщение, используя mail() функцию */
$from  = "From: $your_name <$email> \r\n"; 
mail($myemail, $from, $message_to_myemail);
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,500,500i,700,700i,900&amp;subset=cyrillic" rel="stylesheet">
    <style type="text/css">
        body{
            font-family: 'Roboto', sans-serif;
            color: #434750;
            background-image: url('images/logow.png');
            -webkit-background-size: contain;
            background-size: contain;
            background-position: 50% 50%;
            background-repeat: no-repeat;
        }

        html{
            height: 100%;
        }

        p{
            text-align: center;
            font-size: 19px;
            font-weight: 300;
            color: #434750;
        }

        h1{
            font-size: 27px;
            text-align: center;
            font-weight: 500;
            font-style: italic;
            color: #434750;
        }

        a{
            text-align: center;
            font-size: 19px;
            font-weight: 300;
            color: #0071bc;
            font-style: italic;
        }
        .divider{
            width: 60px;
            border-bottom: 3px solid #0071bc;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        img{
            margin: 0 auto;
            margin-top: 50px;
        }
    </style>
</head>
<body>
<a href="index.html"><img src="images/logo/logo.png" style="width: 260px; height: 70px; display: block;"></a>
<h1>Ваши данные успешно отправлены!</h1>
<div class="divider"></div>
<p>Мы свяжемся с Вами в ближайшее время.</p>
<p>На <a href="index.html">главную >>></a></p>
</body>
</html>

<?php
/* Если при заполнении формы были допущены ошибки сработает 
следующий код: */
function check_input($data, $problem = "")
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}
function show_error($myError)
{
?>
<html>
<body>
<p>Пожалуйста исправьте следующую ошибку:</p>
<?php echo $myError; ?>
</body>
</html>
<?php
exit();
}
?>