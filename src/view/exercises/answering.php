<!-- saved from url=(0062)https://stormy-plateau-54488.herokuapp.com/exercises/answering -->
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
  <header class="heading answering">
    <section class="container">
      <a href="/"><img src="/images/logo.png"></a>

    </section>
  </header>

  <main class="container">



    <title>ExerciseLooper</title>
    <meta name="csrf-param" content="authenticity_token">
    <meta name="csrf-token" content="UnoDQqbqlVBTo4gBsWHk/Z5SnBHQ2Xp4sBzP8mcCYtdQwNOZq2WzIXj14CYBxdPM4OeLC3lHmK13lK8wTW6xTA==">


    <link rel="stylesheet" media="all" href="./Answering_files/application-264507a893987846393b8514969b89293817c54265354e63e6ab61fb46193f89.css">
    <script src="./Answering_files/application-212289bcba525f2374cdbd70755ea38f2cfdd35d479e9638fae0b2832fac5dac.js.téléchargement"></script>

    <ul class="ansering-list">
      <li class="row">

        <?php foreach ($bag['exercises'] as $exercise) {
          if ($exercise->getState() == 1) {
            echo '<div class="column card">';
            echo '<div class="title">' . $exercise->getTitle() . '</div>';
            echo '<a class="button" href="/exercises/' .  $exercise->getId() . '/fulfillments/new">Take it</a>';
            echo '</div>';
          }
        }
        ?>




  </main>
</body>

</html>