// preparing language file
var aLangKeys = new Array();
aLangKeys['en'] = new Array();
aLangKeys['fr'] = new Array();
aLangKeys['en']['home'] = 'Home';
aLangKeys['en']['peoples'] = 'Peoples >>';
aLangKeys['en']['all_list'] = 'All list';
aLangKeys['en']['online'] = 'Online';
aLangKeys['en']['articles'] = 'Articles >>';
aLangKeys['en']['js'] = 'JavaScript';
aLangKeys['en']['php'] = 'PHP';
aLangKeys['en']['html'] = 'HTML';
aLangKeys['en']['css'] = 'CSS';
aLangKeys['en']['contact_us'] = 'Contact us';
aLangKeys['en']['welcome'] = 'Welcome guests';
aLangKeys['en']['a_man'] = 'A man bribes a rabbit with wicked dentures to run away with him in a sailboat via an ambulance. Bribing Koalas to remain illegally in one place. Trees anchor me in place. / Your mom drives the ambulance, but the city is farther than it appears.';

aLangKeys['fr']['home'] = 'Accueil';
aLangKeys['fr']['peoples'] = 'Peuples >>';
aLangKeys['fr']['all_list'] = 'Toutes les listes';
aLangKeys['fr']['online'] = 'En ligne';
aLangKeys['fr']['articles'] = 'Articles >>';
aLangKeys['fr']['js'] = 'JavaScript';
aLangKeys['fr']['php'] = 'Php';
aLangKeys['fr']['html'] = 'Html';
aLangKeys['fr']['css'] = 'Css';
aLangKeys['fr']['contact_us'] = 'Contactez nous';
aLangKeys['fr']['welcome'] = 'Bienvenue aux invites';
aLangKeys['fr']['a_man'] = "Un homme soudoie un lapin avec des prothèses méchantes pour s'enfuir avec lui dans un voilier via une ambulance. Corruption des Koalas pour qu'ils restent illégalement à un endroit. Les arbres m'ancrent en place. / Votre mère conduit l'ambulance, mais la ville est plus loin qu'il n'y paraît.";
$(document).ready(function() {
    // onclick behavior
    $('.lang').click(function() {
        var lang = $(this).attr('id'); // obtain language id
        // translate all translatable elements
        $('.tr').each(function(i) {
            $(this).text(aLangKeys[lang][$(this).attr('key')]);
        });
    });
});