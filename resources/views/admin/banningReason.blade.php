<form action="banUser" id="banUserForm">
    <div class="whitebg" style="padding: 3em; border-radius: 2em">
        <input type="hidden" name="id">
        <div>Veux-tu vraiment bannir <span id="userName"></span>?</div>

        <h4>Raison:</h4>
        <textarea required maxlength="1000" name="reason" cols="50" rows="10"></textarea><br>
        <input type="submit" class="red_button" values="Bannir">
        <button type="button" class="grey_button" onclick="window.location.href='{{ route('AdminReports') }}'">Annuler</button>
    </div>
</form>