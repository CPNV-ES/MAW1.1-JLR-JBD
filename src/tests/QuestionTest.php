<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once 'src/model/exercise_handler.php';
require_once 'src/model/question.php';

final class QuestionTest extends TestCase
{

    protected $exerciseHandler;
    protected $question;

    protected $exerciseTitle;
    protected function setUp(): void
    {
        $this->exerciseHandler = ExerciseHandler::getInstance();
    }

    public function test_CreateNominalCase_Success(): void
    {
        //given
        $questionTitle = "testNominale";
        $questionType = 1;
        $this->exerciseTitle = "test_CreateNominalCaseQuestion_Success";
        $this->assertFalse($this->exists($questionTitle));

        //when
        $question = new Question(0,$questionTitle,$questionType);
        $this->exerciseHandler->create($question->getTitle());
        //then
        $this->assertTrue($this->exists($question->getTitle()));
    }


    public function test_DeleteExercise_Success(): void
    {
        //given
        $questionTitle = "test_DeleteExercise_SuccessQuestion";
        $questionType = 1;
        $this->exerciseTitle = "test_DeleteExercise_Success";
        $question = new Question(0,$questionTitle,$questionType);
        $this->exerciseHandler->create($questionTitle);
        $this->assertTrue($this->exists($questionTitle));


        //delete Exercise


        //when
        $this->exerciseHandler->delete($questionTitle);
        //Event is called by assertion directly

        //then
        $this->assertCount(0, $this->exerciseHandler->getExercise($questionTitle));
    }


    public function test_SelectFourExercises_Success(): void
    {
       //given
    
       $questionType = 1;
        for($i = 0; $i <= 4; $i++){
            $this->exerciseTitle = "test_DeleteExercise_Success" . $i;
            $questionTitle = "test_DeleteExercise_SuccessQuestion" . $i;
            $this->assertFalse($this->exists($questionTitle));
        }
        //assert 4 exerices


        //when
        for ($i = 0; $i <= 4; $i++) {
            $questionTitle = "test_DeleteExercise_SuccessQuestion" . $i;
            $question = new Question(0,$questionTitle,$questionType);
            $this->exerciseHandler->create($questionTitle);
        }
        //then
        $array = array();
        for ($i = 0; $i <= 4; $i++) {

            array_push($array, $this->exerciseHandler->getQuestion("test_DeleteExercise_SuccessQuestion" . $i));
        }

        $this->assertCount(5, $array);
        for($i = 0; $i <= 4; $i++){
            $questionTitle= "test_DeleteExercise_SuccessQuestion" . $i;
            $question = new Question(0,$questionTitle,$questionType);
            $this->exerciseHandler->delete($questionTitle);
        }
    }

    protected function exists(...$questions): bool
    {
        $results = $this->exerciseHandler->getQuestion(...$questions);

        if (count($results) > 0) {
            for ($i = 0; $i < count($results); $i++) {
                if ($results[$i]->getName() != $questions[$i]) {
                    return false;
                }
            }
            return true;
        } else {
            return false;
        }
    }

    protected function tearDown(): void
    {
        if ($this->exists($this->exerciseTitle)) {
            $this->exerciseHandler->delete($this->exerciseTitle);
        }
    }
}
