  <title>ExerciseLooper</title>
  <meta name="csrf-param" content="authenticity_token">
  <meta name="csrf-token" content="gWH9ByBa+6oonu3EmJciT1YdItdoWjQh47Auk+Pd38yULNvjONUBpOtBd/FLkShttjupA2JBBj053W0E2KWkKg==">


  <link rel="stylesheet" media="all" href="./ExerciseLooper_files/application-264507a893987846393b8514969b89293817c54265354e63e6ab61fb46193f89.css">
  <script src="./ExerciseLooper_files/application-212289bcba525f2374cdbd70755ea38f2cfdd35d479e9638fae0b2832fac5dac.js.téléchargement"></script>



  <h1>Editing Field</h1>

  <form action="/exercises/<?= $bag['id_exercise']   ?>/fields/<?= $bag['data'][0]->getId() ?>" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="_method" value="patch"><input type="hidden" name="authenticity_token" value="gWH9ByBa+6oonu3EmJciT1YdItdoWjQh47Auk+Pd38yULNvjONUBpOtBd/FLkShttjupA2JBBj053W0E2KWkKg==">

      <div class="field">
          <label for="field_label"><?= $bag['data'][0]->getTitle() ?> </label>
          <input type="text" value="" name="label" id="field_label">
      </div>

      <div class="field">
          <label for="field_value_kind">Value kind</label>
          <select name="value_kind" id="field_value_kind">
              <?php
                switch ($bag['data'][0]->getType()) {

                    case 0:
                        echo '<option selected="selected" value="0">Single line text';
                        echo '<option value="1">List of single lines';
                        echo '<option value="2">Multi-line text';
                        break;
                    case 1:
                        echo '<option value="0">Single line text';
                        echo '<option selected="selected" value="1">List of single lines';
                        echo '<option value="2">Multi-line text';
                        break;
                    case 2:
                        echo '<option value="0">Single line text';
                        echo '<option value="1">List of single lines';
                        echo '<option selected="selected" value="2">Multi-line text';
                        break;
                }
                echo '</option>'; ?>


          </select>
      </div>

      <div class="actions">
          <input type="submit" name="commit" value="Update Field" data-disable-with="Update Field">
      </div>
  </form>