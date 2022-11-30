<?php $title = "Edit" ?>
<?php $titleLayout = "Exercice: " . $bag['id_exercise'] ?>

<div class="row">
  <section class="column">
    <h1>Fields</h1>
    <table class="records">
      <thead>
        <tr>
          <th>Label</th>
          <th>Value kind</th>
          <th></th>
        </tr>
        <?php
        foreach ($bag['data'] as $question) {
          echo '<tr><td>' . $question->getTitle() . '</td><td>';
          switch ($question->getType()) {
            case 0:
              echo 'single_line';
              break;
            case 1:
              echo 'single_line_list';
              break;
            case 2:
              echo 'multi_line';
              break;
          }
          echo '</td><td><a title="Edit" href="/exercises/' . $bag['id_exercise'] . '/fields/' . $question->getId() . '/edit">
                <i class="fa fa-edit"></i></a><a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete" href="/exercises/fields/' . $question->getId() . '">
                <i class="fa fa-trash"></i></a></td></tr>';
        }
        ?>
      </thead>

      <tbody>
      </tbody>
    </table>

    <a data-confirm="Are you sure? You won't be able to further edit this exercise" class="button" rel="nofollow" data-method="put" href=""><i class="fa fa-comment"></i> Complete and be ready for answers</a>

  </section>
  <section class="column">
    <h1>New Field</h1>
    <form action="" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="">

      <div class="field">
        <label for="field_label">Label</label>
        <input type="text" name="field[label]" id="field_label">
      </div>

      <div class="field">
        <label for="field_value_kind">Value kind</label>
        <select name="field[value_kind]" id="field_value_kind">
          <option selected="selected" value="0">Single line text</option>
          <option value="1">List of single lines</option>
          <option value="2">Multi-line text</option>
        </select>
      </div>

      <div class="actions">
        <input type="submit" name="commit" value="Create Field" data-disable-with="Create Field">
      </div>
    </form>
  </section>
</div>