<div class="interet-overlay" id="reportPanel" style="display: none;">
        <div class="report-modal">
            <h3 class="titreModalInteret">Signalement</h3>
            <form action="{{ route("ReportUser")}}" method="POST">
                @csrf
                <div>
                    <select name="objectTypeId" required>
                        <option disabled selected value>-- choisissez une raison --</option>
                        @foreach ($reportsReasons as $reportReason)
                            <option value="{{$reportReason->id}}">{{$reportReason->name}}</option>
                        @endforeach
                    </select>
                </div><br><br>
                <div>
                    <textarea maxlength="1000" name="object" cols="50" rows="10"></textarea>
                    <input type='hidden' class="errorMessage" name='userId' value="{{$user->id}}"></input>
                    <input type="submit" class="red_button" value="Signalé">
                    <button type="button" class="interet-btn-annuler" onclick="window.location.href='{{ route('profile', $user->id) }}'">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>
