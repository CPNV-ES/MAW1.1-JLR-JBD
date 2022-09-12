<?php $title="ExerciseLooper"?>
  
    <div class="row">
  <section class="column">
    <h1>Building</h1>
    <table class="records">
      <thead>
        <tr>
          <th>Title</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
            <?php

              foreach($bag['exercises'] as $exercise){
                if($exercise['state'] == 0){
                  echo '<tr><td>'.$exercise['title'].'</td><td><a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete" href="exercises/' . $exercise["idExercises"] . '"'  . '>Delete</a></td></tr>';
                }
              }
            ?>
           
      </tbody>
    </table>
  </section>

  <section class="column">
    <h1>Answering</h1>
    <table class="records">
      <thead>
        <tr>
          <th>Title</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
            <?php
              foreach($bag['exercises'] as $exercise){
                if($exercise['state'] == 1){
                  echo '<tr><td>'.$exercise['title'].'</td><td></td></tr>';
                }
              }
            ?>
         
      </tbody>
    </table>
  </section>

  <section class="column">
    <h1>Closed</h1>
    <table class="records">
      <thead>
        <tr>
          <th>Title</th>
          <th></th>
        </tr>
      </thead>

      <tbody>
          <tr>
            <td>Mathieu</td>
            <td>
              <a title="Show results" href="https://stormy-plateau-54488.herokuapp.com/exercises/365/results"><i class="fa fa-chart-bar"></i></a>
              <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete" href="https://stormy-plateau-54488.herokuapp.com/exercises/365"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          
      </tbody>
    </table>
  </section>
</div>
