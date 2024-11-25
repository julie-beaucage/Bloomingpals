@extends("master")
@section('style')
 <link rel="stylesheet" href="{{ asset('css/personality.css') }}">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/overlay-modal.css') }}">
@endsection

@section("content")

<div class="container_info_perso">
    <h1>Les types de personnalité</h1>
    <div class="category-perso analystes">
        <h2>Analystes</h2>
        <div class="accordion">
            <div class="accordion-header">INTJ (Architecte)</div>
            <div class="accordion-content">
                <p>Penseurs imaginatifs et stratèges, avec un plan pour tout</p>
                <h5>Un esprit indépendant</h5>
                <p>
                    Les Architectes excellent dans l'art de remettre en 
                    question les conventions. Plutôt que d'accepter les 
                    idées préconçues ou les croyances populaires, ils 
                    préfèrent explorer par eux-mêmes. Cette soif d'originalité 
                    les pousse parfois à défier les normes sociales ou à 
                    s'exposer à la critique, un défi qu'ils relèvent volontiers.  
                </p>
                <h5>Un équilibre entre ambition et scepticisme</h5>
                <p>
                    Ils conjuguent une ambition sans limite et une capacité 
                    à imaginer des solutions audacieuses, tout en étant souvent 
                    critiques envers les limites humaines. Leur pragmatisme 
                    peut parfois les amener à voir les autres comme manquant 
                    de vision ou d'efforts.
                </p>
                <h5>Métiers adaptés</h5>
                <ul>
                    <li>Médecin spécialiste</li>
                    <li>Informaticien</li>
                    <li>Analyste de systèmes</li>
                    <li>Stratège d’entreprise</li>
                    <li>Analyste financier</li>
                    <li>Ingénieur</li>
                    <li>Architecte</li>
                </ul>
            </div>
        </div>
        <div class="accordion">
            <div class="accordion-header">ENTP (Innovateur)</div>
            <div class="accordion-content">
                <p>Penseurs astucieux et curieux incapables de résister à un défi intellectuel..</p>
                <p>
                    Les Innovateurs (ENTP) sont des penseurs vifs et curieux, attirés par les défis intellectuels. 
                    Avec une énergie débordante, ils ne reculent pas devant une conversation animée ou un débat controversé. 
                    Leur nature audacieuse les pousse à explorer et à remettre en question les idées établies, 
                    souvent avec humour et créativité.
                </p>
                <h5>Une énergie débordante</h5>
                <p>
                    Les ENTP sont reconnus pour leur esprit audacieux et leur plaisir à défier les conventions. 
                    Ils adorent débattre, non pas par esprit de contrariété, mais par goût pour l'exploration intellectuelle. 
                    Leur curiosité naturelle les pousse à s'intéresser à divers sujets, qu'ils abordent souvent avec 
                    une perspective unique et une pointe d'espièglerie.
                </p>
                <h5>Audace intellectuelle</h5>
                <p>
                    Ces personnalités sont d'excellents innovateurs, transformant les défis en opportunités. 
                    Ils aiment explorer des idées sous toutes leurs facettes, même celles qui s'opposent à leurs propres croyances. 
                    Ils ne se conforment pas aveuglément aux normes sociales et voient dans la pensée divergente une occasion de découvrir 
                    de nouvelles perspectives.
                </p>
                <h5>Métiers adaptés</h5>
                <ul>
                    <li>Ingénieur</li>
                    <li>Journaliste</li>
                    <li>Critique littéraire</li>
                    <li>Écrivain</li>
                    <li>Urbaniste</li>
                    <li>Ouvrier du bâtiment</li>
                    <li>Agent littéraire</li>
                </ul>
            </div>
        </div>
        <div class="accordion">
            <div class="accordion-header">INTP (Logicien)</div>
            <div class="accordion-content">
                <p>
                    Les Logiciens (INTP) sont des penseurs innovants, motivés par une soif insatiable de connaissances. 
                    Ils se distinguent par leurs perspectives uniques et leur intellect dynamique. Leur curiosité les pousse à explorer 
                    les mystères de l’univers, ce qui explique pourquoi de nombreux philosophes et scientifiques influents partagent ce type de personnalité. 
                    Bien que relativement rares, les Logiciens brillent par leur créativité et leur inventivité.
                </p>
                <h5>Un amour de l'abstrait</h5>
                <p>
                    Animés par un désir constant de comprendre les mécanismes complexes du monde, les Logiciens excellent dans l'analyse et la réflexion. 
                    Ils adorent disséquer les concepts et explorer les grandes questions de la vie. Ce type de personnalité se distingue par une 
                    pensée analytique et une capacité naturelle à remarquer des divergences ou des irrégularités, un peu comme Sherlock Holmes. 
                    Leur esprit dynamique les pousse à défier les conventions, à poser des questions difficiles, et à rechercher des réponses 
                    innovantes.
                </p>
                <h5>Perfectionnistes intellectuels</h5>
                <p>
                    Les Logiciens analysent chaque détail avec précision, bien qu’ils puissent parfois sembler déconnectés des réalités pratiques. 
                    Leur passion pour les modèles et les théories les rend fascinants, mais aussi un peu imprévisibles, car leurs idées évoluent 
                    constamment. Introvertis de nature, ils ont besoin de moments de solitude pour recharger leur énergie mentale et organiser leurs pensées.
                </p>
                <h5>Métiers adaptés</h5>
                <ul>
                    <li>Développeur de logiciels</li>
                    <li>Analyste de données</li>
                    <li>Chercheur scientifique</li>
                    <li>Designer industriel</li>
                    <li>Architecte</li>
                    <li>Ingénieur en informatique</li>
                    <li>Analyste financier</li>
                </ul>
            </div>
        </div>
        <div class="accordion">
            <div class="accordion-header">ENTJ (Commandant)</div>
            <div class="accordion-content">
                <p>
                    Les Commandants (ENTJ) sont des leaders nés. Ils incarnent le charisme, la confiance en soi et l'autorité, 
                    des qualités qui leur permettent de rassembler les autres autour d'un objectif commun. Ce type de personnalité 
                    se distingue également par une rationalité implacable et une capacité à atteindre leurs buts grâce à leur détermination et leur vivacité d'esprit.
                </p>
                <h5>Vision et organisation</h5>
                <p>
                    Les Commandants aiment relever des défis, petits ou grands, et croient fermement qu'avec suffisamment de temps et de ressources, 
                    aucun objectif n'est hors de portée. Leur capacité à penser stratégiquement et à planifier sur le long terme, tout en exécutant chaque étape 
                    avec précision, fait d'eux d'excellents chefs d'entreprise et entrepreneurs. Ils inspirent confiance et motivent les autres à se rallier à leur vision.
                </p>
                <h5>Résilience et détermination</h5>
                <p>
                    Dotés d’un esprit compétitif, les Commandants affrontent les obstacles avec ténacité. Ils font preuve de résilience face aux défis et 
                    s'efforcent constamment d'atteindre leurs objectifs, quelles que soient les difficultés. Cependant, leur approche axée sur les résultats peut 
                    parfois les rendre insensibles aux émotions des autres, en particulier dans un contexte professionnel, où ils peuvent sembler 
                    trop critiques envers ceux qu’ils perçoivent comme inefficaces.
                </p>
                <h5>Métiers adaptés</h5>
                <ul>
                    <li>Directeur général</li>
                    <li>Directeur de projet</li>
                    <li>Avocat</li>
                    <li>Juge</li>
                    <li>Professeur d’université</li>
                    <li>Politicien</li>
                    <li>Consultant en gestion</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Diplomates -->
    <div class="category-perso diplomates">
        <h2>Diplomates</h2>
        <div class="accordion">
            <div class="accordion-header">INFJ (Avocat)</div>
            <div class="accordion-content">
                 Les Avocats (INFJ) représentent peut-être le type 
                 de personnalité le plus rare, mais ils laissent 
                 une empreinte indélébile sur le monde. Idéalistes et 
                 fermement attachés à leurs principes, ils ne se contentent 
                 pas de vivre, mais cherchent à faire une différence 
                 significative. Pour eux, la réussite ne réside pas dans 
                 l'argent ou le statut, mais dans la quête de l'épanouissement 
                 personnel, le soutien aux autres et la volonté de contribuer 
                 positivement à la société.
                <p>Calmes, mystiques et idéalistes, mais aussi 
                    profondément inspirants et déterminés.</p>
                <h5>Intuition et empathie</h5>
                <p>
                    Les Avocats sont des visionnaires, souvent absorbés par 
                    leurs idéaux, cherchant à comprendre les motivations 
                    profondes des autres. Leur empathie leur permet de créer 
                    des liens authentiques et significatifs. À la recherche de 
                    leur propre raison d'être, ils ressentent parfois un 
                    décalage avec les autres, en partie en raison de leur 
                    rareté. Bien que sociaux et capables d'entretenir des 
                    relations profondes, ils peuvent se sentir incompris ou en 
                    décalage avec le monde qui les entoure. Leur plus grande 
                    satisfaction vient souvent du fait d'améliorer la vie des 
                    autres.
                    Beaucoup considèrent l'aide aux autres comme une mission 
                    de vie et sont constamment à la recherche de moyens pour 
                    défendre ce qui est juste.
                </p> 
                <h5>Engagement et vision</h5>
                <p>
                    Établir des liens profonds avec les autres (et soi-même)
                    Bien que les Avocats soient souvent introvertis, 
                    ils valorisent les relations profondes et authentiques.
                    leur plus grande joie réside dans la véritable compréhension
                    de l'autre – et dans le fait d'être compris à leur tour.
                    Ils préfèrent les conversations sérieuses aux échanges superficiels, et communiquent de manière chaleureuse et sensible. Leur honnêteté et leur perspicacité émotionnelle laissent une forte impression sur ceux qui les entourent. 
                    Grâce à leur sens aigu de l'objectif, ils sont capables de 
                    surmonter les obstacles pour poursuivre des rêves qui 
                    reflètent leurs valeurs profondes.
                </p>
                <h5>Une mission personnelle</h5>
                <p>
                    De nombreux Avocats ont le sentiment que 
                    leur vie est dédiée à une mission particulière,
                    un but qui leur est propre. Une fois ce but trouvé, 
                    ils se consacrent pleinement à sa réalisation. 
                    Lorsqu'ils sont confrontés à l'injustice, ils ne se
                     laissent pas décourager. Au contraire, ils font appel 
                     à leur intuition et leur compassion pour trouver une 
                     solution. Leur capacité naturelle à allier cœur et raison 
                     leur permet de rectifier les injustices, qu'elles soient 
                     grandes ou petites. Cependant, ils doivent également se 
                     rappeler qu'en cherchant à améliorer la vie des autres, 
                     il est essentiel de prendre soin d'eux-mêmes.
                </p>
                <h5>Métiers adaptés</h5>
                <ul>
                    <li>Psychologue</li>
                    <li>Conseiller d’orientation</li>
                    <li>Travailleur social</li>
                    <li>Responsable des ressources humaines</li>
                    <li>Thérapeute</li>
                    <li>Chercheur en sciences sociales</li>
                    <li>Rédacteur</li>
                </ul>
            </div>
        </div>
        <div class="accordion">
            <div class="accordion-header">INFP (Médiateur)</div>
            <div class="accordion-content">
                <p>Idéalistes poétiques, toujours à la recherche d’un brin de bien et d’harmonie dans le chaos.</p>
                <h5>Sensibilité et imagination</h5>
                <p>
                    Les Médiateurs sont profondément introspectifs et passionnés par des causes qui touchent leur cœur. Ils ont une imagination débordante qui leur permet d'explorer de nouvelles idées.
                </p>
                <h5>Dévouement à leurs valeurs</h5>
                <p>
                    Ils défendent avec ardeur leurs convictions et s'efforcent de créer un monde meilleur, souvent par des moyens discrets mais significatifs.
                </p>
                <h5>Métiers adaptés</h5>
                <ul>
                    <li>Médecin psychiatre</li>
                    <li>Bibliothécaire</li>
                    <li>Orthophoniste</li>
                    <li>Diététicien</li>
                    <li>Art-Thérapeute</li>
                    <li>Enseignant d’université : lettres / arts</li>
                    <li>Artiste</li>
                </ul>
            </div>
        </div>
        <div class="accordion">
            <div class="accordion-header">ENFJ (Protagoniste)</div>
            <div class="accordion-content">
                <p>Leaders charismatiques et inspirants, capables de fasciner leurs auditeurs.</p>
                <h5>Charisme naturel</h5>
                <p>
                    Les Protagonistes excellent dans l'art de motiver et guider les autres grâce à leur énergie et leur optimisme. Ils inspirent les gens à donner le meilleur d’eux-mêmes.
                </p>
                <h5>Engagement social</h5>
                <p>
                    Animés par un profond désir d’unité et de progrès, ils utilisent leur influence pour défendre des causes nobles et encourager la coopération.
                </p>
                <h5>Métiers adaptés</h5>
                <ul>
                    <li>Responsable des relations publiques</li>
                    <li>Directeur d’événements</li>
                    <li>Pasteur</li>
                    <li>Psychologue</li>
                    <li>Enseignant</li>
                    <li>Sociologue</li>
                    <li>Psychiatre</li>
                </ul>
            </div>
        </div>
        <div class="accordion">
            <div class="accordion-header">ENFP (Championeur)</div>
            <div class="accordion-content">
                <p>Esprits libres enthousiastes, créatifs et sociables, qui trouvent toujours une raison de sourire.</p>
                <h5>Énergie contagieuse</h5>
                <p>
                    Les Championeurs ont un enthousiasme débordant qui inspire leur entourage. Leur créativité leur permet de trouver des solutions innovantes aux défis.
                </p>
                <h5>Recherche de nouvelles expériences</h5>
                <p>
                    Ils adorent explorer de nouvelles idées, se lancer dans des aventures passionnantes et s'ouvrir à d'autres perspectives.
                </p>
                <h5>Métiers adaptés</h5>
                <ul>
                    <li>Accompagnants éducatifs et sociaux</li>
                    <li>Éducatrices ou éducateurs spécialisés</li>
                    <li>Directeur artistique </li>
                    <li>Anthropologiste</li>
                    <li>Directeur artistique</li>
                    <li>Travailleur social</li>
                    <li>Artiste</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Sentinelles -->
    <div class="category-perso sentinelles">
        <h2>Sentinelles</h2>
        <div class="accordion">
            <div class="accordion-header">ISTJ (Logisticien)</div>
            <div class="accordion-content">
                <p>Personnes pratiques et fiables, déterminées à respecter leurs engagements.</p>
                <h5>Sens du devoir</h5>
                <p>
                    Les Logisticiens possèdent une éthique de travail exceptionnelle et se concentrent sur l'efficacité et la précision.
                </p>
                <h5>Forte organisation</h5>
                <p>
                    Ils excellent dans la gestion des responsabilités grâce à leur discipline et leur rigueur.
                </p>
                <h5>Métiers adaptés</h5>
                <ul>
                    <li>Comptable</li>
                    <li>Juriste</li>
                    <li>Inspecteur de police</li>
                    <li>Ingénieur qualité</li>
                    <li>Médecin généraliste,</li>
                    <li>Administrateur de système,</li>
                    <li>Directeur logistique</li>
                </ul>
            </div>
        </div>
        <div class="accordion">
            <div class="accordion-header">ISFJ (Défenseur)</div>
            <div class="accordion-content">
                <p>Protecteurs loyaux et attentionnés, toujours prêts à défendre les autres.</p>
                <h5>Altruisme naturel</h5>
                <p>
                    Les Défenseurs sont profondément dévoués à leurs proches et font passer les besoins des autres avant les leurs.
                </p>
                <h5>Discrétion et humilité</h5>
                <p>
                    Ils préfèrent agir dans l’ombre, accomplissant leurs tâches avec soin et modestie.
                </p>
                <h5>Métiers adaptés</h5>
                <ul>
                    <li>Infirmier</li>
                    <li>Assistant social,</li>
                    <li>Pédiatre</li>
                    <li>Ergothérapeute</li>
                    <li>Diététicien</li>
                    <li>Enseignant</li>
                    <li>Conseiller</li>
                </ul>
            </div>
        </div>
        <div class="accordion">
            <div class="accordion-header">ESTJ (Directeur)</div>
            <div class="accordion-content">
                <p>Organisateurs énergiques et enthousiastes, prêts à mettre de l’ordre dans le chaos.</p>
                <h5>Pragmatisme et leadership</h5>
                <p>
                    Les Directeurs excellent dans la prise de décisions logiques et efficaces, tout en motivant leur entourage.
                </p>
                <h5>Attachement aux traditions</h5>
                <p>
                    Ils respectent profondément les normes et les valeurs établies, cherchant à maintenir la stabilité.
                </p>
                <h5>Métiers adaptés</h5>
                <ul>
                    <li>Directeur de banque</li>
                    <li>Chef de projet</li>
                    <li>Avocat</li>
                    <li>Administrateur de base de données</li>
                    <li>Comptable</li>
                    <li>Directeur des ressources humaines</li>
                    <li>Juge</li>
                </ul>
            </div>
        </div>
        <div class="accordion">
            <div class="accordion-header">ESFJ (Consul)</div>
            <div class="accordion-content">
                <p>Personnalités chaleureuses et sociables, prêtes à tout pour soutenir leurs proches.</p>
                <h5>Empathie et générosité</h5>
                <p>
                    Les Consuls se soucient sincèrement des autres et font tout leur possible pour renforcer les relations interpersonnelles.
                </p>
                <h5>Forte conscience sociale</h5>
                <p>
                    Ils comprennent intuitivement les besoins de leur communauté et cherchent à rassembler les gens.
                </p>
                <h5>Métiers adaptés</h5>
                <ul>
                    <li>Réceptionniste</li>
                    <li>Infirmier</li>
                    <li>Coordonnateur d’événements</li>
                    <li>Administrateur scolaire</li>
                    <li>Conseiller en santé et bien-être</li>
                    <li>Chef cuisinier</li>
                    <li>Conseiller en relations publiques</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Explorateurs -->
    <div class="category-perso explorateurs">
        <h2>Explorateurs</h2>
        <div class="accordion">
            <div class="accordion-header">ISTP (Virtuose)</div>
            <div class="accordion-content">
                <p>Expérimentateurs audacieux et pratiques, maîtres dans l’art de tous types d’outils.</p>
                <h5>Flexibilité et ingéniosité</h5>
                <p>
                    Les Virtuoses s'adaptent rapidement à leur environnement et trouvent des solutions créatives à des problèmes complexes.
                </p>
                <h5>Indépendance et curiosité</h5>
                <p>
                    Ils préfèrent explorer le monde à leur manière, avec un mélange d'intuition pratique et d'enthousiasme pour l'inconnu.
                </p>
                <h5>Métiers adaptés</h5>
                <ul>
                    <li>Mécanicien</li>
                    <li>Pilote</li>
                    <li>Ingénieur en électronique</li>
                    <li>Policier</li>
                    <li>Développeur de logiciels</li>
                    <li>Ingénieur en électronique</li>
                    <li>Architecte</li>
                </ul>
            </div>
        </div>
        <div class="accordion">
            <div class="accordion-header">ISFP (Aventurier)</div>
            <div class="accordion-content">
                <p>Artistes flexibles et charmants, toujours prêts à explorer et expérimenter.</p>
                <h5>Créativité et spontanéité</h5>
                <p>
                    Les Aventuriers abordent la vie avec une perspective unique et un désir constant d'expression personnelle.
                </p>
                <h5>Connexion avec leurs émotions</h5>
                <p>
                    Ils trouvent du sens dans les expériences émotionnelles et artistiques qui enrichissent leur vision du monde.
                </p>
                <h5>Métiers adaptés</h5>
                <ul>
                    <li>Designer</li>
                    <li>Artiste</li>
                    <li>Paysagiste</li>
                    <li>Photographe</li>
                    <li>Musicien</li>
                    <li>Archéologue</li>
                    <li>Ingénieur</li>
                </ul>
            </div>
        </div>
        <div class="accordion">
            <div class="accordion-header">ESTP (Entrepreneur)</div>
            <div class="accordion-content">
                <p>Personnalités énergiques et spontanées, prêtes à s’impliquer dans toutes les aventures passionnantes.</p>
                <h5>Aptitude au risque</h5>
                <p>
                    Les Entrepreneurs prospèrent dans des environnements dynamiques, où ils peuvent explorer des opportunités inattendues.
                </p>
                <h5>Charisme naturel</h5>
                <p>
                    Leur confiance et leur enthousiasme les rendent souvent irrésistibles et capables de rassembler les gens.
                </p>
                <h5>Métiers adaptés</h5>
                <ul>
                    <li>Courtier en bourse</li>
                    <li>Entrepreneur</li>
                    <li>Promoteur immobilier</li>
                    <li>Chef de projet</li>
                    <li>Ingénieur</li>
                    <li>Chirurgien</li>
                    <li>Inspecteur de police</li>
                </ul>
            </div>
        </div>
        <div class="accordion">
            <div class="accordion-header">ESFP (Amuseur)</div>
            <div class="accordion-content">
                <p>Animés par l‘enthousiasme, spontanés, énergiques et créatifs.</p>
                <h5>Sociabilité et expression</h5>
                <p>
                    Les Artistes adorent partager des moments joyeux avec les autres, et leur enthousiasme est souvent contagieux.
                </p>
                <h5>Amour pour l'aventure</h5>
                <p>
                    Ils cherchent toujours de nouvelles expériences, avec une approche intuitive de la vie.
                </p>
                <h5>Métiers adaptés</h5>
                <ul>
                    <li>Musicien</li>
                    <li>Acteur</li>
                    <li>Danseur</li>
                    <li>Agent de voyage</li>
                    <li>Animateur de centre de loisirs</li>
                    <li>Professeur</li>
                    <li>Gestionnaire Produit</li>
                </ul>
            </div>
        </div>
    </div>   
</div>
    <!-- Formulaire de connexion et d'inscription en MODAL CSS SANS BOOTRAPS -->
    <div class="custom-overlay" id="loginOverlay" style="display: none;">
        <div class="container-custom-modal">
            <div class="header">
                <span id="title-empty" class="title no_wrap"></span>
                <button id="icone_back" class="back" onclick="showLogin()" style="border: none; background: none; display: none;">
                  <span class="material-symbols-rounded" style="font-size: 24px; color: black;">chevron_left</span>
                </button>
                <button class="close" onclick="closeOverlay()">
                    <span class="material-symbols-rounded" style="font-size: 24px; color: black;">close</span>
                </button>
            </div>
            <div class="pageContainerLogin">
                <div class="img_login_left">
                    <div class="image_login">
                        <img src="{{ asset('images/logoBloom.png') }}" alt="logo" class="imgLogo" />
                    </div>
                    <h1>BloomingPals</h1>
                    <p>Une expérience d'amitié nouvelle et captivante !</p>
                </div>
                @include('auth/login')
                @include('auth/signIn')           
            </div>
        </div>    
        <div class="flash-error" style="display: none; color: red;"></div>
    </div>
@endsection
@section('script')
<script src="{{asset('/js/home-Overlay-login.js')}}"></script>
<script>
        document.querySelectorAll('.accordion-header').forEach(header => {
            header.addEventListener('click', () => {
                const accordion = header.parentElement;
                accordion.classList.toggle('active');
            });
        });
    </script>
<script src="{{ asset('/js/validationTestPersonality.js') }}"></script>
@endsection
