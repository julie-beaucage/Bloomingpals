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
                <p>Les Médiateurs (INFP) sont des idéalistes poétiques, toujours à la recherche de beauté et d'harmonie dans un monde souvent chaotique. Dotés d'une grande imagination et d'une profonde empathie, ils sont animés par un désir sincère de créer un monde meilleur et de défendre des causes qui leur tiennent à cœur.</p>
                <h5>Sensibilité et imagination</h5>
                <p>
                    Les Médiateurs sont des personnalités introspectives et créatives, avec une imagination débordante qui leur permet de se perdre dans des rêveries. Leur esprit est constamment en quête de nouvelles idées et de visions uniques. Bien qu'ils puissent paraître calmes et réservés, leur vie intérieure est intense et passionnée. Ces individus sont particulièrement sensibles à l'art, à la musique et à la nature, qui éveillent chez eux des émotions profondes. Leur capacité à ressentir profondément est l'une de leurs caractéristiques les plus marquantes, ce qui leur permet de se connecter de manière authentique avec le monde qui les entoure.
                </p>

                <h5>Dévouement à leurs valeurs</h5>
                <p>
                    L'empathie est l'un des plus grands dons des Médiateurs, bien qu'elle puisse parfois devenir un fardeau. Ils se sentent souvent affectés par les injustices et les souffrances du monde, ce qui peut les amener à se perdre dans les émotions négatives de ceux qui les entourent. S'ils ne trouvent pas un moyen de poser des limites saines, ils risquent de se sentir accablés par la douleur qu'ils perçoivent chez les autres. Malgré cela, les Médiateurs restent profondément dévoués à leurs valeurs et s'efforcent d'apporter des changements positifs, souvent à travers des actions discrètes mais significatives.
                    <br><br>
                    Curieux de nature, les Médiateurs s'intéressent profondément à la psychologie humaine. Ils sont en quête constante de compréhension et de vérité, non seulement à propos d'eux-mêmes mais aussi des autres. Ils sont compatissants et ouverts, prêts à écouter sans jugement les histoires et les émotions des personnes qui croisent leur chemin. Ce dévouement à écouter et à aider les autres les rend souvent très appréciés par ceux qui cherchent du réconfort ou des conseils.
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
            <p>Les ENFJ, ou Protagonistes, sont des leaders charismatiques et inspirants qui savent motiver et fasciner leur entourage. Leur capacité à guider les autres avec énergie et optimisme en fait des modèles dans de nombreux domaines, de la politique à l'éducation. Ils sont profondément investis dans des causes qui leur tiennent à cœur et cherchent à avoir un impact positif sur le monde et sur ceux qui les entourent.</p>
            <h5>Charisme naturel</h5>
            <p>
                Les Protagonistes possèdent un charisme inné qui les rend capables d'inspirer et de motiver les autres autour d’eux. Leur énergie débordante et leur vision idéale les poussent à guider ceux qu’ils rencontrent vers le meilleur d'eux-mêmes. Souvent attirés par des rôles de leadership, ces personnalités charismatiques sont présentes dans de nombreux secteurs, qu'il s'agisse de la politique, de l'éducation ou de la direction d’équipes. 
                <br><br>
                Les ENFJ se sentent appelés à une cause plus grande qu’eux-mêmes et trouvent une grande satisfaction dans le fait d’aider les autres à s’épanouir. Leur passion pour la justice et leur engagement dans des projets altruistes sont des caractéristiques essentielles de leur personnalité. Ils n’hésitent pas à prendre des initiatives, même quand cela implique de surmonter des obstacles, et trouvent souvent du sens et de la joie dans l'accompagnement des autres vers leur propre réussite.
            </p>

            <h5>Engagement social</h5>
            <p>
                Les Protagonistes sont animés par un profond désir de progrès social et d'unité. Ils utilisent leur influence pour soutenir des causes qui promeuvent la coopération et l’harmonie au sein de la société. Leur engagement est guidé par des valeurs comme l’authenticité, l’altruisme et le désir de justice. Lorsqu'ils perçoivent une injustice, ils ne se contentent pas de l'ignorer, mais s'expriment de manière réfléchie et perspicace, ce qui leur permet de gagner la confiance et l’admiration des autres.
                <br><br>
                Grâce à leur grande sensibilité et leur capacité à comprendre les motivations profondes de ceux qui les entourent, les ENFJ sont des communicateurs très efficaces. Leur capacité à capter les pensées et émotions des autres, parfois de manière presque instinctive, les rend particulièrement aptes à nouer des relations sincères et à convaincre les autres de suivre une cause ou de participer à une mission. Cette intuition, couplée à leur capacité à articuler des idées de manière claire et inspirante, les rend extrêmement persuasifs et capables d’entraîner les autres dans leurs projets.
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
            <div class="accordion-header">ENFP (Inspirateur)</div>
            <div class="accordion-content">
                <p>Esprits libres enthousiastes, créatifs et sociables, qui trouvent toujours une raison de sourire.</p>
                <h5>Énergie contagieuse</h5>
                <p>
                    Les Inspirateurs sont des personnes naturellement enthousiastes et pleines de vie. Leur énergie débordante attire les autres et leur enthousiasme devient contagieux. Ils sont capables de se transformer en un instant, passant d’un idéaliste passionné à une personne insouciante profitant d’une danse sur la piste. Leur charisme et leur approche enthousiaste de la vie créent une atmosphère d’optimisme, où l'on se sent inspiré à vivre pleinement. 
                    <br><br>
                    Mais derrière leur attitude joyeuse, les ENFP sont des individus profonds, cherchant des connexions authentiques et émotionnelles avec ceux qui les entourent. Leur curiosité insatiable les pousse à explorer les multiples facettes de la vie et à trouver des solutions innovantes aux défis. Les Inspirateurs ne sont pas seulement des rêveurs, mais des personnes qui ont la capacité de transformer leurs idées et leurs passions en actions concrètes. Leur créativité leur permet de voir le monde sous un angle unique, et leur enthousiasme devient un moteur puissant pour ceux qui les entourent.
                </p>

                <h5>Recherche de nouvelles expériences</h5>
                <p>
                    L’une des caractéristiques les plus marquantes des ENFP est leur quête constante de nouvelles expériences. Ils sont attirés par l'inconnu, les idées novatrices et les aventures excitantes. Ils aiment sortir de leur zone de confort pour découvrir de nouvelles perspectives, que ce soit à travers des voyages, des rencontres ou des idées qui bousculent leur façon de voir le monde. Cette ouverture d'esprit leur permet d'enrichir constamment leur vie, tout en apportant une touche de fraîcheur à leur entourage.
                    <br><br>
                    Leur vie intérieure est tout aussi riche que leur vie sociale. Bien que sociables et extravertis, les Inspirateurs sont aussi capables de moments d’introspection profonde. Ils sont constamment à la recherche de sens et de connexion dans tout ce qui les entoure. Cette curiosité intérieure leur permet de créer des liens profonds avec les autres, tout en explorant leur propre essence. 
                    <br><br>
                    Cependant, cette soif d’aventure et de découverte peut parfois mener à un manque de constance. Une fois l’excitation d’un nouveau projet ou d’une nouvelle expérience dissipée, les ENFP peuvent se désintéresser et passer à autre chose. Ils peuvent avoir du mal à maintenir leur enthousiasme sur le long terme et à faire preuve de discipline, ce qui peut les amener à commencer de nombreux projets sans les terminer.
                </p>

                <h5>Le besoin d'authenticité et de connexions émotionnelles</h5>
                <p>
                    Les ENFP sont profondément attachés à l’idée de créer des relations authentiques et sincères. Ils recherchent des connexions émotionnelles qui leur permettent de se sentir compris et valorisés. Leur approche des autres est transparente et chaleureuse, ce qui les rend généralement très appréciés dans leurs cercles sociaux. Cependant, ce besoin d’authenticité peut parfois rendre les ENFP vulnérables, car ils ne supportent pas la superficialité ou les relations sans profondeur. 
                    <br><br>
                    Dans leurs relations personnelles comme professionnelles, ils préfèrent éviter les interactions futiles, cherchant toujours des conversations significatives et enrichissantes. Cela peut parfois les amener à se sentir déçus ou frustrés si leurs attentes ne sont pas satisfaites. Leur quête de véritables connexions les pousse à éviter les environnements où les gens ne sont pas ouverts ou sincères.
                </p>

                <h5>Les défis de l'auto-discipline et de la constance</h5>
                <p>
                    Bien que les ENFP soient des sources d’inspiration pour les autres, ils rencontrent parfois des défis en ce qui concerne l'auto-discipline. Leur enthousiasme et leur passion peuvent les amener à se lancer dans de nouveaux projets ou aventures, mais ils peuvent avoir du mal à maintenir leur engagement sur le long terme. Lorsque l’enthousiasme initial s'estompe, ils peuvent perdre leur motivation et se concentrer sur quelque chose de nouveau qui capte leur attention. 
                    <br><br>
                    Cette tendance à se laisser emporter par leurs émotions et à changer fréquemment de direction peut leur nuire dans certains contextes, surtout dans des situations qui demandent de la constance et de la persévérance. Les ENFP doivent donc apprendre à équilibrer leur enthousiasme naturel avec une capacité à se concentrer et à terminer ce qu'ils ont commencé.
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
                    Les Logisticiens possèdent une éthique de travail exceptionnelle et une capacité impressionnante à respecter leurs engagements. Ils sont les personnes sur lesquelles on peut toujours compter pour faire ce qui doit être fait. Ce type de personnalité est fier de son intégrité et de sa capacité à honorer ses promesses. Ils ont un sens du devoir inébranlable, ce qui les pousse à accomplir leurs tâches de manière méthodique et rigoureuse, sans se laisser influencer par des distractions.
                    <br><br>
                    Pour un Logisticien, l’honnêteté et la responsabilité sont des valeurs fondamentales. Ils croient en la nécessité de respecter les règles et d’agir de manière juste et équitable. Bien qu'ils n'aient pas pour objectif de se faire remarquer, leur travail acharné et leur fiabilité font d'eux les piliers sur lesquels repose la stabilité de nombreuses institutions et communautés. Les Logisticiens ne cherchent pas la reconnaissance, mais ils savent qu'ils sont indispensables à la bonne marche des choses. Ils prennent leurs responsabilités au sérieux, ce qui leur permet de jouer un rôle essentiel dans le maintien de l'ordre et de la structure dans tous les domaines de leur vie.
                </p>

                <h5>Forte organisation</h5>
                <p>
                    Les Logisticiens sont des maîtres dans l’art de l’organisation. Leur rigueur et leur discipline leur permettent de gérer efficacement leurs responsabilités, même dans les situations les plus complexes. Ils sont naturellement attirés par des environnements structurés où les règles sont claires et où l'on attend des individus qu'ils respectent des standards élevés de performance.
                    <br><br>
                    Le sens de l'organisation des Logisticiens ne se limite pas à leur travail, mais s'étend également à leur vie personnelle. Ils aiment avoir un plan et une routine claire, car cela leur permet de gérer leur temps et leurs ressources de manière optimale. Leur capacité à établir des priorités et à suivre un calendrier rigoureux fait d'eux des individus extrêmement efficaces. Ils ont une forte conviction qu’il existe une bonne façon de faire les choses, et qu’ignorer cette méthode revient à compromettre la qualité et l’efficacité.
                    <br><br>
                    Le respect des traditions et des structures hiérarchiques est essentiel pour de nombreux Logisticiens. Ils se sentent à l’aise dans des environnements où l’ordre est la norme, que ce soit dans un cadre professionnel, familial ou éducatif. Ils comprennent intuitivement que l’efficacité vient de la clarté des attentes et de la cohérence dans les actions. L'absence de structure ou d'objectifs clairs peut provoquer un sentiment de désorientation ou de frustration chez un Logisticien, car cela va à l'encontre de leur besoin fondamental de stabilité et de prévisibilité.
                </p>

                <h5>Responsabilité et épuisement potentiel</h5>
                <p>
                    Le dévouement des Logisticiens est une qualité admirable, souvent à l’origine de nombreuses réussites personnelles et professionnelles. Cependant, ce sens du devoir peut aussi devenir une faiblesse. En raison de leur nature consciencieuse et de leur tendance à assumer plus de responsabilités que nécessaire, les Logisticiens peuvent parfois se retrouver surchargés de travail. Ils ont une forte tendance à prendre sur eux les tâches des autres, surtout si cela garantit que les choses seront faites correctement.
                    <br><br>
                    Bien qu'ils ne se plaignent pas de leurs obligations, cette attitude peut parfois mener à l'épuisement. Les Logisticiens peuvent se retrouver à porter un fardeau supplémentaire en essayant de satisfaire les attentes des autres, ce qui peut finir par nuire à leur propre bien-être. Ils sont tellement dévoués à accomplir ce qu'ils ont promis qu'ils ont parfois du mal à demander de l'aide ou à reconnaître leurs limites. En conséquence, ils peuvent devenir surmenés ou même démoralisés si leurs efforts sont ignorés ou non reconnus.
                    <br><br>
                    Il est donc important pour les Logisticiens d'apprendre à déléguer et à gérer leur charge de travail de manière plus équilibrée. Bien qu'ils aient un fort désir d'être fiables et responsables, il est essentiel qu'ils prennent également soin de leur propre santé mentale et physique pour éviter l'épuisement. Apprendre à dire non et à accepter l'aide des autres peut aider un Logisticien à maintenir son efficacité tout en préservant son bien-être.
                </p>

                <h5>Fiabilité et Loyauté</h5>
                <p>
                    Les Logisticiens sont des personnes extrêmement fiables et loyales. Ils sont dignes de confiance, et ceux qui les entourent savent qu'ils peuvent compter sur eux dans les moments difficiles. Leur engagement envers leurs proches, leur famille et leur communauté est sans faille. Ils valorisent les relations solides et durables, et ils s'efforcent de maintenir l'harmonie et l'ordre dans leurs interactions.
                    <br><br>
                    Leur loyauté est particulièrement évidente dans leurs engagements à long terme, que ce soit au sein de leur famille, de leur cercle social ou de leur carrière professionnelle. Ils cherchent à bâtir des relations de confiance sur des bases solides, ce qui leur permet de créer des liens durables avec les autres. Cette fidélité et cette fiabilité font des Logisticiens des amis et des collègues précieux.
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
                <p>Les Défenseurs (ISFJ) sont des protecteurs loyaux et attentionnés, toujours prêts à défendre et soutenir les autres. Leur nature discrète et altruiste les pousse à agir sans chercher de reconnaissance, contribuant silencieusement au bien-être de ceux qui les entourent.</p>
                <h5>Altruisme naturel</h5>
                <p>
                    Les Défenseurs sont profondément dévoués à ceux qu'ils aiment. Ils veillent à respecter les engagements et à maintenir des liens solides, en se souvenant des anniversaires, en soutenant leurs proches dans les moments importants et en préservant les traditions familiales. Discrets dans leurs actions, ils préfèrent accomplir leurs tâches avec soin, sans se soucier d'attirer l'attention sur eux. Leur altruisme est sincère, et ils se sentent épanouis lorsqu'ils peuvent apporter leur aide, même dans les détails les plus quotidiens.
                    <br><br>
                    Dotés de nombreuses compétences, les Défenseurs sont aussi capables d'analyse et possèdent un grand sens du détail. Leur nature attentionnée est équilibrée par une capacité à résoudre des problèmes pratiques. Bien que réservés, ils entretiennent des relations sociales solides, grâce à leurs compétences relationnelles développées. En dépit de leur modestie, les Défenseurs brillent par leurs multiples talents, qu'ils déploient dans leur vie quotidienne avec efficacité et discrétion.
                </p>

                <h5>Discrétion et humilité</h5>
                <p>
                    Les Défenseurs préfèrent agir en arrière-plan, accomplissant leurs tâches avec soin et humilité. Ils sont loyaux, et cette loyauté se reflète dans leurs relations personnelles et professionnelles. Rares sont ceux qui laissent leurs amitiés ou leurs relations se dégrader par manque d'efforts. Ils investissent une grande énergie pour maintenir des liens solides avec leurs proches, toujours prêts à répondre présents lorsque quelqu'un a besoin d'eux. 
                    <br><br>
                    Leur sens de la loyauté va au-delà de leurs proches, et s'étend parfois à leur communauté, leurs employeurs ou même à des traditions familiales. Cependant, cette loyauté peut les amener à être exploités par ceux qui profitent de leur nature serviable. Les Défenseurs peuvent se retrouver submergés de travail et ressentir du stress lorsqu'ils envisagent des changements ou des ajustements nécessaires pour leur bien-être personnel. Leurs efforts constants pour soutenir les autres peuvent parfois les épuiser.
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
                    <p>Les Directeurs (ESTJ) sont des personnalités énergiques, organisées et ambitieuses, prêtes à imposer de l'ordre dans le chaos. Ils aiment prendre en charge des situations complexes et mettre en place des systèmes efficaces qui permettent d'atteindre des objectifs concrets. Les Directeurs sont des leaders naturels, capables de diriger avec assurance et de guider leur entourage vers la réussite grâce à leur pragmatisme et à leur discipline.</p>
                    <h5>Pragmatisme et Leadership</h5>
                    <p>
                        Les Directeurs sont avant tout des décideurs pratiques et rationnels. Ils abordent la vie avec une vision claire et une capacité exceptionnelle à résoudre les problèmes de manière rapide et efficace. Grâce à leur sens aigu de l’organisation, ils savent établir des plans et des stratégies qui mènent à des résultats concrets. Leur leadership est exercé de manière directe et décisive, ce qui leur permet de motiver ceux qui les entourent à suivre leur exemple. Ils sont souvent perçus comme des personnes capables de prendre des décisions difficiles sans hésiter, tout en assurant que les tâches sont exécutées de manière rigoureuse et méthodique.
                        <br><br>
                        Leur approche pratique et logique leur permet de rester concentrés sur l’objectif final, sans se laisser distraire par des détails inutiles. Ils sont également très efficaces dans la gestion des ressources et la coordination des efforts de groupe, apportant une clarté bienvenue dans des environnements souvent chaotiques. Un ESTJ ne craint pas de prendre des responsabilités et sait gérer les équipes avec fermeté et efficacité, garantissant que tout le monde connaît son rôle et ses attentes.
                    </p>
                    <h5>Attachement aux Traditions</h5>
                    <p>
                        Les Directeurs sont des individus profondément attachés aux traditions, aux normes et aux valeurs établies. Ils croient fermement en l’importance du respect des règles et de l’ordre dans tous les aspects de la vie. Cette approche traditionnelle les pousse souvent à défendre des principes bien ancrés et à s’opposer aux idées ou aux comportements qu’ils jugent déstabilisants ou imprudents. Ils ont une grande estime pour les institutions et les structures qui ont fait leurs preuves au fil du temps et considèrent la stabilité comme un élément clé pour réussir.
                        <br><br>
                        Cette forte adhésion aux traditions peut parfois rendre les ESTJ inflexibles face au changement. Ils préfèrent souvent les méthodes éprouvées aux expérimentations ou aux innovations qui pourraient perturber l’équilibre. Pour eux, l’ordre et la discipline sont essentiels pour que les choses fonctionnent correctement, que ce soit dans le cadre professionnel ou personnel. Leur attachement aux traditions se reflète également dans leur façon de gérer les relations interpersonnelles, où ils s’efforcent de maintenir des liens solides basés sur la loyauté et la réciprocité.
                        <br><br>
                        Les ESTJ ne sont pas seulement des défenseurs des règles ; ils jouent aussi un rôle clé dans leur mise en œuvre. Que ce soit au sein d’une organisation, d’une famille ou d’une communauté, ils veillent à ce que les attentes soient claires et que les comportements respectent les normes établies. Leur sens de la justice les pousse à être honnêtes et directs, même lorsqu’il s’agit d’adresser des problèmes ou des conflits.
                    </p>
                    <h5>Réalistes et Résolus</h5>
                    <p>
                        Les Directeurs sont des réalistes, toujours ancrés dans la réalité et préoccupés par l'atteinte d'objectifs tangibles. Ils n'ont pas de temps à perdre avec des idées floues ou irréalistes, préférant se concentrer sur des actions concrètes qui apportent des résultats mesurables. Leur grande capacité de travail, combinée à un sens de la discipline implacable, les rend extrêmement efficaces dans la gestion des défis quotidiens.
                        <br><br>
                        Les ESTJ sont également des personnes très résolues, une fois qu'ils ont pris une décision, ils s'y tiennent avec détermination. Ils sont souvent perçus comme des personnes persévérantes qui ne laissent pas les obstacles ou les échecs les détourner de leur chemin. Pour eux, la réussite est avant tout le fruit de l’effort, de l’engagement et de la rigueur. Ils sont également très exigeants envers eux-mêmes et attendent des autres qu'ils partagent leur niveau de dévouement et d’efficacité.
                    </p>
                    <h5>Un sens de la responsabilité</h5>
                    <p>
                        Les ESTJ portent un sens de la responsabilité qui est l'un des moteurs de leur vie. Ils croient en l'importance de prendre des responsabilités et de s'assurer que les autres font de même. Cela fait d’eux des personnes dignes de confiance qui s’engagent à tenir leurs promesses et à remplir leurs obligations. Leur sens du devoir est renforcé par leur volonté de maintenir un environnement stable et ordonné, que ce soit à la maison ou au travail.
                        <br><br>
                        En tant que leaders, ils s'assurent que les autres respectent leurs engagements, et ils n’hésitent pas à remettre les personnes qui ne font pas preuve de discipline à leur place. Cependant, ils sont également prêts à récompenser ceux qui s’investissent et respectent les attentes. Les ESTJ sont fiers de leur capacité à gérer des situations complexes et à garantir la bonne marche des choses, que ce soit dans un cadre professionnel ou personnel.
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
                <p>Les Consuls sont des personnalités chaleureuses et sociables, toujours prêtes à soutenir leurs proches.</p>
                <h5>Empathie et Générosité</h5>
                <p>
                    Les Consuls se soucient sincèrement des autres et s'efforcent de renforcer les relations humaines. Pour eux, la vie est plus agréable lorsqu’elle est partagée avec autrui. Ils constituent souvent le pilier de nombreuses communautés, accueillant amis, famille et voisins dans leur maison et dans leur cœur.
                    <br><br>
                    Cela ne signifie pas que les Consuls sont toujours d'accord avec tout le monde ou qu’ils sont exempts de défauts. Cependant, ils croient fermement au pouvoir de l’hospitalité et des bonnes manières, se sentant investis d’un devoir envers ceux qui les entourent. Fiables et généreux, ils font tout leur possible pour maintenir l'unité au sein de leur famille et de leurs proches, souvent à travers des actions aussi bien petites que significatives.
                </p>
                <h5>Forte Conscience Sociale</h5>
                <p>
                    Les Consuls sont animés par un sens profond de l'altruisme. Ils prennent très au sérieux leur responsabilité d’aider les autres, de rendre ce qu'ils ont reçu et de faire ce qui est juste.
                    <br><br>
                    Convaincus qu'il existe toujours une voie juste dans presque toutes les situations, les Consuls peuvent avoir du mal à accepter des choix qu’ils jugent erronés, surtout chez ceux qu’ils aiment. Alors que certains types de personnalité adoptent une approche plus tolérante, les Consuls ont tendance à être plus critiques et moins enclins à laisser passer des décisions qu’ils considèrent comme mal orientées.
                    <br><br>
                    Dotés d’une grande capacité à comprendre les besoins de leur communauté, les Consuls cherchent toujours à rassembler les gens. Extravertis et loyaux, ils sont souvent les premiers à se rendre dans les coins de la fête pour s'assurer que tout le monde s’amuse. Mais ne vous y trompez pas : ils ne se contentent pas de passer du temps avec les autres. Leur loyauté est sans faille et ils bâtissent des relations durables sur lesquelles on peut toujours compter, prêt à prêter une oreille attentive ou un coup de main lorsque nécessaire.
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
                  Les Virtuoses s’adaptent rapidement à leur environnement et trouvent des solutions créatives à des problèmes complexes. Ils aiment explorer le monde à travers leurs mains et leurs yeux, en observant et en manipulant les objets autour d’eux avec un esprit rationnel et une curiosité naturelle. Ce type de personnalité est composé de créateurs nés, qui passent d'un projet à l'autre, construisant aussi bien l'utile que l'inutile par simple plaisir, tout en apprenant de leur environnement au fur et à mesure. Que ce soit dans des domaines tels que la mécanique ou l'ingénierie, les Virtuoses apprécient particulièrement de se plonger dans les détails et de démonter pour comprendre.
                </p>
                <h5>Indépendance et curiosité</h5>
                <p>
                  Les Virtuoses préfèrent explorer le monde à leur manière, guidés 
                  par une intuition pratique et une soif d’inconnu. Bien que leurs 
                  intérêts mécaniques puissent donner l'impression qu'ils sont simples, 
                  les Virtuoses sont en réalité assez mystérieux. Ils peuvent être amicaux 
                  tout en restant très discrets, calmes tout en étant soudainement spontanés, 
                  et extrêmement curieux sans jamais se conformer à des études ou des structures 
                  rigides. Leur personnalité peut être difficile à cerner, même pour leurs proches. 
                  Bien qu'ils puissent sembler loyaux et stables pendant un certain temps, 
                  ils ont tendance à accumuler une énergie impulsive qui finit par éclater, 
                  les poussant à explorer de nouvelles directions audacieuses.
                </p>
                <p>
                    Les Virtuoses découvrent rapidement que beaucoup d’autres types de personnalités suivent des règles sociales plus strictes qu’eux. Par exemple, ils n’ont aucun intérêt à raconter des blagues indélicates, et encore moins à les entendre. Ils n'apprécient pas les jeux physiques, même avec un consentement, et peuvent parfois franchir des limites émotionnelles, ce qui pourrait avoir des conséquences imprévues dans des situations sensibles.
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
                Les Aventuriers abordent la vie avec une perspective unique et un désir constant d’expression personnelle. Chaque Aventurier est indéniablement unique. Animés par la curiosité et un besoin de découvrir de nouvelles choses, ils possèdent souvent une variété fascinante de passions et d'intérêts. Grâce à leur esprit d'exploration et leur capacité à trouver de la joie dans les petites choses de la vie, les Aventuriers sont parmi les personnes les plus intéressantes que vous rencontrerez.
                </p>
                <h5>Connexion avec leurs émotions</h5>
                <p>
                  Les Aventuriers trouvent du sens dans les 
                  expériences émotionnelles et artistiques, qui 
                  enrichissent leur vision du monde. Leur attitude 
                  souple et adaptable face à la vie leur permet de 
                  vivre pleinement l'instant présent. Contrairement 
                  à d'autres types de personnalité qui prospèrent dans 
                  des routines strictes, les Aventuriers préfèrent 
                  suivre leurs envies, en laissant une grande place à
                   l'imprévu. Ainsi, beaucoup de leurs souvenirs les
                    plus précieux sont liés à des aventures spontanées, vécues seuls ou avec leurs proches.
                </p>
                <p>
                    Cette flexibilité d'esprit rend les Aventuriers particulièrement tolérants et ouverts d'esprit. Ils s'épanouissent dans un monde diversifié, même parmi ceux qui ne partagent pas leurs idées ou choisissent des modes de vie radicalement différents. Il n'est donc pas surprenant qu'ils soient souvent attirés par des environnements variés et enrichissants.
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
                    Les Entrepreneurs prospèrent dans des 
                    environnements dynamiques, où ils 
                    peuvent explorer des opportunités inattendues.
                </p>
                <h5>Charisme naturel</h5>
                <p>
                  Leur confiance et leur enthousiasme les 
                  rendent irrésistibles et capables de rassembler les 
                  gens. Dotés d'une vision perspicace et sans filtre, 
                  les Entrepreneurs ont un talent rare pour repérer 
                  les moindres changements. Qu'il s'agisse 
                  d’une nouvelle expression faciale, d’un changement 
                  de look ou d’une habitude abandonnée, ils saisissent 
                  immédiatement les motivations et pensées cachées 
                  que la plupart des gens ne perçoivent pas. 
                  Ils utilisent ces observations sur-le-champ, 
                  soulevant souvent des questions sans se soucier
                   de la sensibilité des autres. Les Entrepreneurs 
                   doivent toutefois se rappeler que certains 
                   préfèrent que leurs secrets et décisions restent 
                   privés.
                </p>
                <h5>Plongée dans l'Action</h5>
                <p>
                    Les Entrepreneurs sont les plus enclins à 
                    adopter un mode de vie audacieux. 
                    Ils vivent dans l'instant et se lancent 
                    à toute vitesse dans l'action – ils sont l’œil du 
                    cyclone. Ce type de personnalité aime le drame, 
                    la passion et le plaisir, non pas pour l'excitation
                     pure, mais parce que cela stimule leur esprit 
                     analytique. Ils prennent des décisions cruciales
                      en se basant sur des faits, réagissant rapidement 
                      et rationnellement aux événements qui se 
                      déroulent autour d’eux.
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
                  En quête constante de nouvelles expériences, 
                  les Amuseurs abordent la vie de manière intuitive. 
                  Ils possèdent un sens esthétique très développé, 
                  plus que tout autre type de personnalité. 
                  Que ce soit pour prendre soin d'eux-mêmes, 
                  choisir leur tenue ou aménager leur intérieur, 
                  les Amuseurs ont un vrai talent pour créer 
                  un environnement agréable. Ils savent immédiatement 
                  ce qui est beau et n’hésitent pas à transformer 
                  leur espace pour qu’il reflète leur style personnel. 
                  Curieux de nature, ils explorent sans cesse 
                  de nouveaux designs et styles.
                </p>
                <h5>Tempérament Spontané</h5>
                <p>
                    Le principal défi pour les Amuseurs 
                    réside dans leur tendance à se concentrer 
                    sur les plaisirs immédiats, ce qui peut les 
                    amener à négliger les responsabilités nécessaires 
                    pour en profiter. Ils trouvent difficile d’analyser
                     des situations complexes, d’effectuer des 
                     tâches répétitives, ou de comprendre les liens 
                     entre les statistiques et leurs conséquences
                      réelles. Plutôt que de se plonger dans ces activités, ils préfèrent se fier à la chance, aux opportunités ou demander de l’aide à leurs nombreux amis. Il est crucial que les Amuseurs s'efforcent de fixer des objectifs à long terme, comme planifier leur retraite ou réduire leur consommation de sucre, car il n’y aura pas toujours quelqu’un pour les aider à suivre ces aspects.
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
