<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Điền vào chỗ trống</title>
    <link rel="stylesheet" href="styles.css">
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .worksheet-container {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 80%;
        max-width: 600px;
        text-align: left;
    }

    input[type="text"] {
        padding: 5px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width: 150px;
        margin-left: 5px;
    }

    #result {
        margin-top: 20px;
        font-weight: bold;
    }
</style>

<body>
    <div class="worksheet-container">
        <h2>Văn Bản Điền vào Chỗ Trống</h2>
        <div id="questionsContainer"></div> <!-- Div để chứa các câu hỏi -->
        <button type="button" id="submitBtn">Nộp Bài</button>
        <div id="result"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>

    <script>
        $(document).ready(function() {
            // Biến chứa câu hỏi và đáp án
            let questions = {
                "Hà Nội là thủ đô của ___": "Việt Nam",
                "Thành phố Hồ Chí Minh nằm ở miền ___": "Nam",
                "Đà Nẵng là một thành phố ở ___": "Miền Trung",
                "Huế là thành phố nổi tiếng với ___": "di sản"
            };

            // Tự động tạo các ô nhập liệu dựa trên câu hỏi
            let index = 1;
            $.each(questions, function(question, answer) {
                $("#questionsContainer").append(
                    `<p>${question.replace("___", `<input type="text" name="answer${index}" placeholder="___">`)}</p>`
                );
                index++;
            });

            // Xử lý khi nhấn nút "Nộp Bài"
            $("#submitBtn").click(function() {
                let allCorrect = true;
                let resultText = "Kết quả:\n";

                // Lặp qua các trường input và so sánh câu trả lời
                $("input[type='text']").each(function(i) {
                    let userAnswer = $(this).val().trim();
                    let correctAnswer = Object.values(questions)[i]; // Lấy đáp án đúng theo thứ tự

                    if (userAnswer.toLowerCase() === correctAnswer.toLowerCase()) {
                        resultText += `Câu ${i + 1}: Đúng!\n`;
                    } else {
                        resultText += `Câu ${i + 1}: Sai (Đáp án đúng: ${correctAnswer})\n`;
                        allCorrect = false;
                    }
                });

                if (allCorrect) {
                    resultText = "Tất cả đều đúng!";
                }

                $("#result").text(resultText);
            });
        });
    </script>
</body>

</html>