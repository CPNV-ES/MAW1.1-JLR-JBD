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
                if($exercise->getState() == 0){
                  echo '<tr><td>'.$exercise->getTitle().'</td><td><a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete" href="exercises/' . $exercise->getId() . '"'  . '><i class="fa fa-trash"></i></a></td></tr>';
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
                if($exercise->getState() == 1){
                  echo '<tr><td>'.$exercise->getTitle().'</td><td></td></tr>';
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
          <?php
              foreach($bag['exercises'] as $exercise){
                if($exercise->getState() == 2){
                  echo '<tr><td>'.$exercise->getTitle().'</td><td></td></tr>';
                }
              }
            ?>
            <!--
          <tr>
            <td>Mathieu</td>
            <td>
              <a title="Show results" href="https://stormy-plateau-54488.herokuapp.com/exercises/365/results"><i class="fa fa-chart-bar"></i></a>
              <a data-confirm="Are you sure?" title="Destroy" rel="nofollow" data-method="delete" href="https://stormy-plateau-54488.herokuapp.com/exercises/365"><i class="fa fa-trash"></i></a>
            </td>
          </tr>-->
          
      </tbody>
    </table>
  </section>
</div>
