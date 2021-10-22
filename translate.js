var arrLang = {
    'de': {
        'addsup': 'Supplierung hinzufügen',
        'addlehrer': 'Lehrer hinzufügen',

        'stunde': 'Stunde:',
        'datum': 'Datum:',
        'klasse': 'Klasse:',
        'vertretung': 'Vertretung:',
        'abwesend': 'Abwesend:',
        'raum': 'Raum:',
        'status': 'Art der Supplierung:',
        'logout': 'Logout',
        'anlegen': 'Anlegen',

        'kuerzel': 'Kuerzel:',
        'vorname': 'Vorname:',
        'nachname': 'Nachname:',
        'rolle': 'Rolle:',
        'email': 'E-Mail:',
        'password': 'Passwort:',
        'sprache': 'Sprache:'
    },
    'al': {
        'addsup': 'Shto orë zëvendësimi',
        'addlehrer': 'Shto mësues',

        'stunde': 'Ora:',
        'datum': 'Data:',
        'klasse': 'Klasa:',
        'vertretung': 'Mungon:',
        'abwesend': 'Zëvendëson:',
        'raum': 'Dhoma:',
        'status': 'Lloji i zëvendësimit:',
        'logout': 'Çkyçu',
        'anlegen': 'Dërgo',

        'kuerzel': 'Shkurtimi:',
        'vorname': 'Emri:',
        'nachname': 'Mbiemri:',
        'rolle': 'Roli:',
        'email': 'Adresa e emailit:',
        'password': 'Fjalëkalimi:',
        'sprache': 'Gjuha:'
    }
};

var langf = localStorage.getItem('lang');

document.write(langf);


$('.lang').each(function(index, item) {
    $(this).text(arrLang[langf][$(this).attr('key')]);
});

// Process translation
$(function() {
    $('.translate').click(function() {
        var lang = $(this).attr('id');

        localStorage.setItem('lang', lang);

        $('.lang').each(function(index, item) {
            $(this).text(arrLang[lang][$(this).attr('key')]);
        });
    });
});