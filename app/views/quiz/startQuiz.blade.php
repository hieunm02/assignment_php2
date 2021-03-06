<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ BASE_URL }}/app/css/style.css">
</head>

<body>
    <div class="container">
        <header>
            <a href="{{ BASE_URL }}"><img src="{{ BASE_URL }}/app/img/logo-3.png" alt="" class="logo"></a>
            <?php require_once './app/views/nav/index.php'; ?>

        </header>

        <main>
            <div class="content">
                <div class="content-nav">
                    <ul>
                        <li><a href="javascript:history.back()">Quiz</a></li>
                        <li><a href="">Discussion</a></li>
                        <li><a href="">Wiki</a></li>
                        <li><a href="">Progress</a></li>
                    </ul>
                </div>
                <div class="main">

                    <div class="name-quiz">
                        <h2 style="text-transform: uppercase; font-family: Arial, Helvetica, sans-serif;">{{ $data['name'] }}</h2>
                    </div>
                    <div>
                        <h2>Thời gian làm bài: <span id="time">{{ $data['duration_minutes'] }} </span> Phút</h2>
                    </div>

                    <?php $_SESSION['countQuestion'] = count($startQuiz) ?>
                    <!-- câu hỏi -->
                    <form action="{{ BASE_URL }}quiz/result" method="POST">
                        <input type="hidden" name="studentId" value="{{ $_SESSION['id'] }}" id="">
                        <input type="hidden" name="quizId" value="{{ $data->id }}" id="">
                        @foreach ($startQuiz as $startQuiz)
                            <div class="question">
                                <div class="list-question">
                                    

                                    <ul>
                                        <li><a class="startQuiz" id="{{ $startQuiz['id'] }}">{{ $startQuiz['name'] }}</a></li><br>
                                        <li>
                                            <input type="hidden" name="questionId[]" value="{{ $startQuiz->id }}" id="">
                                            <!-- câu trả lời -->
                                            @foreach ($answer as $ans) 
                                                <?php if ($startQuiz['id'] == $ans['question_id']) { ?>
                                                    <input type="radio" name="question_{{$startQuiz->id}}" value="{{ $ans->is_correct }}">{{ $ans['content'] }}<br>
                                                <?php } ?>
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        @endforeach
                        <button type="submit" class="btn-endquiz" name="endQuiz">Hoàn thành</button><br>

                    </form><br>


                </div>

            </div>

        </main>

    </div>
    <script>
        function startTimer(duration, display) {
            var timer = duration,
                minutes, seconds;
            setInterval(function() {
                minutes = parseInt(timer / 60, 10)
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = minutes + ":" + seconds;

                if (--timer < 0) {
                    timer = duration;
                }
            }, 1000);
        }

        window.onload = function() {
            var fiveMinutes = 60 * "<?= $data['duration_minutes']; ?>",
                display = document.querySelector('#time');
            startTimer(fiveMinutes, display);
        };
    </script>
</body>

</html>