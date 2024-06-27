<?php
    require_once(dirname(__FILE__) ."/conn.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitBOT</title>

    <!-- Bootstrap CSS via CDN -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->

    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
        }
        h1, p {
            margin: 2em 0 1em 0;
        }
        /* Print-specific styles */
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
  
</head>
<body>
    <div class="container mt-5 mb-5">

<?php

define('OPENAI_API_KEY', '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');
    // gpt-4-0125-preview gpt-3.5-turbo-0125 gpt-4o
        function callOpenAI($prompt) {
            $url = 'https://api.openai.com/v1/chat/completions';

            $data = array(
                'model' => 'gpt-4o',
                'messages' => array(
                    array('role' => 'system', 'content' => 'Your name is Fitbot, an AI Health Companion. You are an expert in planning a comprehensive nutrition and exercise plan for one month that specializes in high school students health in achieving and maintaining normal BMI, it is important that the ingredients in the menu should be available and common in the Philippines, most specifically in Bicol Region but you wont mention it, and also say something about the BMI and the current status of the student. Meal Plan should be different every day for four weeks, for the student to have variety. Provide meals every week. Calculate thier age base on the birtdate given for more accurate result. Use "###" in heading and "**" for bold style. Format should be consistent in every session. Leave a note for the parents.'),
                    array('role' => 'user', 'content' => $prompt),
                )
                // 'max_tokens' => 3000
            );

            $headers = array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . OPENAI_API_KEY,
            );

            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($ch);

            curl_close($ch);

            return json_decode($response, true);
        }
        if(!isset($_POST['studentDetails']) )
        {
            echo"no data";
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['generate'])) {

            $studID = $_POST['student_id'];
            $userInput = $_POST['studentDetails'];
            $response = callOpenAI($userInput);

            if (isset($response['choices'][0]['message']['content'])) {
                $assistantResponse = $response['choices'][0]['message']['content'];

                // Format text with ### as headings
                $assistantResponse = preg_replace('/###\s*(.*?)\n/s', '<h2>$1</h2>', $assistantResponse);

                // Format text with ** as bold
                $assistantResponse = preg_replace('/\*\*(.*?)\*\*/s', '<strong>$1</strong>', $assistantResponse);

                // Preserve line breaks and display as formatted text
                $formattedText = nl2br(html_entity_decode($assistantResponse));

                // Output directly as HTML
                

                $storeResponse = mysqli_query($conn,"UPDATE `students` SET `student_plan`='".mysqli_real_escape_string($conn,$formattedText)."' WHERE `student_id` = '$studID'");

                if($storeResponse)
                {
                    echo "<div class='mt-4'><strong>Assistant's Response:</strong><br>$formattedText</div>";
                }
                else
                {
                    echo"Error".mysqli_error($conn);
                }
            } else {
                echo "<p class='mt-4 alert alert-danger'>Error retrieving data.</p>";
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['recreate'])) {
            $studID = $_POST['student_id'];
            $userInput = $_POST['studentDetails'];
            $response = callOpenAI($userInput);

            if (isset($response['choices'][0]['message']['content'])) {
                $assistantResponse = $response['choices'][0]['message']['content'];

                // Format text with ### as headings
                $assistantResponse = preg_replace('/###\s*(.*?)\n/s', '<h2>$1</h2>', $assistantResponse);

                // Format text with ** as bold
                $assistantResponse = preg_replace('/\*\*(.*?)\*\*/s', '<strong>$1</strong>', $assistantResponse);

                // Preserve line breaks and display as formatted text
                $formattedText = nl2br(html_entity_decode($assistantResponse));

                // Output directly as HTML
                $storeResponse = mysqli_query($conn,"UPDATE `students` SET `student_plan`='".mysqli_real_escape_string($conn,$formattedText)."' WHERE `student_id` = '$studID'");

                if($storeResponse)
                {
                    echo "<div class='mt-4'><strong>Assistant's Response:</strong><br>$formattedText</div>";
                }
                else
                {
                    echo"Error".mysqli_error($conn);
                }
            } else {
                echo "<p class='mt-4 alert alert-danger'>Error retrieving data.</p>";
            }
        }
        
        ?>
    </div>
    <button type="submit" name="register" class="btn btn-sm btn-primary mt-2" onclick="window.location.href='studentlist.php?grade=7&&section=A'"><i class="fa-solid fa-arrow-left" ></i> Back to Student List</button>

    <div style="text-align: center;">
        <button type="submit" name="register" class="btn btn-sm btn-primary mt-2" class="no-print" onclick="window.print();"><i class="fa-solid fa-print" ></i> Print</button>
    </div>

    <!-- Bootstrap JS and Popper.js via CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
