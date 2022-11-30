<?php $title = "CreateExercise" ?>
<?php $titleLayout = "New exercice"?>
<main class="container">
  <ul class="ansering-list">
    <?php foreach ($bag['exercises'] as $exercise):?>
      <li class="row">
        <div class="column card">
          <div class="title"><?= $exercise->getTitle() ?></div>
          <a class="button" href="/exercises/<?= $exercise->getId() ?>/fulfillments/new">Take it</a>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</main>

