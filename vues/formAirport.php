<div class="formAirport">

    <h1> Add airport</h1>
    <form class="form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id"">

        <!-- Code -->
        <div class="group">
            <label class="icon_form">Code *</label>
            <input type="text" name="code" placeholder="code">
        </div>

        <!-- City code -->
        <div class="group">
            <label class="icon_form">City code *</label>
            <input type="text" class="input" name="city_code" placeholder="City code" required>
        </div>

        <!-- Name -->
        <div class="group">
            <label class="icon_form">Name *</label>
            <input type="text" class="input" name="name_airports" placeholder="Name" required>
        </div>


        <!-- City -->
        <div class="group">
            <label class="icon_form">City *</label>
            <input type="text"  class="input" name="city" placeholder="City" required>
        </div>

        <!-- Country code -->
        <div class="group">
            <label class="icon_form">Country code *</label>
            <input type="text" class="input" name="country_code" placeholder="Country code" required>
        </div>

        <!-- Country Region -->
        <div class="group">
            <label class="icon_form">Region code *</label>
            <input type="text" class="input" name="region_code" placeholder="Region code" required>
        </div>

        <!-- Latitude -->
        <div class="group">
            <label class="icon_form" >Lattitude *</label>
<!--            <input type="text" class="input" name="latitude" placeholder="Latitude" required>-->
            <input type="number" class="input" step="any"  lang="en" name="latitude" required>

        </div>

        <!-- Longitude -->
        <div class="group">
            <label class="icon_form" >Longitude *</label>
<!--            <input type="text" class="input" name="longitude" placeholder="Longitude" required>-->
            <input type="number" class="input" step="any" lang="en" name="longitude" required>

        </div>

        <!-- Timezone -->
        <div class="group">
            <label class="icon_form" >Timezone*</label>
            <input type="text" class="input" name="timezone" placeholder="Timezone" required>
        </div>


        <!-- Légende -->
        <div>
            Tous les champs (*) sont obligatoires
        </div>

        <!-- Bouton enregistrer -->
        <div class="group">
            <input type="submit" value="Enregistrer" name="submitForm">
        </div>
    </form>
</div>


