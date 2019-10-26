<h1>Find a trip</h1>
<div class="formTrip">
    <form class="form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id"">

        <!-- Departure -->
        <input type="radio" name="roundTrip" value="round" checked> Round trip<br>
        <input type="radio" name="roundTrip" value="single"> Single way

        <select name="departure_trip">
            <option value="">Departure airport *</option>
            <?php

            foreach ( $data['airports'] as  $airports){
                echo '<option value="'.$airports['id']. '">'.$airports['name_airports'].'</option>';
            }
            ?>
        </select>

<div id="insertChild"></div>
        <!-- Bouton enregistrer -->
        <div>
            <input type='button' value='Find a trip' name='submitFormTrip'>
        </div>
    </form>
</div>

<div id="insertTrips"></div>

<div id="insertPrice"></div>


