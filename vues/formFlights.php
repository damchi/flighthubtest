<div class="formFlight">

    <h1> Add flight</h1>
    <form class="form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id"">

        <!-- Airline -->
        <select name="airline_id">
            <option value="">Airline *</option>
            <?php
            foreach ( $data['airlines']as  $airlines){
                echo '<option value="'.$airlines['id']. '">'.$airlines['name_airline'].'</option>';
            }
            ?>
        </select>

        <!-- Flight number -->
        <div class="group">
            <label class="icon_form">Flight number *</label>
            <input type="number" class="input" name="number_flight" required>
        </div>


        <!-- Departure -->

        <select name="departure_airport_id">
            <option value="">Departure airport *</option>
            <?php
            foreach ( $data['airports'] as  $airports){
                echo '<option value="'.$airports['id']. '">'.$airports['name_airports'].'</option>';
            }
            ?>
        </select>

        <!-- Departure Time -->
        <div class="group">
            <label class="icon_form">Departure time *</label>
            <input type="time" class="input" name="departure_time" required>
        </div>


        <!-- Arrival -->
        <select name="arrival_airport_id">
            <option value="">Arrival airport *</option>
            <?php
            foreach ( $data['airports'] as  $airports){
                echo '<option value="'.$airports['id']. '">'.$airports['name_airports'].'</option>';
            }
            ?>

        </select>

        <!-- Arrival Time -->
        <div class="group">
            <label class="icon_form">Arrival time *</label>
            <input type="time" class="input" name="arrival_time"  required>
        </div>

        <!--Price  -->
        <div class="group">
            <label class="icon_form">Price *</label>
<!--            <input type="number" class="input"  name="price" required>-->
            <input type="number" class="input" step="any" min="0" lang="en" name="price" required>

        </div>


        <!-- Légende -->
        <div>
            Tous les champs (*) sont obligatoires
        </div>

        <!-- Bouton enregistrer -->
        <div class="group">
            <input type="submit" value="Enregistrer" name="submitFormFlight">
        </div>
    </form>
</div>
