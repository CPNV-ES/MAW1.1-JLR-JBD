<main class="container">



    <title>ExerciseLooper</title>
    <meta name="csrf-param" content="authenticity_token">
    <meta name="csrf-token" content="MXNJkLNzMgV9GvpPgXlJkoLPd1qmuCPl783mrpCpRGYkPm90q/zIC77FYHpSf0OwYun8jqyjEfk1oKU5q9E/gA==">


    <link rel="stylesheet" media="all" href="./ExerciseLooper3_files/application-264507a893987846393b8514969b89293817c54265354e63e6ab61fb46193f89.css">
    <script src="./ExerciseLooper3_files/application-212289bcba525f2374cdbd70755ea38f2cfdd35d479e9638fae0b2832fac5dac.js.téléchargement"></script>



    <table>
        <thead>
            <tr>
                <th>Take</th>
                <?php foreach ($bag['questions'] as $question) : ?>

                    <th><a href='/exercises/<?= $bag['id_exercise'] ?>/results/<?= $question->getId() ?>'> <?= $question->getTitle() ?> </a></th>
                <?php endforeach; ?>
            </tr>
        </thead>

        <tbody>

            <?php $index = 0; ?>
            <?php foreach ($bag['answers'][0] as $answer) : ?>

                <tr>

                    <td><a href='/exercises/<?= $bag['id_exercise'] ?>/answers/<?= $answer->getId() ?>'><?= $answer->getCreateDate() ?></a></td>
                    <?php foreach ($bag['results'][0] as $selfResult) : ?>
                        <?php if ($selfResult->getResult() != "") : ?>
                            <td><i class="fa fa-check short"></i></a></td>
                        <?php else : ?>
                            <td><i class="fa fa-times empty"></i></a></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
                <?php $index++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>




</main>