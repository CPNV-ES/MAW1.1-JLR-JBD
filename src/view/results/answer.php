<main class="container">



    <title>ExerciseLooper</title>
    <meta name="csrf-param" content="authenticity_token">
    <meta name="csrf-token" content="gaP7yTa7YiqWLUcDXemTD7Ow8p0t2EpTRJe6uJr+ZBiU7t0tLjSYJFXy3TaO75ktU5Z5SSfDeE+e+vkvoYYf/g==">


    <link rel="stylesheet" media="all" href="./ExerciseLooper4_files/application-264507a893987846393b8514969b89293817c54265354e63e6ab61fb46193f89.css">
    <script src="./ExerciseLooper4_files/application-212289bcba525f2374cdbd70755ea38f2cfdd35d479e9638fae0b2832fac5dac.js.téléchargement"></script>



    <h1><?= $bag['answers'][0]->getCreateDate() ?></h1>
    <dl class="answer">
        <?php foreach ($bag['results'] as $result) : ?>
            <dd><?= $result->getResult(); ?></dd>
        <?php endforeach; ?>
    </dl>




</main>