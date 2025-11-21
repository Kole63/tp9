<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Item;
use App\Models\Supplier;

class CustomSeeder extends Seeder
{
    /**
     * Run the database seeds.
    */
    public function run(): void
    {
        $data = [
            ['title' => 'Balance émotionnelle connectée', 'price' => 59.00, 'file' => 'balance.jpg', 'description' => 'Pèse ton humeur du matin et te dit de retourner te coucher.', 'categories' => ['Technologie', 'Humour']],
            ['title' => 'Boucle d\'oreille GPS', 'price' => 24.99, 'file' => 'boucle.jpg', 'description' => 'Te retrouve même quand tu t\'es perdu dans tes pensées.', 'categories' => ['Mode', 'Technologie']],
            ['title' => 'Bougie au parfum de Wi-Fi', 'price' => 12.90, 'file' => 'bougie_1.jpg', 'description' => 'Ne sent rien mais te donne l\'impression d\'être mieux connecté émotionnellement.', 'categories' => ['Maison', 'Technologie', 'Bougie']],
            ['title' => 'Bougie au parfum de "j\'ai essayé"', 'price' => 9.50, 'file' => 'bougie_2.jpg', 'description' => 'Senteur subtile d\'effort minimal et de renoncement élégant.', 'categories' => ['Maison', 'Humour', 'Bougie']],
            ['title' => 'Bougie parfum culpabilité', 'price' => 9.99, 'file' => 'bougie_3.jpg', 'description' => 'Diffuse une légère odeur de “tu aurais pu faire mieux”.', 'categories' => ['Maison', 'Humour', 'Bougie']],
            ['title' => 'Bougie parfum open-space', 'price' => 14.20, 'file' => 'bougie_4.jpg', 'description' => 'Senteur de café froid et de conversations forcées.', 'categories' => ['Maison', 'Bureau', 'Bougie']],
            ['title' => 'Bougie au parfum de réunion', 'price' => 13.75, 'file' => 'bougie_5.jpg', 'description' => 'Senteur subtile de PowerPoint et de perte de temps.', 'categories' => ['Bureau', 'Maison', 'Bougie']],
            ['title' => 'Bougie senteur lundi matin', 'price' => 11.70, 'file' => 'bougie_6.jpg', 'description' => 'Un parfum de café froid et d\'e-mails non lus.', 'categories' => ['Maison', 'Bureau', 'Bougie']],
            ['title' => 'Bougie de la dernière chance', 'price' => 15.50, 'file' => 'bougie_7.jpg', 'description' => 'S\'allume quand tout le reste a échoué. Ce qui arrive souvent.', 'categories' => ['Maison', 'Humour', 'Bougie']],
            ['title' => 'Bougie aux regrets discrets', 'price' => 13.40, 'file' => 'bougie_8.jpg', 'description' => 'Brûle lentement comme ton envie de changer de vie.', 'categories' => ['Maison', 'Humour', 'Bougie']],
            ['title' => 'Bougie zen en surmenage', 'price' => 15.90, 'file' => 'bougie_9.jpg', 'description' => 'Essaie d\'apporter la paix intérieure mais finit en fumée.', 'categories' => ['Maison', 'Loisirs', 'Bougie']],
            ['title' => 'Bouteille d\'eau éthique', 'price' => 16.80, 'file' => 'bouteille.jpg', 'description' => 'Te rappelle à chaque gorgée que tu ne bois pas assez.', 'categories' => ['Lifestyle', 'Cuisine']],
            ['title' => 'Café intergalactique', 'price' => 14.50, 'file' => 'cafe.jpg', 'description' => 'Conçu pour réveiller même un trou noir, ce café te propulse directement dans une autre galaxie mentale.', 'categories' => ['Cuisine', 'Lifestyle']],
            ['title' => 'Cahier des grandes décisions', 'price' => 8.20, 'file' => 'cahier_1.jpg', 'description' => 'Contient uniquement des pages vierges, pour ne pas risquer de se tromper.', 'categories' => ['Bureau', 'Loisirs']],
            ['title' => 'Cahier d\'idées ratées', 'price' => 7.00, 'file' => 'cahier_2.jpg', 'description' => 'Chaque page célèbre un échec créatif avec dignité.', 'categories' => ['Bureau', 'Humour']],
            ['title' => 'Calendrier de la procrastination', 'price' => 13.00, 'file' => 'calendrier.jpg', 'description' => 'Tous les jours sont marqués “demain”.', 'categories' => ['Bureau', 'Humour']],
            ['title' => 'Carnet de notes invisibles', 'price' => 4.50, 'file' => 'carnet_1.jpg', 'description' => 'Les pages sont blanches, mais pleines d\'idées que tu n\'écriras jamais.', 'categories' => ['Bureau', 'Loisirs']],
            ['title' => 'Carnet de pensées inutiles', 'price' => 6.40, 'file' => 'carnet_2.jpg','description' => 'Pour noter toutes les idées brillantes qui ne verront jamais le jour. Permet de prendre des notes lors des CM.', 'categories' => ['Bureau', 'Loisirs']],
            ['title' => 'Carnet des excuses inventées', 'price' => 7.10, 'file' => 'carnet_3.jpg','description' => 'Chaque page contient une justification brillante pour ton inaction.', 'categories' => ['Bureau', 'Loisirs']],
            ['title' => 'Carnet de pensées nocturnes', 'price' => 6.99, 'file' => 'carnet_4.jpg','description' => 'Recueille tes brillantes idées de 3h du matin que tu n\'exécutes jamais.', 'categories' => ['Bureau', 'Loisirs']],
            ['title' => 'Chaise de bureau zen', 'price' => 120.00, 'file' => 'chaise_1.jpg', 'description' => 'Parfait équilibre entre confort et douleur existentielle pendant les réunions.', 'categories' => ['Bureau', 'Lifestyle']],
            ['title' => 'Chaise de salle d\'attente mentale', 'price' => 64.00, 'file' => 'chaise_2.jpg', 'description' => 'Confortable, mais te donne l\'impression que la vie est en pause.', 'categories' => ['Maison', 'Lifestyle']],
            ['title' => 'Chargeur à bonne conscience', 'price' => 21.00, 'file' => 'chargeur_1.jpg', 'description' => 'Recharge ton téléphone et ton ego écologique.', 'categories' => ['Technologie', 'Lifestyle']],
            ['title' => 'Chargeur socialement anxieux', 'price' => 18.50, 'file' => 'chargeur_2.jpg', 'description' => 'Recharge lentement pour éviter toute interaction avec toi.', 'categories' => ['Technologie', 'Humour']],
            ['title' => 'Chargeur existentiel', 'price' => 19.90, 'file' => 'chargeur_3.jpg', 'description' => 'Recharge ton téléphone et te rappelle que toi aussi tu es à court d\'énergie.', 'categories' => ['Technologie', 'Humour']],
            ['title' => 'Chaussettes de l\'infini', 'price' => 9.99, 'file' => 'chaussettes_1.jpg', 'description' => 'Ces chaussettes se perdent dans la machine à laver pour explorer d\'autres dimensions. On n\'en retrouve jamais qu\'une, mais elle semble avoir vu des choses.', 'categories' => ['Mode', 'Humour']],
            ['title' => 'Chaussettes méditatives', 'price' => 10.20, 'file' => 'chaussettes_2.jpg', 'description' => 'Elles ne courent pas après le bonheur, elles marchent doucement vers lui.', 'categories' => ['Mode', 'Lifestyle']],
            ['title' => 'Chaussons de télétravail', 'price' => 18.00, 'file' => 'chaussons_1.jpg', 'description' => 'Conçus pour donner l\'illusion de professionnalisme à tes pieds.', 'categories' => ['Mode', 'Bureau']],
            ['title' => 'Chaussons de la sagesse', 'price' => 22.00, 'file' => 'chaussons_2.jpg', 'description' => 'T\'incitent à ralentir et à remettre à demain tout ce que tu peux.', 'categories' => ['Maison', 'Lifestyle']],
            ['title' => 'Chocolat de la vérité', 'price' => 8.50, 'file' => 'chocolat.jpg', 'description' => 'T\'oblige à avouer chaque mensonge à la première bouchée.', 'categories' => ['Cuisine', 'Humour']],
            ['title' => 'Clavier qui écrit tout seul', 'price' => 59.99, 'file' => 'clavier_1.jpg', 'description' => 'Rédige automatiquement des excuses convaincantes pour tes retards de projet.', 'categories' => ['Technologie', 'Bureau']],
            ['title' => 'Clavier émotionnel', 'price' => 49.99, 'file' => 'clavier_2.jpg', 'description' => 'Ajoute automatiquement un ton dramatique à tous tes e-mails.', 'categories' => ['Bureau', 'Technologie']],
            ['title' => 'Boîte à cookies morale', 'price' => 15.99, 'file' => 'cookies.jpg', 'description' => 'T\'interroge sur la différence entre besoin et envie avant chaque bouchée.', 'categories' => ['Cuisine', 'Humour']],
            ['title' => 'Coussin d\'auto-thérapie', 'price' => 22.50, 'file' => 'coussin_1.jpg', 'description' => 'T\'écoute sans juger pendant que tu cries dans le vide. Efficacité variable.', 'categories' => ['Maison', 'Loisirs']],
            ['title' => 'Coussin de colère passive', 'price' => 19.50, 'file' => 'coussin_2.jpg', 'description' => 'Garde rancune silencieusement pendant des semaines.', 'categories' => ['Maison', 'Loisirs']],
            ['title' => 'Coussin de télépathie', 'price' => 26.00, 'file' => 'coussin_3.jpg', 'description' => 'Ne lit pas vraiment dans les pensées, mais devine quand tu veux faire la sieste.', 'categories' => ['Maison', 'Humour']],
            ['title' => 'Coussin de vérité inconfortable', 'price' => 18.90, 'file' => 'coussin_4.jpg', 'description' => 'Change de forme quand tu mens dessus.', 'categories' => ['Maison', 'Humour']],
            ['title' => 'Coussin anti-dramatique', 'price' => 20.99, 'file' => 'coussin_5.jpg', 'description' => 'Absorbe 90 % de ton exaspération quotidienne.', 'categories' => ['Maison', 'Humour']],
            ['title' => 'Coussin du silence intérieur', 'price' => 25.00, 'file' => 'coussin_6.jpg', 'description' => 'T\'invite à ne rien dire quand tu n\'as plus rien à dire d\'intelligent.', 'categories' => ['Maison', 'Loisirs']],
            ['title' => 'Couverts de compétition', 'price' => 25.00, 'file' => 'couvert_1.jpg', 'description' => 'Aiguisés comme ta mauvaise foi quand on te propose un régime.', 'categories' => ['Cuisine', 'Lifestyle']],
            ['title' => 'Couverts sarcastiques', 'price' => 18.60, 'file' => 'couvert_2.jpg', 'description' => 'Te félicitent d\'avoir encore commandé à emporter.', 'categories' => ['Cuisine', 'Humour']],
            ['title' => 'Crayon de la procrastination', 'price' => 1.99, 'file' => 'crayon.jpg', 'description' => 'Insiste pour qu\'on reporte la prise de notes à demain. Il est solidaire.', 'categories' => ['Bureau', 'Humour']],
            ['title' => 'Horloge en retard programmé', 'price' => 19.90, 'file' => 'horloge_1.jpg', 'description' => 'Indique systématiquement l\'heure d\'après. Idéale pour les optimistes chroniques.', 'categories' => ['Maison', 'Lifestyle']],
            ['title' => 'Horloge sarcastique', 'price' => 25.99, 'file' => 'horloge_2.jpg', 'description' => 'Annonce “encore en retard ?” à chaque fois que tu la regardes.', 'categories' => ['Maison', 'Humour']],
            ['title' => 'Lampe à mauvaise humeur', 'price' => 29.90, 'file' => 'lampe_1.jpg', 'description' => 'Elle refuse d\'éclairer si elle estime que tu ne le mérites pas. Très susceptible, surtout le lundi.', 'categories' => ['Maison', 'Lifestyle']],
            ['title' => 'Lampe à excuses intégrées', 'price' => 45.00, 'file' => 'lampe_2.jpg', 'description' => 'S\'éteint d\'elle-même dès qu\'on parle de productivité. Pure solidarité.', 'categories' => ['Maison', 'Bureau']],
            ['title' => 'Lampe de chevet introspective', 'price' => 33.00, 'file' => 'lampe_3.jpg', 'description' => 'S\'éteint pour réfléchir à sa place dans le salon.', 'categories' => ['Maison', 'Humour']],
            ['title' => 'Lampe de table paresseuse', 'price' => 28.40, 'file' => 'lampe_4.jpg', 'description' => 'Refuse de s\'allumer avant 10h, par principe.', 'categories' => ['Maison', 'Humour']],
            ['title' => 'Lampe de vérité lumineuse', 'price' => 39.90, 'file' => 'lampe_5.jpg', 'description' => 'S\'allume uniquement quand tu dis la vérité. Rarement allumée.', 'categories' => ['Maison', 'Humour']],
            ['title' => 'Lampe d\'humeur aléatoire', 'price' => 30.00, 'file' => 'lampe_6.jpg', 'description' => 'Change de couleur selon ses propres émotions, pas les tiennes.', 'categories' => ['Maison', 'Lifestyle']],
            ['title' => 'Lampe à sommeil inversé', 'price' => 35.40, 'file' => 'lampe_7.jpg', 'description' => 'S\'allume la nuit, s\'éteint le jour. Fait exprès pour embrouiller ton rythme.', 'categories' => ['Maison', 'Technologie']],
            ['title' => 'Lampe à énergie sociale', 'price' => 40.00, 'file' => 'lampe_8.jpg', 'description' => 'Brille plus fort quand tu mens en disant “ça va super”.', 'categories' => ['Maison', 'Lifestyle']],
            ['title' => 'Lampe à réalité sélective', 'price' => 29.00, 'file' => 'lampe_9.jpg', 'description' => 'Éclaire uniquement les choses que tu veux voir.', 'categories' => ['Maison', 'Lifestyle']],
            ['title' => 'Lampe du chaos organisé', 'price' => 37.80, 'file' => 'lampe_10.jpg', 'description' => 'Projette un désordre lumineux parfaitement calibré.', 'categories' => ['Maison', 'Lifestyle']],
            ['title' => 'Lampe à sel sceptique', 'price' => 21.99, 'file' => 'lampe_11.jpg', 'description' => 'Ne croit pas vraiment en l\'énergie positive, mais fait semblant.', 'categories' => ['Maison', 'Lifestyle']],
            ['title' => 'Lampe anti-idées brillantes', 'price' => 28.00, 'file' => 'lampe_12.jpg', 'description' => 'S\'éteint automatiquement dès que tu as une bonne idée.', 'categories' => ['Maison', 'Bureau']],
            ['title' => 'Livre des excuses parfaites', 'price' => 15.00, 'file' => 'livre.jpg', 'description' => 'Contient plus de 200 prétextes scientifiquement validés pour ne rien faire aujourd\'hui.', 'categories' => ['Loisirs', 'Humour']],
            ['title' => 'Montre qui arrive toujours en retard', 'price' => 39.99, 'file' => 'montre_1.jpg', 'description' => 'Indique l\'heure exacte… cinq minutes après tout le monde. Elle ne croit pas aux deadlines.', 'categories' => ['Mode', 'Lifestyle']],
            ['title' => 'Montre méditative', 'price' => 42.00, 'file' => 'montre_2.jpg', 'description' => 'Ne donne pas l\'heure, mais t\'invite à contempler le moment présent.', 'categories' => ['Lifestyle', 'Mode']],
            ['title' => 'Montre du bon sens', 'price' => 32.00, 'file' => 'montre_3.jpg', 'description' => 'Ne fonctionne que quand tu fais des choix raisonnables.', 'categories' => ['Mode', 'Humour']],
            ['title' => 'Montre de l\'oubli sélectif', 'price' => 33.70, 'file' => 'montre_4.jpg', 'description' => 'Ne se souvient que des bons moments (surtout les siestes).', 'categories' => ['Mode', 'Lifestyle']],
            ['title' => 'Mug quantique', 'price' => 11.00, 'file' => 'mug.jpg', 'description' => 'Contient du café et du thé jusqu\'à ce que tu le regardes. Incertain mais savoureux.', 'categories' => ['Cuisine', 'Humour']],
            ['title' => 'Oreiller anti-rêves bizarres', 'price' => 24.00, 'file' => 'oreiller_1.jpg', 'description' => 'Empêche les rêves impliquant ton patron, ton ex ou des kangourous volants.', 'categories' => ['Maison', 'Loisirs']],
            ['title' => 'Oreiller connecté au karma', 'price' => 34.00, 'file' => 'oreiller_2.jpg', 'description' => 'Adapte sa fermeté selon la pureté de tes actions de la journée.', 'categories' => ['Maison', 'Technologie']],
            ['title' => 'Oreiller de réunion', 'price' => 23.50, 'file' => 'oreiller_3.jpg', 'description' => 'Épouse parfaitement la forme de ton désespoir collectif.', 'categories' => ['Bureau', 'Maison']],
            ['title' => 'Oreiller pour conversations profondes', 'price' => 27.20, 'file' => 'oreiller_4.jpg', 'description' => 'T\'écoute parler de l\'univers puis s\'endort avant toi.', 'categories' => ['Maison', 'Loisirs']],
            ['title' => 'Oreiller de motivation molle', 'price' => 22.30, 'file' => 'oreiller_5.jpg', 'description' => 'Te dit “tu peux le faire” avec la conviction d\'un lundi matin.', 'categories' => ['Maison', 'Humour']],
            ['title' => 'Oreiller de l\'oubli heureux', 'price' => 26.50, 'file' => 'oreiller_6.jpg', 'description' => 'Efface les souvenirs des mails non lus avant de dormir.', 'categories' => ['Maison', 'Lifestyle']],
            ['title' => 'Stylo qui ne fuit jamais', 'price' => 3.49, 'file' => 'pen_1.jpg', 'description' => 'Un stylo conçu pour l\'excellence… sauf quand il décide d\'exprimer ses émotions à travers une fuite d\'encre dramatique.', 'categories' => ['Bureau', 'Humour']],
            ['title' => 'Stylo efface-mémoire', 'price' => 7.49, 'file' => 'pen_2.jpg', 'description' => 'Efface tes erreurs et tes souvenirs de réunions inutiles.', 'categories' => ['Bureau', 'Technologie']],
            ['title' => 'Stylo de l\'honnêteté brutale', 'price' => 5.99, 'file' => 'pen_3.jpg', 'description' => 'Écrit seulement la vérité, même quand tu ne veux pas.', 'categories' => ['Bureau', 'Humour']],
            ['title' => 'Stylo de l\'optimisme forcé', 'price' => 3.80, 'file' => 'pen_4.jpg', 'description' => 'Écrit uniquement des phrases positives, même fausses.', 'categories' => ['Bureau', 'Humour']],
            ['title' => 'Stylo diplomatique', 'price' => 9.00, 'file' => 'pen_5.jpg', 'description' => 'Transforme tes insultes en euphémismes professionnels.', 'categories' => ['Bureau', 'Humour']],
            ['title' => 'Stylo à flatteries automatiques', 'price' => 5.90, 'file' => 'pen_6.jpg', 'description' => 'Écrit des compliments à ton insu. Idéal pour améliorer tes mails.', 'categories' => ['Bureau', 'Humour']],
            ['title' => 'Stylo du dernier moment', 'price' => 4.90, 'file' => 'pen_7.jpg', 'description' => 'N\'écrit qu\'à la veille des échéances.', 'categories' => ['Bureau', 'Humour']],
            ['title' => 'Plante en plastique timide', 'price' => 12.50, 'file' => 'plante.jpg', 'description' => 'Feint la photosynthèse par pure politesse. Rougit quand on la complimente.', 'categories' => ['Maison', 'Loisirs']],
            ['title' => 'Sac à dos introspectif', 'price' => 49.90, 'file' => 'sacados.jpg', 'description' => 'Te fait réfléchir à chaque fois que tu le remplis trop.', 'categories' => ['Mode', 'Lifestyle']],
            ['title' => 'Savon philosophique', 'price' => 6.99, 'file' => 'savon_1.jpg', 'description' => 'Pendant que tu te laves, il te demande pourquoi tu cherches à te purifier d\'une société impure.', 'categories' => ['Maison', 'Humour']],
            ['title' => 'Savon du doute existentiel', 'price' => 5.50, 'file' => 'savon_2.jpg', 'description' => 'Nettoie les mains, pas la conscience.', 'categories' => ['Maison', 'Humour']],
            ['title' => 'Souris ergonomique pessimiste', 'price' => 27.90, 'file' => 'souris.jpg', 'description' => 'Anticipe les erreurs avant que tu les fasses. Elle te connaît trop bien.', 'categories' => ['Bureau', 'Technologie']],
            ['title' => 'Tapis volant d\'intérieur', 'price' => 89.90, 'file' => 'tapis_1.jpg', 'description' => 'Ne vole pas vraiment, mais transporte efficacement ta motivation du sol au canapé.', 'categories' => ['Maison', 'Loisirs']],
            ['title' => 'Tapis de souris motivant', 'price' => 9.00, 'file' => 'tapis_2.jpg', 'description' => 'Imprime la phrase “tu peux le faire” mais n\'aide pas du tout à le faire.', 'categories' => ['Bureau', 'Humour']],
            ['title' => 'Tapis de méditation multitâche', 'price' => 49.99, 'file' => 'tapis_3.jpg', 'description' => 'Encourage la pleine conscience tout en scrollant Instagram.', 'categories' => ['Loisirs', 'Lifestyle']],
            ['title' => 'Tapis de bain sarcastique', 'price' => 17.50, 'file' => 'tapis_4.jpg', 'description' => 'Te félicite d\'avoir survécu à une autre douche existentielle.', 'categories' => ['Maison', 'Humour']],
            ['title' => 'Tapis d\'entrée ironique', 'price' => 22.90, 'file' => 'tapis_5.jpg', 'description' => 'Indique “Bienvenue” mais ne le pense pas vraiment.', 'categories' => ['Maison', 'Humour']],
            ['title' => 'Tapis de yoga auto-justifiant', 'price' => 39.00, 'file' => 'tapis_6.jpg', 'description' => 'Explique pourquoi tu n\'as pas besoin de t\'étirer aujourd\'hui.', 'categories' => ['Loisirs', 'Lifestyle']],
            ['title' => 'Tapis de méditation contradictoire', 'price' => 41.90, 'file' => 'tapis_7.jpg', 'description' => 'T\'invite à ne rien faire tout en culpabilisant de ne rien faire.', 'categories' => ['Loisirs', 'Lifestyle']],
            ['title' => 'Tapis de bain optimiste', 'price' => 16.40, 'file' => 'tapis_8.jpg', 'description' => 'Insiste pour dire “aujourd\'hui sera une belle journée”, même trempé.', 'categories' => ['Maison', 'Humour']],
            ['title' => 'Tapis de bain honnête', 'price' => 14.80, 'file' => 'tapis_9.jpg', 'description' => 'T\'avoue qu\'il en a marre de tes douches existentielles de 40 minutes.', 'categories' => ['Maison', 'Humour']],
            ['title' => 'Tapis volant administratif', 'price' => 95.00, 'file' => 'tapis_10.jpg', 'description' => 'Ne décolle que si tu remplis trois formulaires au préalable.', 'categories' => ['Maison', 'Humour']],
            ['title' => 'Tasse qui juge ton café', 'price' => 8.99, 'file' => 'tasse_1.jpg', 'description' => 'Chaque gorgée te fait sentir observé. Elle sait que tu bois du décaféiné.', 'categories' => ['Cuisine', 'Humour']],
            ['title' => 'Tasse en retard', 'price' => 10.50, 'file' => 'tasse_2.jpg', 'description' => 'Toujours vide quand tu en as besoin, pleine quand tu pars.', 'categories' => ['Cuisine', 'Humour']],
            ['title' => 'Tasse en grève', 'price' => 7.50, 'file' => 'tasse_3.jpg', 'description' => 'Refuse de contenir du café avant 9h. Solidaire de tes cernes.', 'categories' => ['Cuisine', 'Humour']],
            ['title' => 'Tasse de productivité illusoire', 'price' => 9.80, 'file' => 'tasse_4.jpg', 'description' => 'Te donne l\'impression de travailler rien qu\'en la tenant.', 'categories' => ['Cuisine', 'Bureau']],
            ['title' => 'Tasse à double personnalité', 'price' => 9.70, 'file' => 'tasse_5.jpg', 'description' => 'Change de message selon la température. Aimable chaude, passive-agressive froide.', 'categories' => ['Cuisine', 'Humour']],
            ['title' => 'Ventilateur philosophe', 'price' => 34.99, 'file' => 'ventilateur.jpg', 'description' => 'Souffle de l\'air et des réflexions sur la vacuité de l\'existence.', 'categories' => ['Maison', 'Humour']],
            ['title' => 'Verre à demi-plein automatique', 'price' => 6.75, 'file' => 'verre_1.jpg', 'description' => 'Ne se remplit jamais complètement, question de principe.', 'categories' => ['Cuisine', 'Humour']],
            ['title' => 'Verre à priorités flottantes', 'price' => 7.99, 'file' => 'verre_2.jpg', 'description' => 'Se remplit automatiquement selon ton niveau de stress. Spoiler : il déborde souvent.', 'categories' => ['Cuisine', 'Humour']],
            ['title' => 'Verre de l\'honnêteté brute', 'price' => 8.30, 'file' => 'verre_3.jpg', 'description' => 'Plus tu bois, plus tu dis la vérité. Dangereux après 22h.', 'categories' => ['Cuisine', 'Lifestyle']],
            ['title' => 'Verre de la clarté douteuse', 'price' => 6.60, 'file' => 'verre_4.jpg', 'description' => 'Translucide, comme tes intentions en soirée.', 'categories' => ['Cuisine', 'Humour']],
        ];

        $suppliersID = Supplier::get()->pluck('id');
        $categories = [];
        foreach($data as $item) {
            $newItem = Item::create([
                'title' => $item['title'],
                'description' => $item['description'],
                'price' => $item['price'],
                'image' => $item['file'] ?? null,
                'supplier_id' => fake()->randomElement($suppliersID)
            ]);
            foreach($item['categories'] as $categorie) {
                if(!isset($categories[$categorie])) {
                    $newCategory = Category::create(['title' => $categorie]);
                    $categories[$categorie] = $newCategory->id;
                }
                $newItem->categories()->attach($categories[$categorie]);
            }
        }
    }

}