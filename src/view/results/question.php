<main class="container">



    <title>ExerciseLooper</title>
    <meta name="csrf-param" content="authenticity_token">
    <meta name="csrf-token" content="0diZjGxqd2vqJYLlWc2dKJOuAPovQbIsLwXAHtLmdPHElb9odOWNZSn6GNCKy5cKc4iLLiVagDD1aIOJ6Z4PFw==">


    <link rel="stylesheet" media="all" href="./ExerciseLooper5_files/application-264507a893987846393b8514969b89293817c54265354e63e6ab61fb46193f89.css">
    <script src="./ExerciseLooper5_files/application-212289bcba525f2374cdbd70755ea38f2cfdd35d479e9638fae0b2832fac5dac.js.téléchargement"></script>



    <table>
        <thead>
            <tr>
                <th>Take</th>
                <th><a href="/exercises/<?= $bag['id_exercise'] ?>/results/<?= $bag['id_question'] ?>"><?= $bag['questions'][0]->getTitle()  ?></a></th>
            </tr>
        </thead>

        <tbody>

            <?php $index = 0; ?>
            <?php foreach ($bag['answers'][0] as $answer) : ?>

                <tr>

                    <td><a href='/exercises/<?= $bag['id_exercise'] ?>/answers/<?= $answer->getId() ?>'><?= $answer->getCreateDate() ?></a></td>



                    <?php if ($bag['results'][$index]->getResult() != "") : ?>
                        <td><i class="fa fa-check short"></i></a></td>
                    <?php else : ?>
                        <td><i class="fa fa-times empty"></i></a></td>
                    <?php endif; ?>

                </tr>
                <?php $index++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>




</main>