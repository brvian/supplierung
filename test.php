<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Multiple Languages with Jquery and Json</title>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
    var arrLang = {
            'de': {
              'home': 'Home',
              'stunde': 'Stunde:',
              'datum': 'Datum:',
              'klasse': 'Klasse:'
              'vertretung': 'Vertretung:',
              'abwesend': 'Abwesend:',
              'raum': 'Raum:',
              'status': 'Art der Supplierung:',
              'logout': 'Logout',
              'anlegen': 'Anlegen'
            },
            'al': {
              'home': 'Homu',
              'stunde': 'Ora:',
              'datum': 'Data:',
              'klasse': 'Klasa:'
              'vertretung': 'Zëvendëson:',
              'abwesend': 'Mungon:',
              'raum': 'Dhoma:',
              'status': 'Lloji i zëvendësimit:',
              'logout': 'Çkyçu',
              'anlegen': 'Dërgo'
            }
          };

          // Process translation
          $(function() {
            $('.translate').click(function() {
              var lang = $(this).attr('id');

              $('.lang').each(function(index, item) {
                $(this).text(arrLang[lang][$(this).attr('key')]);
              });
            });
          });
  </script>
</head>
<body>
  <button id="en" class="translate">English</button>
  <button id="al" class="translate">Albanian</button>

  <ul>
    <li class="lang" key="home">Home</li>
    <li class="lang" key="about">About Us</li>
    <li class="lang" key="contact">Contact Us</li>
  </ul>
  <p class="lang" key="desc">This is my description</p>

  <br>
  <p>
    Response Video: 
    <a href="https://www.youtube.com/watch?v=Tjt_u_OSh40">
      https://www.youtube.com/watch?v=Tjt_u_OSh40
    </a>
  </p>
</body>
</html>