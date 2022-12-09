<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body>
    <header class="heading results">
        <section class="container">
            <a href="https://stormy-plateau-54488.herokuapp.com/"><img src="./ExerciseLooper3_files/logo-84d7d70645fbe179ce04c983a5fae1e6cba523d7cd28e0cd49a04707ccbef56e.png"></a>
            <span class="exercise-label">Exercise: <a href="https://stormy-plateau-54488.herokuapp.com/exercises/430/results"></a></span>
        </section>
    </header>

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

                        <th><a href='https://stormy-plateau-54488.herokuapp.com/exercises/430/results/620'> <?= $question->getTitle() ?> </a></th>
                    <?php endforeach; ?>
                </tr>
            </thead>

            <tbody>


                <?php foreach ($bag['answers'] as $answer) : ?>
                    <tr>
                        <td><a href='https://stormy-plateau-54488.herokuapp.com/exercises/430/fulfillments/598'><?= $answer->getCreateDate() ?></a></td>




                        <?php foreach ($bag['results'] as $result) : ?>
                            <td><a href='https://stormy-plateau-54488.herokuapp.com/exercises/430/fulfillments/598'><i class="fa fa-check short"></i></a></td>



                        <?php endforeach; ?>
                        <?php for ($i = 0; $i < count($bag['questions']) - count($bag['results']); $i++) : ?>
                            <td><a href='https://stormy-plateau-54488.herokuapp.com/exercises/430/fulfillments/598'><i class="fa fa-times empty"></i></a></td>



                        <?php endfor; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>




    </main>
</body>

</html>