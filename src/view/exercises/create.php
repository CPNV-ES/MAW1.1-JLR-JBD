<?php $title = "CreateExercise" ?>
<h1>New Exercise</h1>
<form action="/exercises" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="H4NTywz5Uu5lskBmT4GsgJ+65+SEMQhJEtyt6DnPoEMdOYMQAXZ0n07kKEH/JZux4Q/w/i2v6pzVVM0qE6Nz2A==">
  <div class="field">
    <label for="exercise_title">Title</label>
    <input type="text" name="exercise[title]" id="exercise_title">
  </div>
  <div class="actions">
    <input type="submit" name="commit" value="Create Exercise" data-disable-with="Create Exercise">
  </div>
</form>