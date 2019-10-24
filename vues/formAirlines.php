<div class="formAirlines">

    <h1> Add airline</h1>
    <form class="form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id"">

        <!-- Code -->
        <div class="group">
            <label class="icon_form">Code *</label>
            <input type="text" name="code" placeholder="code">
        </div>

        <!-- Name -->
        <div class="group">
            <label class="icon_form">Name *</label>
            <input type="text" class="input" name="name_airline" placeholder="Name" required>
        </div>
        <!-- Légende -->
        <div>
            Tous les champs (*) sont obligatoires
        </div>

        <!-- Bouton enregistrer -->
        <div class="group">
            <input type="submit" value="Enregistrer" name="submitFormAirline">
        </div>
    </form>
</div>
