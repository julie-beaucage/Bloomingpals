@php
    $confi = Auth::user()->confidentiality;
    $confi_notif = Auth::user()->notification;

    switch ($confi) {
        case 'public':
            $index = 0;
            break;
        case 'friends':
            $index = 1;
            break;
        case 'prive':
            $index = 2;
            break;

        default:
            $index = -1;

    }


@endphp
<div class="modal fade" id="confidentiality" tabindex="-1" aria-labelledby="confidentiality" aria-hidden="true"
    confi-id="{{$index}}" confi-notif="{{4 + ($confi_notif * -1)}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Confidentialité</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="padding:1em;">
                <form method="POST" action="{{ route('profile.update.confidentiality', Auth::user()->id) }}"
                    class="sm-gap">
                    @csrf
                    <h5 class="modal-title underline">Profil</h5>
                    <div class="flex-coll" style="margin-bottom:.5em;">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="confidentiality" id="public"
                                value="public">
                            <label class="form-check-label" style="margin-bottom:.5em;" for="public">
                                Public
                            </label>

                        </div>


                        <div style="margin-left:1em; font-size:.85em;"><i>N'importe qui peux voir vos
                                informations</i></div>


                    </div>

                    <div class="flex-coll" style="margin-bottom:.5em;">
                        <div class="form-check" style="margin-bottom:.5em;">
                            <input class="form-check-input" type="radio" name="confidentiality" id="friends"
                                value="friends">
                            <label class="form-check-label" for="public">
                                Amis
                            </label>
                        </div>
                        <div style="margin-left:1em; font-size:.85em;"><i>Seulement vos amis peuvent voir vos
                            informations</i></div>
                    </div>

                    <div class="flex-coll" style="margin-bottom:.5em;">
                        <div class="form-check disabled" style="margin-bottom:.5em;">
                            <input class="form-check-input" type="radio" name="confidentiality" id="prive"
                                value="prive">
                            <label class="form-check-label" for="prive">
                                Privé
                            </label>

                        </div>
                        <div style="margin-left:1em; font-size:.85em;"><i>Personne ne peux voir vos
                            informations</i></div>
                    </div>

                    <h5 class="modal-title underline">Notifications</h5>

                    <div class="flex-coll" style="margin-bottom:.5em;">
                        <div class="form-check" style="margin-bottom:.5em;">
                            <input class="form-check-input" type="radio" name="notification" id="on" value="1">
                            <label class="form-check-label" for="on">
                                Activé
                            </label>
                        </div>

                    </div>

                    <div class="flex-coll" style="margin-bottom:.5em;">
                        <div class="form-check disabled" style="margin-bottom:.5em;">
                            <input class="form-check-input" type="radio" name="notification" id="off" value="0">
                            <label class="form-check-label" for="off">
                                Désactivé
                            </label>
                        </div>

                    </div>

                    <button type="submit" class="btn-profile {{ $userPersonality }} hover_lighter" style="padding: 0.225em 1em;">Enregistrer les
                        modifications</button>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll("input[type=radio]")[document.querySelector('#confidentiality').getAttribute('confi-id')].checked = true;
    document.querySelectorAll("input[type=radio]")[document.querySelector('#confidentiality').getAttribute('confi-notif')].checked = true;
</script>