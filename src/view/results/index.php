<?php $title = "ExerciseLooper" ?>
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
        <?php $index = 0; ?>
        <?php foreach ($bag['results'] as $result) : ?>
            <tr>
                <td><a href='https://stormy-plateau-54488.herokuapp.com/exercises/430/fulfillments/598'><?= $bag['answers'][$index][0]->getCreateDate() ?></a></td>
                <?php foreach ($result as $selfResult) : ?>
                    <?php if ($selfResult->getResult() != "") : ?>
                        <td><a href='https://stormy-plateau-54488.herokuapp.com/exercises/430/fulfillments/598'><i class="fa fa-check short"></i></a></td>
                    <?php else : ?>
                        <td><a href='https://stormy-plateau-54488.herokuapp.com/exercises/430/fulfillments/598'><i class="fa fa-times empty"></i></a></td>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tr>
            <?php $index++; ?>
        <?php endforeach; ?>
    </tbody>
</table>

