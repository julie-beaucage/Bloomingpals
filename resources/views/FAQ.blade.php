@extends('master')

@section('title', 'FAQ')

@section('content')
<div class="faq-container">
    <h1>FAQ - BloomingPals</h1>

    <div class="accordion">
        <div class="accordion-item">
            <div class="accordion-header">Quel est le but du site web BloomingPals ?</div>
            <div class="accordion-body">
                <p>Le but est d'aider les utilisateurs à s'épanouir socialement en se faisant de nouveaux amis partageant des intérêts et des personnalités similaires.</p>
            </div>
        </div>

        <div class="accordion-item">
            <div class="accordion-header">Qu'est-ce qu'un meetup ?</div>
            <div class="accordion-body">
                <p>Un meetup est une rencontre que les utilisateurs peuvent créer. Ils peuvent choisir le thème, la date, le lieu et le nombre de participants autorisés.</p>
            </div>
        </div>

        <div class="accordion-item">
            <div class="accordion-header">Qu'est-ce qu'un événement ?</div>
            <div class="accordion-body">
                <p>Un événement est une activité ou une occasion spéciale, souvent tirée directement du site Evenoko. Les utilisateurs peuvent s'y inscrire ou s'en inspirer pour créer leurs propres meetups.</p>
            </div>
        </div>

        <div class="accordion-item">
            <div class="accordion-header">De quoi est basé le test de personnalité BloomingPals ?</div>
            <div class="accordion-body">
                <p>Le test de personnalité BloomingPals est basé sur le modèle Myers-Briggs Type Indicator (MBTI). Ce modèle explore 16 types de personnalité en combinant quatre dimensions principales.</p>
            </div>
        </div>

        <div class="accordion-item">
            <div class="accordion-header">Qui sont Myers et Briggs ?</div>
            <div class="accordion-body">
                <p>Katharine Cook Briggs et sa fille Isabel Briggs Myers ont développé l'indicateur MBTI pour aider les individus à mieux comprendre leurs préférences psychologiques et leurs interactions avec les autres.</p>
            </div>
        </div>

        <div class="accordion-item">
            <div class="accordion-header">Que signifient les lettres du test MBTI ?</div>
            <div class="accordion-body">
                <ul>
                    <li><strong>E (Extraversion)</strong> : Orienté vers le monde extérieur, aime interagir avec les autres.</li>
                    <li><strong>I (Introversion)</strong> : Préfère se concentrer sur son monde intérieur et les idées.</li>
                    <li><strong>S (Sensation)</strong> : Se concentre sur les faits et les détails concrets.</li>
                    <li><strong>N (Intuition)</strong> : Préfère se concentrer sur les concepts et les possibilités.</li>
                    <li><strong>T (Thinking)</strong> : Prend des décisions basées sur la logique et les faits.</li>
                    <li><strong>F (Feeling)</strong> : Prend des décisions en tenant compte des émotions et des valeurs.</li>
                    <li><strong>J (Judging)</strong> : Préfère une structure et une organisation dans la vie.</li>
                    <li><strong>P (Perceiving)</strong> : Préfère être flexible et spontané.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    document.querySelectorAll('.accordion-header').forEach(header => {
        header.addEventListener('click', () => {
            const accordionItem = header.parentElement;
            accordionItem.classList.toggle('active');
        });
    });
</script>
@endsection
