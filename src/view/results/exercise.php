    <?php $title = "ExerciseLooper" ?>
  
    <h1>Your take</h1>
<p>If you'd like to come back later to finish, simply submit it with blanks</p>

<form action="/exercises/<?php echo $bag['exercise']->getId() ?>/fulfillments/new" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="goPnseTvPZq7ow/DCYxsi6X+BZ/8nSFYyFsbCSloyD+AOTdq6WAb65D1Z+S5KFu620sShVUDw40P03vLAwQbpA==">
  
    
    <?php foreach($bag['questions'] as $question) : ?>
      <!--<input type="hidden" value="594" name="fulfillment[answers_attributes][][field_id]" id="fulfillment_answers_attributes__field_id">
      <div class="field">
        <label for="fulfillment_answers_attributes__value">&lt;b&gt;new question&lt;/b&gt;</label>
        <input type="text" name="fulfillment[answers_attributes][][value]" id="fulfillment_answers_attributes__value">

      </div>-->
      <div class="fied">
        <label for="<?= $question->getId() ?>"><?= $question->getTitle() ?></label>
        <?php 
        switch ($question->getType()){
          case 0:
            echo '<input type="text" name="'.$question->getId().'" id="'.$question->getId().'">';
            break;
          case 1:
            echo '<textarea name="'.$question->getId().'" id="'.$question->getId().'"></textarea>';
            break;
          case 2:
            echo '<textarea name="'.$question->getId().'" id="'.$question->getId().'"></textarea>';
            break;
        }
        ?>
      </div>
    <?php endforeach ?>
      <div class="actions">
        <input type="submit" name="commit" value="Save" data-disable-with="Save">
      </div>
</form>